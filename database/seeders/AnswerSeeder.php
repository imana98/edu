<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'user_id' => 1,
            'survey_id' => 1,
            'detail_id' => 4,
            'answer01' => '回答０１',
            'answer02' => '回答０２',
            'answer03' => '回答０３',
            'answer04' => '回答０４',
            'created_at' => '2023/07/13 11:11:11',
        ]);
    }
}
