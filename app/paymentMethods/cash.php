<?php

//Choong Kah Chay

namespace App\paymentMethods;

use Livewire\Component;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire;
use Cart;
use App\Models\Order;
use App\Models\Payment;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cash implements paymentMethod
{

    public function pay()
    {
        $latestOrder = Order::latest()->first();
        $latestOrderId = optional($latestOrder)->id;
        $orderId = $latestOrderId ? $latestOrderId + 1 : 1;

        $totalSum = 0;
        foreach (Cart::instance('cart')->content() as $item) {
            $total = $item->total;
            $totalSum += $total;
            $data = [
                'totalSum' => $totalSum,
            ];
        }

        $paymentMethod = 'Cash on Delivery';

       $userId = Auth::id();
        $payment = new Payment();
        $payment->order_id = $orderId;
        $payment->user_id = $userId;
        $payment->total = $totalSum;
        $payment->payment_method = $paymentMethod;
        $payment->save();
        
        return [
            'REMINDER: CASH ON DELIVERY Payment Method selected, please prepare exact cash amount for payment upon delivery.'
        ];

    }
   
          
}