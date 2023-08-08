<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            'user_id' => 1,
            'name' => '今岡真菜',
            'email' => 'mmmm@test.com',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('owners')->insert([
            'user_id' => 2,
            'name' => '小林小太郎',
            'email' => 'kkkk@test.com',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('owners')->insert([
            'user_id' => 3,
            'name' => '金田かね子',
            'email' => 'nnnn@test.com',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('owners')->insert([
            'user_id' => 4,
            'name' => '柴山司馬太郎',
            'email' => 'ssss@test.com',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
        ]);
    }
}
