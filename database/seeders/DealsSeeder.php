<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('deals')->insert([
           ['title'=>'Student discount promotion 🥩🍖',
           'user_id'=>'1',
           'price'=>'10',
           'main_pic' =>'1641313404.jpg'],

           ['title'=>'Student Promotion! 🎓💧🍜',
           'user_id'=>'1',
           'price'=>'12',
           'main_pic' =>'1642039010.jpg'],

           ['title'=>'Promotion! 🌷🌻🌼🥀',
           'user_id'=>'1',
           'price'=>'20',
           'main_pic' =>'1642039717.jpg'],

           ['title'=>'1-For-1 Grab Discount! 🧋🍵🚙',
           'user_id'=>'1',
           'price'=>'30',
           'main_pic' =>'1641405105.jpg'],

           ['title'=>'$5 Weekday Promotion! 🍖🍗🎓',
           'user_id'=>'1',
           'price'=>'15',
           'main_pic' =>'1641465984.jpg'],

           ['title'=>'New Year Promotion 👋🍨🍦',
           'user_id'=>'1',
           'price'=>'22',
           'main_pic' =>'1642136187.jpg'],

           ['title'=>'Chinese New Year Promotion! 🍮🍰',
           'user_id'=>'1',
           'price'=>'12.99',
           'main_pic' =>'1642041598.jpg'],

           ['title'=>'Happy Hour Promo! 🍝🥩🍽🥤',
           'user_id'=>'1',
           'price'=>'9.99',
           'main_pic' =>'1642136105.jpg'],

        ]);

            DB::table('deals_categories')->insert([
                ['deal_id' => '9','category_id' => '3'],
                ['deal_id' => '9','category_id' => '4'],
                ['deal_id' => '10','category_id' => '1'],
                ['deal_id' => '10','category_id' => '3'],
                ['deal_id' => '11','category_id' => '1'],
                ['deal_id' => '11','category_id' => '2'],
                ['deal_id' => '12','category_id' => '1'],
                ['deal_id' => '12','category_id' => '3'],
                ['deal_id' => '13','category_id' => '3'],
                ['deal_id' => '13','category_id' => '4'],
                ['deal_id' => '14','category_id' => '1'],
                ['deal_id' => '14','category_id' => '2'],
                ['deal_id' => '14','category_id' => '3'],
                ['deal_id' => '14','category_id' => '4'],
                ['deal_id' => '15','category_id' => '1'],
                ['deal_id' => '15','category_id' => '2'],
                ['deal_id' => '15','category_id' => '3'],
                ['deal_id' => '16','category_id' => '2'],
                ['deal_id' => '16','category_id' => '3']
            ]);

        DB::table('deals_merchants')->insert([
            ['deal_id' => '9','merchant_id' => '3'],
            ['deal_id' => '10','merchant_id' => '7'],
            ['deal_id' => '11','merchant_id' => '4'],
            ['deal_id' => '12','merchant_id' => '6'],
            ['deal_id' => '13','merchant_id' => '4'],
            ['deal_id' => '14','merchant_id' => '3'],
            ['deal_id' => '15','merchant_id' => '3'],
            ['deal_id' => '16','merchant_id' => '5']
        ]);

    }
}
