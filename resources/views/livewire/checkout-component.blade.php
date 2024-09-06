<!-- CKC -->
<div>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                       
                       
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing and Shipping Details</h4>
                        </div>
                        <form method="post" wire:submit.prevent="placeOrder" autocomplete="off">
                        @csrf
                            <div class="form-group">
                                <input type="text" required="" name="firstname" placeholder="First name *" wire:model="firstname">
                                @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="lastname" placeholder="Last name *" wire:model="lastname">
                                @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                           
                           
                            <div class="form-group">
                                <input type="text" name="billing_address" required="" placeholder="Address *" wire:model="address">
                                @error('address') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *" wire:model="city">
                                @error('city') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom_select"> 
                                    <select wire:model="state">
                                        <option value="">Select a State</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Malacca">Malacca</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Penang">Penang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Putrajaya">Putrajaya</option>
                                        <option value="Labuan">Labuan</option>
                                    </select>
                                    @error('state') <span class="text-danger">{{$message}}</span> @enderror
                                </div> 

                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="postcode" placeholder="Postcode / ZIP *" wire:model="postcode">
                                @error('postcode') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="phone" placeholder="Phone *" wire:model="phone">
                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *"
                                wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                         
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(Cart::instance('cart')->content() as $item)
                                        <tr>
                                        <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/products')}}/{{$item->model->image}}" alt="{{$item->name}}"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="product-details.html">{{$item->model->name}}</a></h5>  
                                        </td>

                                        <td class="price" data-title="Price"><span>{{ $item->model->regular_price }}</span></td>
                                        <td class="text-center" data-title="Quantity">
                                        <span>{{ $item->qty }}</span>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{$item->subtotal}} </span></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                            <td colspan="3"></td>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><strong>{{ Cart::instance('cart')->subtotal() }}</strong></td> 
</tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-lg-6 col-md-12">
                              <!--  <div class="border p-md-4 p-30 border-radius cart-totals"> -->
                                 <!--  <div class="heading_s1 mb-3"> -->
                                        <h4>Total Payment</h4>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table" style="width: 100%; border-collapse: collapse;">
    <tbody>
        <tr style="border-bottom: 1px solid #ddd;">
            <td class="cart_total_label" style="padding: 10px;">Cart Subtotal</td>
            <td class="cart_total_amount" style="padding: 10px;"><span class="font-lg fw-900 text-brand">RM {{Cart::subtotal()}}</span></td>
        </tr>
        <tr style="border-bottom: 1px solid #ddd;">
            <td class="cart_total_label" style="padding: 10px;">Tax</td>
            <td class="cart_total_amount" style="padding: 10px;"><span class="font-lg fw-900 text-brand">RM {{Cart::tax()}}</span></td>
        </tr>
        <tr style="border-bottom: 1px solid #ddd;">
            <td class="cart_total_label" style="padding: 10px;">Shipping</td>
            <td class="cart_total_amount" style="padding: 10px;"><i class="ti-gift mr-5"></i> Free Shipping</td>
        </tr>
        <tr>
            <td class="cart_total_label" style="padding: 10px;">Total</td>
            <td class="cart_total_amount" style="padding: 10px;"><strong><span class="font-xl fw-900 text-brand">RM {{Cart::total()}}</span></strong></td>
        </tr>
    </tbody>
</table>

                                 <!-- </div> -->
                                
                                </div>
                            </div>

                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                <h5>Pay With:</h5>
                        <form method="POST" action="{{ route('designPatternController') }}">
                                        @csrf
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_method" id="cash_on_delivery" value="cash_on_delivery">
                                            <label class="form-check-label" for="cash_on_delivery">Cash on Delivery<label>                                         
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" required="" type="radio" name="payment_method" id="credit_debit" value="credit_debit">
                                            <label class="form-check-label" for="credit_debit">Credit/Debit Card</label>  
                                            
                                        </div>   
                                        <button type="submit" class="btn btn-fill-out btn-block mt-30" ><strong>Confirm Payment Method</strong></button>
                                       
                                        
                                    </form>
                                    <a href="#" wire:click.prevent="placeOrder" class="btn btn-fill-out btn-block mt-30" >Place Order with Credit/Debit Card</a>

                                    <a href="#" wire:click.prevent="placeOrderWithCash" class="btn btn-fill-out btn-block mt-30" >Place Order with Cash on Delivery</a>
                                    
                               
                                <div class="payment_method">
                                    
                             
                            </div>
                            </div>

                          
                          
                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
