<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\BatasWaktuBayar::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('status:transaksi')
                 ->everyMinute();
        // $schedule->call(function () {
        //       DB::table('posts')
        //         ->whereRaw('DATEDIFF(CURDATE(), created_at) > 3')
        //         ->where('status_pembayaran','belum')
        //         ->update(['status_pengiriman'=>'dibatalkan']);
        //     //Mencatat info log 
        //     Log::info('Cronjob berhasil dijalankan');
        //   })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
