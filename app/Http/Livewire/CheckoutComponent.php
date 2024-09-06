<?php

//Choong Kah Chay

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use illuminate\Support\Facades\Auth;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\StripeController;
use App\Http\Controllers;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $address;
    public $city;
    public $state;
    public $postcode;
    public $phone;
    public $email;

    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postcode' => 'required',
        'phone' => 'required | numeric',
        'email' => 'required | email'
        ]);
    }

    public function placeOrderWithCash(){
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phone' => 'required | numeric',
            'email' => 'required | email'
            ]);  

            $total = Cart::total();
        $productNames = [];
        $quantities = [];
        $totalSum = 0;
    
        
       foreach (Cart::instance('cart')->content() as $item) {
            $productNames[] = $item->model->name; 
            $quantities[] = $item->qty;
            $totalSum += $item->total;
        }

       $productName = implode(', ', $productNames);
       $quantity = implode(', ', $quantities);
       
    
       
        session()->put('checkout.total', $totalSum);
        session()->put('checkout.qty', $quantity);
        session()->put('checkout.name', $productName); 

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = $totalSum;
        $order->Quantity = $quantity;
        $order->product = $productName; 
        $order->Quantity = $quantity;
        $order->product = $productName; 
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->address = $this->address;
        $order->city = $this->city;
        $order->state = $this->state;
        $order->postcode = $this->postcode;
        $order->phone = $this->phone;
        $order->email = $this->email;
        $order->save(); 

        $this->thankyou = 1;
        $this->insertTracking();
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        return redirect()->route('thankyou');
    }

    public function placeOrder()
    {
        
        $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'postcode' => 'required',
        'phone' => 'required | numeric',
        'email' => 'required | email'
        ]);          

        session()->put('checkout.form_data', [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);
        $formData = session()->get('checkout.form_data');
     
   
        $StripeController = new StripeController();
        $StripeController->payment();

         
    }   

    public function orderPlaced($formData)
    {
        $formData = session()->get('checkout.form_data');
      
       $total = Cart::total();
        $productNames = [];
        $quantities = [];
        $totalSum = 0;
    
        
       foreach (Cart::instance('cart')->content() as $item) {
            $productNames[] = $item->model->name; 
            $quantities[] = $item->qty;
            $totalSum += $item->total;
        }

       $productName = implode(', ', $productNames);
       $quantity = implode(', ', $quantities);
       
    
       
        session()->put('checkout.total', $totalSum);
        session()->put('checkout.qty', $quantity);
        session()->put('checkout.name', $productName); 

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = $totalSum;
        $order->Quantity = $quantity;
        $order->product = $productName; 
        $order->Quantity = $quantity;
        $order->product = $productName; 
        $order->firstname = $formData['firstname'];
        $order->lastname = $formData['lastname'];
        $order->address = $formData['address'];
        $order->city = $formData['city'];
        $order->state = $formData['state'];
        $order->postcode = $formData['postcode'];
        $order->phone = $formData['phone'];
        $order->email = $formData['email'];
        $order->save(); 

    }

    public function insertTracking()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentTime = Carbon::now('Asia/Kuala_Lumpur');
        $productEntries = [];

        $ord_id = DB::table('orders')->max('id');
        foreach (Cart::instance('cart')->content() as $item) {
            $productName = $item->model->name; // Append product name to the string
            $quantity = $item->qty;

            $productEntry = $productName . ' X ' . $quantity;
            $productEntries[] = $productEntry;
        }
        // Prepare data for insertion into tracking_log table
        $trackData = [
            'order_id' => $ord_id,
            'order_item' => implode(', ', $productEntries), // Combine all product entries with comma and space
            'courier_type' => '0',
            'usr_id' => Auth::user()->id,
            'status' => '0',
            'total'=>$item->total,
            'last_function' => 'Add Order',
            'date_time' => $currentTime, // Use $currentTime directly
        ];

        // Insert log data into tracking_log table
        DB::table('tracking')->insert($trackData);
        
        $track_id = DB::table('tracking')->max('tracking_id');
        $trackData2 = [
            'order_id' => $ord_id,
            'tracking_id' => $track_id,
            'order_item' => implode(', ', $productEntries), 
            'courier_type' => '0',
            'usr_id' => Auth::user()->id,
            'status' => '0',
            'total'=>$item->total,
            'last_function' => 'Add Order',
            'date_time' => $currentTime,
        ];
        DB::table('tracking_log')->insert($trackData2);
    }

    public function render()
    {
        
        return view('livewire.checkout-component');
        
    }
}
