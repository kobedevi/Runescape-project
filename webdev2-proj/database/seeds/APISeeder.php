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
        $newsletter->key = "09eb082c1ebfbf0c4fa1e67327defe83-us10";
        $newsletter->active = "1";
        $newsletter->save();
    }
}
