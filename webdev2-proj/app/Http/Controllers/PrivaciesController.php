<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privacy;

class PrivaciesController extends Controller
{    
    public function getindex(){
        // get the privacy text
        $text = Privacy::firstOrFail();
        return view('privacypolicy', compact('text'));
    }
}
