<?php

namespace App\Http\Controllers\Customer;

use App\Functions\Sync;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Server;
use App\XUI\XUI;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $accounts= Account::query()->with('server.location')->where('user_id', auth()->id())->get();
        return view('customer.accounts.index')
            ->with(['accounts' => $accounts]);
    }

    public function change(Account $account)
    {

        $server= Server::query()->where('id',$account->server_id)->first();
        Sync::with($server);
        $account= Account::query()->where('id', $account->id)->first();
        $newUUID = Str::uuid();
        $result= XUI::onServer($server)->updateUUID($account, $newUUID);


        $account->update([
            'xui_uuid' => $newUUID,
        ]);


        return redirect()->back();
    }
}
