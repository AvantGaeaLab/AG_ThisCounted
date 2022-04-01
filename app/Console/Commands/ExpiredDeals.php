<?php

namespace App\Console\Commands;

use App\Models\Deal;
use Illuminate\Console\Command;

class ExpiredDeals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiresDeals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to change deals status';

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
     * @return int
     */
    public function handle()
    {
        $deal = Deal::where('status', 'Valid')
            ->where('end_at', '<', date('y-m-d h:i:s'))->get();
        foreach( $deal as $exDeals){
            $exDeals->status = "Expired";
            $exDeals->update();
        }
    }
}
