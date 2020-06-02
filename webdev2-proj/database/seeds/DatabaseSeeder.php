<?php

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
        for ($i=0; $i < 50; $i++) { 
            $this->call(NewsSeeder::class);
            $this->call(DonationSeeder::class);
        }
        $this->call(HomebannerSeeder::class);
        $this->call(PrivaciesSeeder::class);
        $this->call(AboutsSeeder::class);
    }
}
