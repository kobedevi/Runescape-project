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
        $news->slug_en = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $news->title_en)));
        $news->intro_en = $faker->text(80);
        $news->text_en = $faker->text(400);
        $news->title_nl = $faker->text(80);
        $news->slug_nl = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $news->title_nl)));
        $news->intro_nl = $faker->text(80);
        $news->text_nl = $faker->text(400);
        $news->image = "fallback-yourfeedback.jpg";

        $news->save();
    }
}
