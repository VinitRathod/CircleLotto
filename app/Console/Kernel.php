<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:send-scheduled-notification')->twiceDaily();
        $schedule->command('app:send-notification-for-adding-user')->days([Schedule::SUNDAY, Schedule::TUESDAY, Schedule::THURSDAY])->at('10:00');
        // $schedule->command('app:send-notification-for-adding-user')->days([Schedule::SUNDAY]);
        // $schedule->command('app:send-notification-for-adding-user')->sundays();
        // $schedule->command('app:send-notification-for-adding-user')->tuesdays();
        // $schedule->command('app:send-notification-for-adding-user')->thursdays();
        $schedule->command('app:remind-to-verify-the-user')->cron('0 0,12 * * *');
        // $schedule->command('app:remind-to-verify-the-user')->everyMinute();
        $schedule->command('app:send-circle-amount-notification-to-all')->everyMinute();
        $schedule->command('app:switch-off-functionality')->days([Schedule::FRIDAY])->at('00:00');
        $schedule->command('app:thursday-time-pressure-notification')->thursdays()->at('12:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
