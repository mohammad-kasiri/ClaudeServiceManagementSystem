<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Server extends Model
{
    protected $fillable=['location_id', 'description', 'address', 'port', 'protocol' , 'user', 'pass', 'active_accounts', 'min_port', 'max_port', 'is_active'];

    public function location()    {return $this->belongsTo(Location::class);}
    public function accounts()    {return $this->hasMany(Account::class);}

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', true);
    }

    public function is_filled()
    {
        return Account::query()->where('server_id', $this->id)->where('status', '!=', 'expired')->count() > ($this->max_port - $this->min_port);
    }

    public function capacity()
    {
        return ($this->max_port - $this->min_port) - Account::query()->where('server_id', $this->id)->where('status', '!=', 'expired')->count();
    }

    public function getEmptyPort()
    {
        $filled_ports= Account::query()
            ->where('server_id', $this->id)
            ->where('status', '!=', 'expired')
            ->pluck('xui_port')->toArray();
        do {
            $port =rand($this->min_port, $this->max_port);
        } while (in_array($port, $filled_ports));

        return $port;
    }

    public function display_address()
    {
        return $this->address.':'.$this->port;
    }

    public function full_address()
    {
        return $this->protocol."://".$this->address.':'.$this->port;
    }
    public function is_active()
    {
        return $this->is_active ? 'فعال' : 'غیرفعال';
    }

    public function is_active_class()
    {
        return $this->is_active ? 'success' : 'danger';
    }
}
