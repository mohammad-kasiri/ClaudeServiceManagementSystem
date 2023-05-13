<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketMessageController extends Controller
{
    public function index(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) abort(403);

        $messages= TicketMessage::query()->where('ticket_id', $ticket->id)->latest()->get();
        return view('customer.tickets.messages.index')
            ->with('ticket' , $ticket)
            ->with('messages', $messages);
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

        $ticket->status = 'pending';
        $ticket->save();

        return redirect()->route('panel.ticket.message.index', ['ticket' => $ticket->id]);
    }
}
