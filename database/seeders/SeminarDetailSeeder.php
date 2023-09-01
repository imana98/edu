<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeminarDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seminar_details')->insert([
            'seminar_id' => 1,
            'owner_id' => 1,
            'speaker_name' => '今岡真菜',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の基礎知識',
            'descriptions' => '知的障害の基礎について講義をします。',
            'filename' => 'sample1.jpg',
            'date' => "2023/07/22 11:11:11",
        ]);
        DB::table('seminar_details')->insert([
            'seminar_id' => 4,
            'owner_id' => 4,
            'speaker_name' => '柴山司馬太郎',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の国語',
            'descriptions' => '知的障がい児の国語の授業について講義をします。',
            'filename' => 'sample3.jpg',
            'date' => "2023/12/25 11:11:11",
        ]);
        DB::table('seminar_details')->insert([
            'seminar_id' => 4,
            'owner_id' => 1,
            'speaker_name' => '今岡真菜',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の自立活動',
            'descriptions' => '知的障がい児の自立活動の授業について講義をします。',
            'filename' => 'sample4.jpg',
            'date' => "2023/12/25 11:11:11",
        ]);
        DB::table('seminar_details')->insert([
            'seminar_id' => 4,
            'owner_id' => 2,
            'speaker_name' => '小林小太郎',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の自立活動',
            'descriptions' => '知的障がい児の自立活動の授業について講義をします。',
            'filename' => 'sample5.jpg',
            'date' => "2023/12/25 11:11:11",
        ]);
        DB::table('seminar_details')->insert([
            'seminar_id' => 4,
            'owner_id' => 3,
            'speaker_name' => '金田かね子',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の自立活動',
            'descriptions' => '知的障がい児の自立活動の授業について講義をします。',
            'filename' => 'sample6.jpg',
            'date' => "2023/12/25 11:11:11",
        ]);
        DB::table('seminar_details')->insert([
            'seminar_id' => 5,
            'owner_id' => 3,
            'speaker_name' => '金田かね子',
            'seminar_name' => '夏季研修',
            'target' => "全職員",
            'title' => '知的障害の自立活動',
            'descriptions' => '知的障がい児の自立活動の授業について講義をします。',
            'filename' => 'sample7.jpg',
            'date' => "2023/07/25 16:00:11",
        ]);
    }
}
