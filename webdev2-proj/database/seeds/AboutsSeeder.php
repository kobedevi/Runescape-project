<?php

use Illuminate\Database\Seeder;
use App\About;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $abouts = new About();
        $abouts->text_en = '<p>' . $faker->realText(1000) . '</p>';
        $abouts->text_nl = '<p>' . $faker->realText(1000) . '</p>';
        $abouts->save();
    }
}
