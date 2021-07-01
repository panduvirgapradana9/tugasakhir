<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BatasWaktuBayar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:transaksi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'status pengiriman di update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("status pengiriman transaksi updated");
        DB::update("Update cart set status_pengiriman='dibatalkan' WHERE status_pembayaran='belum' AND DATEDIFF(CURDATE(), created_at) >= 3");

        $this->info('status:transaksi Cummand Run successfully!');
    }
}
