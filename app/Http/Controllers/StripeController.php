<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index');
    }

    public function checkout(Request $request, $plan_id)
    {
        return $request->user()
                        ->newSubscription(config('stripe.prod_id'), $plan_id)
                        ->trialDays(8)
                        ->checkout([
                            'success_url' => route('home'),
                            'cancel_url' => route('stripe.cancel')
                        ]);
    }

    public function success()
    {
        return view('stripe.index');
    }

    public function cancel()
    {
        return view('stripe.cancel');
    }
}
