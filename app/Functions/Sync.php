<?php

namespace App\Functions;

use App\XUI\XUI;
use Illuminate\Support\Facades\Log;

class Sync
{
    public static function with($server)
    {
        $XUIAccounts= XUI::onServer($server)
            ->getAccounts();



        $localAccounts= \App\Models\Account::query()
            ->where('server_id', $server->id)
            ->where('status', 'created')
            ->get();

        foreach ($XUIAccounts as $XUIAccount)
        {
           $localAccount= $localAccounts->where('xui_port', $XUIAccount->port)->first();
           if (!is_null($localAccount))
           {
               $continue= false;

               if ($localAccount->xui_remark != $XUIAccount->remark)
               {
                   static::warningLog($server, $localAccount, $XUIAccount, 'Remark');
                   $continue= true;
               }

               if ($localAccount->xui_uuid !=  json_decode($XUIAccount->settings)->clients[0]->id)
               {
                   static::warningLog($server, $localAccount, $XUIAccount, 'uuid');
                   $continue= true;
               }

               if (($localAccount->xui_traffic *1073741824) !=   $XUIAccount->total)
               {
                   static::warningLog($server, $localAccount, $XUIAccount, 'traffic');
                   $continue= true;
               }

               if ($continue)  continue;

               if (is_null($localAccount->xui_id))
               {
                   $localAccount->xui_id =  $XUIAccount->id;
                   $localAccount->save();
                   static::infoLog($server, $localAccount, $XUIAccount);
               }
           }
        }
    }

    private static function warningLog($server, $localAccount, $XUIAccount, $anomaly)
    {
        $data =
"
anomaly             => {$anomaly}
server_id           => {$server->id}
server_addr         => {$server->full_address()}
local_account_id    => {$localAccount->id}
xui_id              => {$XUIAccount->id}
xui_port            => {$XUIAccount->port}
-----------------------------------------------------------------------------------------";
        Log::channel('sync_xui')->warning($data);
    }

    private static function infoLog($server, $localAccount, $XUIAccount)
    {
        $data =
"
server_id           => {$server->id}
server_addr         => {$server->full_address()}
local_account_id    => {$localAccount->id}
xui_id              => {$XUIAccount->id}
xui_port            => {$XUIAccount->port}
-----------------------------------------------------------------------------------------";

        Log::channel('sync_xui')
            ->info($data);
    }
}
