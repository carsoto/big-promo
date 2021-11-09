<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(CitiesSeeder::class);
        \Artisan::call('passport:install');
        // \App\Models\User::factory(10)->create();
    }
}
