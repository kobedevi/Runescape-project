<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendContact(Request $r){

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
        return redirect()->route('start', $lang);
    }
}
