<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seminars')->insert([
            'title' => "夏季研修",
            'target' => "全職員",
            'explain' => "児童が安全に学校生活が送れるように知識を身につけましょう！",
            'date' => "2023/07/22 11:11:11",
            'deadline' => "2023/07/21 11:11:11",
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('seminars')->insert([
            'title' => "冬季研修のアンケート",
            'target' => "初任者",
            'explain' => "2022年度冬季研修のアンケートの回答をお願いします！",
            'date' => "2022/01/25 11:11:11",
            'deadline' => "2022/01/24 11:11:11",
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('seminars')->insert([
            'title' => "冬季研修",
            'target' => "全職員",
            'explain' => "児童が安全に学校生活が送れるように知識を身につけましょう！",
            'date' => "2022/01/05 11:11:11",
            'deadline' => "2022/01/04 11:11:11",
            'created_at' => '2023/07/13 11:11:11'
        ]);
        DB::table('seminars')->insert([
            'title' => "夏季研修のアンケート",
            'target' => "全職員",
            'explain' => "児童が安全に学校生活が送れるように知識を身につけましょう！",
            'date' => "2023/08/10 11:11:11",
            'deadline' => "2023/08/09 11:11:11",
            'created_at' => '2023/07/21 11:11:11'
        ]);
        DB::table('seminars')->insert([
            'title' => "夏季研修のアンケート",
            'target' => "全職員",
            'explain' => "児童が安全に学校生活が送れるように知識を身につけましょう！",
            'date' => "2023/07/25 16:00:11",
            'deadline' => "2023/07/25 15:50:11",
            'created_at' => '2023/07/21 11:11:11'
        ]);
    }
}
