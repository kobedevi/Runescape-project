<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBanner;
class HomeController extends Controller
{
    public function getIndex() {
        $banners = HomeBanner::get();
        return view('home', compact('banners'));
    }
}
