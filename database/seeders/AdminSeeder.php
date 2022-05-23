<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'role' => 'Admin',
        ]);
        DB::table('user_info')->insert([
            'account_id' => 1,
            'name' => 'Nguyễn Khắc Hiếu',
            'gender' => 'Nam',
            'birthday' => \Carbon\Carbon::now(),
            'address' => 'Thanh Hoá',
            'phone' => '123456789',
        ]);
    }
}
