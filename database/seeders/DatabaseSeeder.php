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
        $this->call(SettingsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(HomePageSeeder::class);
        $this->call(FooterDataSeeder::class);
    }
}
