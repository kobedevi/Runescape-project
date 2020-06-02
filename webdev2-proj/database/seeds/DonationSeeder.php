<?php

use Illuminate\Database\Seeder;
use App\Donation;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 2; $i++) {
            $faker = Faker\Factory::create();

            $donation = new Donation();
            $donation->public = "public";
            $donation->name = $faker->name;
            $donation->email = $faker->email;
            $donation->amount = $faker->randomFloat(2,1,999);
            $donation->message = $faker->text(200);

            $donation->save();
        }
    }
}
