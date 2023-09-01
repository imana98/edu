<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert([
            'seminar_id' => 4,
            'title' => '夏季研修のアンケート',
            'question01' => '講義の感想',
            'question02' => '反省点',
            'question03' => '〇〇について',
            'question04' => 'その他',
            'created_at' => '2023/07/13 11:11:11',
        ]);
    }
}
