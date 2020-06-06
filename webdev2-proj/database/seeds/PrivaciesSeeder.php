<?php

use Illuminate\Database\Seeder;
use App\Privacy;

class PrivaciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $privacy = new Privacy();
        $privacy->text_en = '<p>' . $faker->realText(1000) . '</p>';
        $privacy->text_nl = '<p>' . $faker->realText(1000) . '</p>';
        $privacy->save();
    }
}
