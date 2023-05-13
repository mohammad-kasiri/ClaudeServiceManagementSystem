<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets= Ticket::query()->with('user')->latest()->paginate(50);
        return view('admin.tickets.index')->with([
            'tickets' => $tickets
        ]);
    }

    public function close(Ticket $ticket)
    {
        $ticket->status= 'closed';
        $ticket->save();

        return redirect()->back();
    }

    public function pending(Ticket $ticket)
    {
        $ticket->status= 'pending';
        $ticket->save();

        return redirect()->back();
    }
}
