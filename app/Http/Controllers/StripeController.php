<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index');
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('app.stripe_sk'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Weekly Opportunities',
                        ],
                        'unit_amount' => 24900,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.index')
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('stripe.index');
    }
}
