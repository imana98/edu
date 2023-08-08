<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '今岡真菜',
            'email' => 'mmmm@test.com',
            'password' => Hash::make('passwordmmmm'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => '小林小太郎',
            'email' => 'kkkk@test.com',
            'password' => Hash::make('passwordrrrr'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => '金田かね子',
            'email' => 'nnnn@test.com',
            'password' => Hash::make('passwordnnnn'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => '柴山司馬太郎',
            'email' => 'ssss@test.com',
            'password' => Hash::make('passwordssss'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => '霜柱しも吉',
            'email' => 'bbbb@test.com',
            'password' => Hash::make('passwordbbbb'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('users')->insert([
            'name' => '鷲塚わし子',
            'email' => 'wwww@test.com',
            'password' => Hash::make('passwordwwww'),
            'created_at' => '2023/07/13 11:11:11'
        ]);
    }
}
