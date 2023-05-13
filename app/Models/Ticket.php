<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Morilog\Jalali\Jalalian;

class Ticket extends Model
{
    protected $fillable=['user_id', 'department', 'priority', 'subject', 'status'];

    public function messages()   {return $this->hasMany(TicketMessage::class);}
    public function user()       {return $this->belongsTo(User::class);}

    public function created_at()      {return Jalalian::forge($this->created_at)->format('H:i   %d-%B-%Y');}
    public function updated_at()      {return Jalalian::forge($this->created_at)->format('H:i   %d-%B-%Y');}

    public function status()
    {
        if ($this->status == 'pending')  return 'در انتظار بررسی';
        if ($this->status == 'answered') return 'پاسخ داده شده';
        if ($this->status == 'closed')   return 'بسته شده';
    }

    public function status_class()
    {
        if ($this->status == 'pending')  return 'text-warning';
        if ($this->status == 'answered') return 'text-success';
        if ($this->status == 'closed')   return 'text-danger';
    }
}
