<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            'user_id' => 1,
            'detail_id' => 1,
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('records')->insert([
            'user_id' => 1,
            'detail_id' => 3,
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('records')->insert([
            'user_id' => 2,
            'detail_id' => 1,
            'created_at' => '2023/07/13 11:11:11'
        ]);
    }
}
