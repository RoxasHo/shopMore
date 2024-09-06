<?php

//Choong Kah Chay

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire;
use Cart;


class StripeController extends Controller
{
    public $thankyou;
    public $session;

   public function index()
    {
        return view('home.index');
    }

    public function payment()
    {

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $totalSum = 0;
        foreach (Cart::instance('cart')->content() as $item) {
            $total = $item->total;
            $totalSum += $total;
            $data = [
                'totalSum' => $totalSum,
            ];
        }

        $totalAmount = $totalSum * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => 'Total:',
                        ],
                        'unit_amount' => $totalAmount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' =>'payment',
            'success_url' => route('thankyou.storingdb'),
            
        ]);
        $this->thankyou = 1;
        
        return redirect()->away($session->url);
   
    } 


    public function success()
    {
        return redirect()->route('home.index');
    }
}
