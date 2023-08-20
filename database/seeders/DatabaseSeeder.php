<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            OwnerSeeder::class,
            SpeakerSeeder::class,
            SeminarSeeder::class,
            SeminarDetailSeeder::class,
            EntrySeeder::class,
            RecordSeeder::class,
            ProfileSeeder::class,
        ]);
    }
}
