<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;

class DonationsAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getindex(){
        // get all the donations
        $donations = Donation::orderBy('id','DESC')->get();

        // pass months array to translate dates
        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('admin.read.donations', compact('donations', 'nlmonths', 'enmonths'));
    }
}
