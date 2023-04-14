<?php

namespace App\XUI;

use Illuminate\Support\Facades\Http;

class Connection
{
    private static $instance = null;

    private $address;
    private $port;
    private $username;
    private $password;

    private function __construct()    {}

    public static function address(string $address): static
    {
        if (self::$instance == null)
        {
            self::$instance = new Connection();
            self::$instance->address = $address;
        }
        return self::$instance;
    }

    public function setPort(int $port) : static
    {
        $this->port= $port;
        return $this;
    }
    public function setUsername(string $username): static
    {
        $this->username= $username;
        return $this;
    }
    public function setPassword(string $password): static
    {
        $this->password= $password;
        return $this;
    }
    public function login()
    {
        $data = [
            'username' => $this->username,
            'password' => $this->password
        ];

        $request= Http::post( $this->getLoginURL() , $data);
        return $request->cookies->toArray()[0]["Value"];
    }

    private function getFullAddress() : string
    {
        return is_null($this->port)
            ? $this->address
            : $this->address.":".$this->port;
    }

    private function getLoginURL() : string
    {
        return $this->getFullAddress().'/login';
    }
}
