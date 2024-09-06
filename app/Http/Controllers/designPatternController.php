<?php

//Choong Kah Chay

namespace App\Http\Controllers;
use App\PaymentMethods\PaymentStrategyContext;
use Illuminate\Http\Request;
use App\PaymentMethods\cash;
use App\PaymentMethods\paymentMethod;
use App\PaymentMethods\stripePayment;


class designPatternController
{
    public function store(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        $strategyService = new PaymentStrategyContext();
        $strategyService->processPayment($paymentMethod);

        return $strategyService->pay();
    }
}