<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;

class DonationsController extends Controller
{
    public function getindex(){
        return view('donate');
    }
}
