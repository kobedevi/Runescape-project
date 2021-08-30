<?php

use Illuminate\Database\Seeder;
use App\Newsletter;

class APISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsletter = new Newsletter();
        $newsletter->key = "APInewsletter here";
        $newsletter->active = "1";
        $newsletter->save();
    }
}
