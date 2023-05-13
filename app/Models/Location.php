<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable= ['title', 'image', 'emoji', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', true);
    }
    public function is_active()
    {
        return $this->is_active ? 'فعال' : 'غیرفعال';
    }
    public function is_active_class()
    {
        return $this->is_active ? 'success' : 'danger';
    }

    public function availablePorts ()
    {
        // Note: Can Optimize This Function By Removing Query In Loop And Using A Query Out Of Loop With WhereIn;

        $servers = Server::query()->where('location_id', $this->id)->active()->get();
        $total_ports=0;
        $taken_ports=0;
        foreach ($servers as $server)
        {
            $total_ports= $total_ports + ($server->max_port - $server->min_port);
            $taken_ports = $taken_ports + Account::query()->where('server_id', $server->id)->count();
        }

        return $total_ports - $taken_ports;
    }
}
