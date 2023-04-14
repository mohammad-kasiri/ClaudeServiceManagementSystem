<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    use HasFactory;
    protected $fillable=['title' , 'amount', 'is_active'];

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
}
