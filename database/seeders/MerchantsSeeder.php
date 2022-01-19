<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->insert([
                ['name'=>'FishAndCo'],
                ['name'=>'LiHo'],
                ['name'=>'BoberTea'],
                ['name'=>'CRAVE'],
                ['name'=>'KFC'],
                ['name'=>'popeyes'],
                ['name'=>"Mcdonald's"],
            ]
        );
    }
}
