<?php

namespace App\Http\Controllers;
use Cart;
use Session;
use Stripe;
use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class StripeController extends Controller
{   
    public function stripe()
    {
        return view('paymentgateway.payment');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return redirect()->route('welcome');
    }
}
