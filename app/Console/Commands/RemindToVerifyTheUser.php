<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseController;
use Illuminate\Console\Command;

class RemindToVerifyTheUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remind-to-verify-the-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To send Notiification to the Circle Owner to verify the User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $fb = new FirebaseController();
        $fb->sendReminderToVerifyTheUser();
    }
}
