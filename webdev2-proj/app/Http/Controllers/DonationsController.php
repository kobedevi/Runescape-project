<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Donation;
use App;

class DonationsController extends Controller
{   
    public function getSucces(){
        return view('donateSucces');
    }
    
    public function getindex(){
        // get all public donations 
        $donations = Donation::where('public', 'public')->orderBy('id','DESC')->paginate(20);

        // array to translate month names
        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('donate', compact('donations', 'nlmonths', 'enmonths'));
    }
    
    public function preparePayment(Request $r)
    {
        // convert amount to string
        $value = number_format ($r->donation , 2);
        // create payment
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $value
            ],
            "description" => "Runescape Mobile donation",
            "webhookUrl" => route('webhooks.mollie'),
            "redirectUrl" => route('donationSuccess', App::getLocale()),
            "metadata" => [
                "publication" => $r->publication,
                "name" => $r->name,
                "email" => $r->email,
                "message" => $r->message,
            ],
        ]);
        $payment = Mollie::api()->payments->get($payment->id);
        
        // send email 
        if(app()->getLocale() == 'nl'){
            Mail::send('mails.donationnl', compact('r'), function ($message) use($r) {
                $message->sender('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->to($r->email, $r->name);
                $message->cc('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->subject('Donation Runescape');
            });         
        }else {
            Mail::send('mails.donationen', compact('r'), function ($message) use($r) {
                $message->sender('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->to($r->email, $r->name);
                $message->cc('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->subject('Donation Runescape');
            });
        }
        return redirect($payment->getCheckoutUrl(), 303);
    }
}
