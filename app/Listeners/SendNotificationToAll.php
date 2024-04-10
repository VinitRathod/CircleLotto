<?php

namespace App\Listeners;

use App\Events\StartCircle;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNotificationToAll
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StartCircle $event): void
    {
        //
        $obj = new Controller();
        $name = $event->circle->circle_name;
        $notifications = $obj->sendNotificationToAll("Public Group Added", "$name is Added", $event->circle);
        if ($notifications->original['status'] == '500') {
            Log::error($notifications->original);
        }
    }
}
