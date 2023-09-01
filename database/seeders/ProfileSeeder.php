<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 2,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 3,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 4,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 5,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
        DB::table('profiles')->insert([
            'user_id' => 6,
            'filename' => 'icon02.png',
            'created_at' => '2023/07/13 11:11:11',
        ]);
    }
}
