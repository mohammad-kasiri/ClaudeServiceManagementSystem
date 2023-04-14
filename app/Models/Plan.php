<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable=['location_id', 'period_id', 'traffic_id', 'rrp_price', 'price', 'is_promote', 'is_active'];

    public function traffic()    {return $this->belongsTo(Traffic::class ,'traffic_id');}
    public function location()   {return $this->belongsTo(Location::class ,'location_id');}
    public function period()     {return $this->belongsTo(Period::class ,'period_id');}

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', true);
    }

    public function is_active()
    {
        return $this->is_active ? 'فعال' : 'غیرفعال';
    }
    public function price()
    {
        return number_format($this->price);
    }
    public function rrp_price()
    {
        return number_format($this->rrp_price);
    }
    public function is_active_class()
    {
        return $this->is_active ? 'success' : 'danger';
    }
}
