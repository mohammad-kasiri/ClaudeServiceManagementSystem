<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketMessageController extends Controller
{
    public function index(Ticket $ticket)
    {
        $messages= TicketMessage::query()->where('ticket_id' , $ticket->id)->latest()->get();
        return view('admin.tickets.messages.index')
            ->with('messages' , $messages)
            ->with('ticket'   , $ticket);
    }

    public function store(Ticket $ticket, Request $request)
    {
        $this->validate($request, [
            'message' => ['required', 'max:650']
        ]);

        TicketMessage::query()->create([
            'ticket_id'  => $ticket->id,
            'user_id'    => auth()->id(),
            'message'    => $request->message,
        ]);

        $ticket->status = 'answered';
        $ticket->save();

        return redirect()->route('admin.ticket.message.index', ['ticket' => $ticket->id]);
    }
}
