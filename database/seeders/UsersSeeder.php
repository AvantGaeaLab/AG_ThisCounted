<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'email'=>'ifm4e.2@gmail.com',
                'phone_number'=>'+966543268665',
                'password'=>'11223344'],
        ]);
    }
}
