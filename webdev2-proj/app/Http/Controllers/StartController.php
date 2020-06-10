<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBanner;

class StartController extends Controller
{
    // get homebanners
    public function getIndex() {
        $banners = HomeBanner::get();
        return view('start', compact('banners'));
    }
}
