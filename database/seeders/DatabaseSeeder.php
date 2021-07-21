<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\skill;
use Database\Seeders\skillSeeder;
use Database\Seeders\questionSeeder;
use Database\Seeders\settingSeeder;
use Database\Seeders\catSeeder;
use Database\Seeders\examsSeeder;

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
            catSeeder::class,
            skillSeeder::class,
            questionSeeder::class,
            settingSeeder::class,
            examsSeeder::class,
        ]);
    }
}
