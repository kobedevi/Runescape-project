<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use App;
use App\Newsletter as Key;

class MailController extends Controller
{
    public function sendContact(Request $r){

        // what mail to send 
        $lang = app()->getLocale();
        if($lang == 'nl') {
            Mail::send('mails.contactnl', compact('r'), function ($message) use($r) {
                $message->sender('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->to($r->email, $r->name);
                $message->cc('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->subject('contact form');
            }); 
        } else {
            Mail::send('mails.contacten', compact('r'), function ($message) use($r) {
                $message->sender('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->to($r->email, $r->name);
                $message->cc('kobedevi@student.arteveldehs.be', 'Kobe Devillé');
                $message->subject('contact form');
            }); 
        }
        return redirect()->route('start', $lang)->with('succes', trans('alert.contactsent'));
    }

    public function store(Request $request) {
        // set currently active api key
        $key = Key::where('active', "1")->pluck('key');
        config()->set(['newsletter.apiKey' => $key[0]]);

        // check if user is already subscribed 
        if ( ! Newsletter::isSubscribed($request->user_email) ) {
            Newsletter::subscribePending($request->user_email);
            return redirect('/'.App::getLocale()."#newsletter")->with('succes', trans('alert.subscribe'));
        }
        return redirect('/'.App::getLocale()."#newsletter")->with('warning', trans('alert.alreadysubscribed'));
    }
}