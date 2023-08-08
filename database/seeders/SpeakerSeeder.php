<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('speakers')->insert([
            'user_id' => 1,
            'name' => '今岡真菜',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
            'email' => 'mmmm@test.com',
        ]);
        DB::table('speakers')->insert([
            'user_id' => 2,
            'name' => '小林小太郎',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
            'email' => 'kkkk@test.com',
        ]);
        DB::table('speakers')->insert([
            'user_id' => 3,
            'name' => '金田かね子',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
            'email' => 'nnnn@test.com',
        ]);
        DB::table('speakers')->insert([
            'user_id' => 4,
            'name' => '柴山司馬太郎',
            'password' => Hash::make('password1234'),
            'created_at' => '2023/07/13 11:11:11',
            'email' => 'ssss@test.com',
        ]);
    }
}
