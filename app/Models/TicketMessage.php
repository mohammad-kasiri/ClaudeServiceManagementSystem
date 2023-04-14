<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketMessage extends Model
{
    protected $fillable=['user_id', 'ticket_id', 'message'];

    public function ticket()   {return $this->belongsTo(Ticket::class);}
    public function user()     {return $this->belongsTo(User::class);}
}
