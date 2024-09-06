<?php

//CKC

namespace App\paymentMethods;

use Illuminate\Http\Request;
use App\PaymentMethods\cash;
use App\PaymentMethods\paymentMethod;
use App\PaymentMethods\stripePayment;
use App\Controllers\designPatternController;


class PaymentStrategyContext 
{
    private PaymentMethod $paymentStrategy;

    public function processPayment(string $paymentMethod)
    {

        $this->paymentStrategy = match ($paymentMethod) {
            'cash_on_delivery' => new cash(),
            'credit_debit' => new stripePayment(),
            //default => throw new \InvalidArgumentException('Invalid payment method'),
        };
    }

    public function pay()
    {
        return $this->paymentStrategy->pay();
    }
}
