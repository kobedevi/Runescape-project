<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            $faker = Faker\Factory::create();
            $page = new Page();
            $page->title_en = $faker->text(50);
            $page->title_nl = $faker->text(50);
            $page->slug_en = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $page->title_en)));
            $page->slug_nl = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $page->title_nl)));
            $page->intro_en = '<p>' . $faker->text(150) . '</p>';
            $page->intro_nl = '<p>' . $faker->text(150) . '</p>';
            $page->text_en = '<p>' . $faker->realText(1000) . '</p>';
            $page->text_nl = '<p>' . $faker->realText(1000) . '</p>';
            $page->active = $faker->numberBetween(0,1);
            $page->save();
        }
    }
}
