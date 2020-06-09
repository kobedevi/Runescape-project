<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->password = "$2y$10$4xN8KisNT5uDQoBq0mLZq.ChstRqTVxP4xkdlqugl9/yHhFoLlzW2"; //adminadmin
        $user->save();
    }
}
