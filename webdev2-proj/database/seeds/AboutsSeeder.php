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
        $abouts->text_en = $faker->realText();
        $abouts->text_nl = $faker->realText();
        $abouts->save();
    }
}
