<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseController;
use Illuminate\Console\Command;

class SendNotificationForAddingUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification-for-adding-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification for the Group Admin to Add User in it.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fb = new FirebaseController();
        $fb->sendCircleAdminGroupNotification();
    }
}
