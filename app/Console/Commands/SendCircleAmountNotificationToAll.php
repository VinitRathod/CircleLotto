<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseController;
use Illuminate\Console\Command;

class SendCircleAmountNotificationToAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-circle-amount-notification-to-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To Send Circle Amount Notification To All';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fb = new FirebaseController();
        $fb->sendCircleAmountNotificationToAll();
    }
}
