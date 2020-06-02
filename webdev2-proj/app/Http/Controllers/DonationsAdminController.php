<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;

class DonationsAdminController extends Controller
{
    public function getindex(){
        $donations = Donation::orderBy('id','DESC')->get();

        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('admin.read.donations', compact('donations', 'nlmonths', 'enmonths'));
    }
}
