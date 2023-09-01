<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class ProductController extends Controller
{
    public function checkout()
    {
        $products = Product::all();

        return view('admin.pages.checkout', compact('products'));
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'unit_amount'  => $total,
                        'product_data' => [
                            "name" => $request->name,
                        ],
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }


    /* try {
        $paymentIntent = PaymentIntent::create([
            'amount' => $req->price * 100, // Amount should be in cents
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return view('products.payment', compact('product', 'paymentIntent'));
    } catch (\Exception $e) {
        // Handle any errors that occur during payment setup
        return back()->with('error', 'Payment failed. Please try again later.');
    }
    */
    public function success()
    {
        return redirect()->back()->with('success', 'Payment Successful');
    }


}