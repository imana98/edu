<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert([
            'user_id' => 1,
            'detail_id' => 2,
            'seminar_id' => 2,
            'created_at' => '2023/07/13 11:11:11',
            'seminar_id' => 2,
        ]);
    }
}
