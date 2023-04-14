<?php

namespace App\XUI;

use App\Models\Server;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class XUI
{
    const URI_PREFIX= '/xui/inbound';

    private  static XUI|null $instance = null;
    private Server|null $server= null;
    private string|null $accessToken= null;

    private function __construct()    {}

    public static function onServer(Server $server): static
    {
        if (self::$instance == null)
        {
            self::$instance = new XUI();
            self::$instance->server= $server;
            self::$instance->accessToken= Connection::address($server->address)
                ->setPort($server->port)
                ->setUsername($server->user)
                ->setPassword($server->pass)
                ->login();
        }
        return self::$instance;
    }


    public function getAccounts()
    {
        $response= Http::withHeaders($this->getHeaders())
            ->post($this->getFullAddress().'/list');
        return json_decode($response->body())->obj;
    }

    public function deleteAccount($id)
    {
        $response= Http::withHeaders($this->getHeaders())
            ->post($this->getFullAddress().'/del/'. $id);
        dd(json_decode($response->body()));
    }

    public function addAccount($remark, $uuid, $port, $total_traffic, $period)
    {
        $body=[
            'up'                =>  0,
            'down'              =>  0,
            'total'             => ($total_traffic*1073741824),
            'remark'            =>  $remark,
            'enable'            =>  true,
            'listen'            =>  null,
            'expiryTime'        =>  (int) (Carbon::now()->addDays($period)->timestamp.'000'),
            'port'              =>  $port,
            'protocol'          => 'vless',

            'settings'          => '{"clients":[{"id":"'.$uuid.'","flow":"xtls-rprx-direct"}],"decryption":"none","fallbacks":[]}',
            'streamSettings'    => '{"network":"ws","security":"none","wsSettings":{"acceptProxyProtocol":false,"path":"/","headers":{}}}',
            'sniffing'          => '{"enabled":false,"destOverride":["http","tls"]}',
        ];

        $response= Http::withHeaders($this->getHeaders())
            ->asForm()
            ->withBody(json_encode($body))
            ->post($this->getFullAddress().'/add');

       return json_decode($response->body())->success;
    }

    private function getHeaders() : array
    {
        return [
            'Accept'            => 'application/json',
            'Content-Type'      => 'application/x-www-form-urlencoded; charset=UTF-8',
            'Cookie'            => "session=".$this->accessToken,
            'X-Requested-With'  => 'XMLHttpRequest',
        ];
    }

    private function getFullAddress() : string
    {
        //E.g  ==>  https://google.com:80/xui/inbounds

        return is_null($this->server->port)
            ? $this->server->address. self::URI_PREFIX
            : $this->server->address.":".$this->server->port. self::URI_PREFIX;
    }
}
