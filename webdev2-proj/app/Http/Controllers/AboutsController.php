<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;


class AboutsController extends Controller
{ 
    public function getindex(){
        $text = About::firstOrFail();
        return view('about', compact('text'));
    }
}
