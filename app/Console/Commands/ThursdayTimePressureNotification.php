<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseController;
use Illuminate\Console\Command;

class ThursdayTimePressureNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:thursday-time-pressure-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fbNot = new FirebaseController();
        $fbNot->ThursdayTimePressureNotificationToAll();
    }
}
