<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $news = new News();
        $news->title_en = $faker->text(80);
        $news->intro_en = $faker->text(80);
        $news->text_en = $faker->text(400);
        $news->title_nl = $faker->text(80);
        $news->intro_nl = $faker->text(80);
        $news->text_nl = $faker->text(400);
        $news->image = "fallback-yourfeedback.jpg";

        $news->save();
    }
}
