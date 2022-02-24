<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name'=>'Admin1',
                'email'=>'Admin1@tc.com',
                'phone_number'=>'+966511111',
                'password'=>Hash::make('11223344')
            ],
            [
                'name'=>'Admin2',
                'email'=>'Admin2@tc.com',
                'phone_number'=>'+9665222222',
                'password'=>Hash::make('11223344')
            ],
            [
                'name'=>'Admin3',
                'email'=>'Admin3@tc.com',
                'phone_number'=>'+9665333333',
                'password'=>Hash::make('11223344')
            ],
            [
                'name'=>'Normal User',
                'email'=>'User@tc.com',
                'phone_number'=>'44444444',
                'password'=>Hash::make('11223344')
            ],
        ]);
    }
}
