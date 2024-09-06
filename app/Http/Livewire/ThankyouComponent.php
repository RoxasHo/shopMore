<?php

//Choong Kah Chay

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Http\Controllers;
use App\Http\Livewire\CheckoutComponent;
use Cart;


class ThankyouComponent extends Component
{

    public function render()
    {              
        
        return view('livewire.thankyou-component');
    }

    public function storingdb()
    {
        
        $formData = session()->get('checkout.form_data');
        $CheckoutComponent = new CheckoutComponent();
        $CheckoutComponent->orderPlaced($formData);

        $CheckoutComponent = new CheckoutComponent();
        $CheckoutComponent->insertTracking();

        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        return redirect()->route('thankyou');
        
        

    }
}
