<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                ['title'=>'Food'],
                ['title'=>'Drinks'],
                ['title'=>'MealsUnder10'],
                ['title'=>'MealsUnder20'],
                ['title'=>'Snacks And Desserts'],
                ['title'=>'Students Exclusive'],
                ['title'=>'Activities'],
                ['title'=>'Indoor Activities'],
                ['title'=>'Outdoor Activities'],
            ]
        );
    }
}
