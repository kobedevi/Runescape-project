<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;
use App\Donation;

class WebhookController extends Controller
{
    public function handle(Request $r, $lang) {
        if (! $r->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($r->id);

        if ($payment->isPaid()) {
            $donation = new Donation;
            $donation->public = $payment->metadata->publication;
            $donation->name = $payment->metadata->name;
            $donation->email = $payment->metadata->email;
            $donation->message = $payment->metadata->message;
            $donation->amount = $payment->amount->value;

            $donation->save();

            Log::info('Betaling is gelukt ');
            return redirect()->route('donate', app()->getLocale())->with('succes', trans('alert.paysucces'));

        } else {
            Log::warning('Betaling is mislukt ');
            return redirect()->route('donate', app()->getLocale())->with('danger', trans('alert.payfail'));
        }
    }
}
