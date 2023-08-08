<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => '林田隼人',
            'email' => 'hayashida@test.com',
            'password' => Hash::make('passwordhhhh'),
            'created_at' => '2023.07.13 11:11:11'
        ]);
    }
}
