<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyRegisterController extends Controller
{
    public function getIndex() {
        // dd('hi');
        return view('auth.register', ['language' => app()->getLocale()]);
    }
}
