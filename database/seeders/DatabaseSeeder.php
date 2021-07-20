<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\skill;
use Database\Seeders\skillSeeder;

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
            // catSeeder::class,
            // skillSeeder::class,
            questionSeeder::class,
        ]);
    }
}
