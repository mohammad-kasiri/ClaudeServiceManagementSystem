<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Morilog\Jalali\Jalalian;

class PanisPayGateway extends Model
{
    protected $fillable=['invoice_id', 'status', 'message', 'refID', 'authority', 'paymentUrl', 'PaymentForm', 'step','mask_card_number', 'BuyerIP'];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function created_at(){return Jalalian::forge($this->created_at)->format('%d-%B-%Y  H:i');}

    public function status_class()
    {
        if ($this->step == 'pending')   return 'warning';
        if ($this->step == 'failed')    return 'danger';
        if ($this->step == 'paid')      return 'success';
        return 'info';
    }
}
