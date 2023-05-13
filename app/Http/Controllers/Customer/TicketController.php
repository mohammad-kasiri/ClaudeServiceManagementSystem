<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets= Ticket::query()->where('user_id', auth()->id())->latest()->get();
        return view('customer.tickets.index')
            ->with('tickets', $tickets);
    }

    public function create()
    {
        return view('customer.tickets.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject'     => ['required' , 'max:250'],
            'priority'    => ['required' , 'in:low,medium,high'],
            'department'  => ['required' , 'in:support,finance,management'],
            'message'     => ['required' , 'max:650'],
        ]);

        $ticket= Ticket::query()->create([
            'user_id'    => auth()->id(),
            'subject'    => $request->subject,
            'department' => $request->department,
            'priority'   => $request->priority,
        ]);

        TicketMessage::query()->create([
            'ticket_id'  => $ticket->id,
            'user_id'    => auth()->id(),
            'message'   => $request->message,
        ]);

        return redirect()->route('panel.ticket.message.index', ['ticket' => $ticket->id]);
    }
}
