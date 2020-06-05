<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Log;
use App\Donation;
use App;

class DonationsController extends Controller
{   
    public function getSucces(){
        return view('donateSucces');
    }
    
    public function getindex(){
        $donations = Donation::where('public', 'public')->orderBy('id','DESC')->paginate(20);

        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('donate', compact('donations', 'nlmonths', 'enmonths'));
    }
    
    public function preparePayment(Request $r)
    {
        $value = number_format ($r->donation , 2);
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $value
            ],
            "description" => "Runescape Mobile donation",
            "webhookUrl" => route('webhooks.mollie', ['language' => App::getLocale()]),
            "redirectUrl" => route('donationSuccess', App::getLocale()),
            "metadata" => [
                "publication" => $r->publication,
                "name" => $r->name,
                "email" => $r->email,
                "message" => $r->message,
            ],
        ]);
        $payment = Mollie::api()->payments->get($payment->id);            
        return redirect($payment->getCheckoutUrl(), 303);
    }
}
