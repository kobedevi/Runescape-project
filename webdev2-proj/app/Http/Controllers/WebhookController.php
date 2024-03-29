<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Mail;
use App\Donation;

class WebhookController extends Controller
{
    public function handle(Request $r) {
        if (! $r->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($r->id);

        // if donation is paid add it to the database
        if ($payment->isPaid()) {
            $donation = new Donation;
            $donation->public = $payment->metadata->publication;
            $donation->name = $payment->metadata->name;
            $donation->email = $payment->metadata->email;
            $donation->message = $payment->metadata->message;
            $donation->amount = $payment->amount->value;

            $donation->save(); 
        } else {
            return;
        }
    }
}
