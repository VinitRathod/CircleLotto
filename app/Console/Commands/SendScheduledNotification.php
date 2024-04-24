<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseController;
use Illuminate\Console\Command;

class SendScheduledNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Test Notification to All';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fb = new FirebaseController();
        $fb->sendNotificationToAllCommad();
    }
}
