<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Account extends Model
{
    use HasFactory;
    protected $fillable=['user_id','server_id', 'xui_id', 'xui_remark', 'xui_port', 'xui_uuid', 'xui_expire_at', 'xui_traffic', 'status'];

    public function invoices()  {return $this->belongsToMany(Invoice::class, 'account_invoice', 'account_id', 'invoice_id');}
    public function user()      {return $this->belongsTo(User::class);}

    public function server()    {return $this->belongsTo(Server::class);}

    public function expire_at()       {return Jalalian::forge($this->xui_expire_at)->format('H:i   %d-%B-%Y');}
    public function created_at()      {return Jalalian::forge($this->created_at)->format('H:i   %d-%B-%Y');}

    public function config()
    {
        return 'vless://' . $this->xui_uuid . '@' . $this->server->address . ':' . $this->xui_port. '?type=ws&security=none&path=%2F#' . $this->xui_remark;
    }
}
