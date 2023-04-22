<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\PanisPayGateway;
use App\Models\Plan;
use App\Models\Server;
use App\XUI\XUI;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function pay()
    {
        if (!session()->has('cart')) abort(401);

        $data= json_decode(session()->get('cart'));
        $data->quantity = property_exists($data, 'quantity')
            ? $data->quantity
            : 1;
        $data->discount_id = property_exists($data, 'discount_id')
            ? $data->discount_id
            : null;
        $cart= new Cart($data);

        $plan = Plan::query()
            ->where('id', $data->plan_id)
            ->with('location')
            ->with('traffic')
            ->with('period')
            ->active()
            ->firstOrFail();

        $invoice= Invoice::query()->create([
            'user_id'       => auth()->id(),
            'plan_id'       => $plan->id,
            'period_id'     => $plan->period_id,
            'traffic_id'    => $plan->traffic_id,
            'discount_id'   => $data->discount_id,
            'plan_price'    => $plan->price,
            'plan_rrp_price'=> is_null($plan->rrp_price) ? 0 : $plan->rrp_price,
            'payable_price' => $cart->payable_price,
            'quantity'      => $cart->quantity,
            'status'        => 'not_paid',
            'type'          => 'buy',
        ]);

        $requestBody=[
            'MerchantID' =>   '485D7219A970E726-C574-EE68-0D89-1DB1',
            'Amount'     =>   $invoice->payable_price,
            'InvoiceID'  =>   $invoice->id,
            'CallbackURL'=>   route('callback', ['invoice' => $invoice->id])
        ];

        $response= Http::withBody(json_encode($requestBody))
            ->post('https://panispay.com/webservice/rest/PaymentRequest')->body();

        $response = json_decode($response);

        if ($response->Status != '100')
            abort(500);

        $gateway=PanisPayGateway::query()->create([
            'invoice_id'    => $invoice->id,
            'status'        => $response->Status,
            'message'       => $response->Message,
            'refID'         => $response->RefID,
            'authority'     => $response->Authority,
            'paymentUrl'    => $response->PaymentUrl,
            'PaymentForm'   => $response->PaymentForm,
        ]);

        return redirect()->to($gateway->paymentUrl);
    }

    public function callback(Request $request,Invoice $invoice)
    {
        $gateway = PanisPayGateway::query()
            ->where('invoice_id', $invoice->id)
            ->where('authority', $request->Authority)
            ->firstOrFail();

        $requestBody=[
            'MerchantID' =>   '485D7219A970E726-C574-EE68-0D89-1DB1',
            'Authority'  =>   $gateway->authority,
            'Amount'     =>   $invoice->payable_price
        ];

        $response= Http::withBody(json_encode($requestBody))
            ->post('https://panispay.com/webservice/rest/PaymentVerification')->body();

        $response = json_decode($response);

        auth()->logout();
        auth()->loginUsingId($invoice->user_id);

        if ($response->Status != '100'){
            $gateway->step = 'failed';
            $gateway->save();


            $invoice->status= 'failed';
            $invoice->save();

            abort(500);
        }

        auth()->logout();
        auth()->loginUsingId($invoice->user_id);

        $gateway->BuyerIP = $response->BuyerIP;
        $gateway->mask_card_number = $response->MaskCardNumber;
        $gateway->step = 'paid';
        $gateway->save();

        $invoice->status= 'creating';
        $invoice->save();

        $accounts=[];

        for ( $i=0; $i < $invoice->quantity; $i++)
        {
            $server= Server::query()->whereLocation_id($invoice->plan->location_id)->active()->orderBy('priority')->first();

            $accounts[]= $invoice->accounts()->create([
                'user_id'       => auth()->id(),
                'server_id'     => $server->id,
                'xui_remark'    => '|__Whale__|',
                'xui_port'      => $server->getEmptyPort(),
                'xui_uuid'      => Str::uuid(),
                'xui_expire_at' => Carbon::now()->addDays($invoice->plan->period->total_days)->addHour(),
                'xui_traffic'   => $invoice->plan->traffic->amount
            ]);
        }

        foreach ($accounts as $account)
        {
            $accountCreated= XUI::onServer($server)->addAccount(
                $account->xui_remark,
                $account->xui_uuid,
                $account->xui_port,
                $account->xui_traffic,
                $invoice->plan->period->total_days
            );

            if($accountCreated)
            {
                $account->status= 'created';
                $account->save();
            }else{
                $account->status= 'failed';
                $account->save();
            }
        }

        $invoice->status= 'completed';
        $invoice->save();
    }
}
