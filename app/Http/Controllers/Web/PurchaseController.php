<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Server;
use App\XUI\XUI;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function pay(Invoice $invoice)
    {
        if ($invoice->user_id != auth()->id())
            abort(403);
    }

    public function callback(Request $request,Invoice $invoice)
    {
        $invoice->status= 'creating';
        $invoice->save();

        for ( $i=0; $i < $invoice->quantity; $i++)
        {
            $server= Server::query()->whereLocation_id($invoice->plan->location_id)->active()->orderBy('priority')->first();

            $account= $invoice->accounts()->create([
                'user_id'       => auth()->id(),
                'server_id'     => $server->id,
                'xui_remark'    => '|__Whale__|',
                'xui_port'      => $server->getEmptyPort(),
                'xui_uuid'      => Str::uuid(),
                'xui_expire_at' => Carbon::now()->addDays($invoice->plan->period->total_days)->addHour(),
                'xui_traffic'   => $invoice->plan->traffic->amount
            ]);

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
                // Call Admin There Is A Problem;
            }
        }

        $invoice->status= 'completed';
        $invoice->save();
    }
}
