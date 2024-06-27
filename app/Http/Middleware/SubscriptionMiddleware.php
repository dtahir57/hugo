<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( !auth()->user()->subscribedToPrice(config('stripe.price_id'), config('stripe.prod_id')) OR !auth()->user()->subscribedToPrice(config('stripe.mo_price_id'), config('stripe.mo_prod_id'))) {
            return redirect()->route('stripe.checkout', config('stripe.price_id'));
        }  
        // if (!auth()->user()->subscribed()) {
        //     return redirect()->route('stripe.checkout', config('stripe.price_id'));
        // }
            return $next($request);

    }
}
