<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool|mixed $is_active
 */
class Discount extends Model
{
    protected $fillable=['code', 'amount', 'type', 'limitation', 'used_by', 'is_active'];

    public function type()
    {
        return $this->type == 'percent' ? 'درصدی' : 'مقدار ثابت';
    }

    public function amount()
    {
        return $this->type == 'percent' ? $this->amount.' % ' : number_format($this->amount).' تومان ';
    }
    public function is_active()
    {
        return $this->is_active ? 'فعال' : 'غیرفعال';
    }
    public function is_active_class()
    {
        return $this->is_active ? 'success' : 'danger';
    }

    public function hasTheCapacityBeenCompleted() : bool
    {
        return Invoice::query()
            ->where('discount_id', $this->id)
            ->where('status', 'completed')
            ->count() >= $this->limitation;
    }
}
