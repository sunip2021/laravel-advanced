<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        return view('stripe');
    }
    public function store(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $charge = $stripe->charges->create([
            'amount' => $request->price*100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description'=>'from sunip hazra'
        ]);
        dd($charge);
    }
}
