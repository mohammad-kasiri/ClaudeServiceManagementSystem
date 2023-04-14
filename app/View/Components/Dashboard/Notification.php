<?php

namespace App\View\Components\Dashboard;

use App\Models\Task;
use App\Notifications\Formatter\NotificationFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Notification extends Component
{

    public bool $active = false;
    public  $notifications;

    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.header.notification.index');
    }
}
