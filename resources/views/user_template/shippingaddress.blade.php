@extends('user_template.layouts.template')

@section('main-content')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
     
      <div class="row"> 
       
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Billing Details</h2>
          <div class="p-3 p-lg-5 border">
           
           <form action="{{ route('addshippingadress') }}" method="POST">
            @csrf
            <div class="form-group row">
             
              <div class="col-md-6">
                <h3 class=""> {{ auth()->user()->name }}</h3>
              </div>
            </div>
       
             <div class="form-group">
                <label for="country" class="text-black">Country <span class="text-danger">*</span></label>

                <select id="countrySelect" class="form-control" name="country">
                    <option value="">Select a country</option>

                </select>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                  <label for="city_name" class="text-black">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="city_name" name="city_name">
                </div>
                <div class="col-md-6">
                  <label for="postal_code" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="postal_code" name="postal_code">
                </div>
              </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="addresse" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="addresse" name="adresse" placeholder="Street address">
              </div>
            </div>
            <div class="form-group row mb-5">
            
              <div class="col-md-6">
                <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
              </div>
            </div>
            <div class="form-group">
              <label for="order_notes" class="text-black">Order Notes</label>
              <textarea name="order_notes" id="order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Next" class="btn btn-primary btn-lg btn-block">
              </div>
           </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Your Order</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>

                    @php
                        $total=0;
                    @endphp
                    @foreach ($carts as $cart)
                    @php
                    $product_name= App\Models\Product::where('id',$cart->product_id)->value('product_name');
                    $product_img= App\Models\Product::where('id',$cart->product_id)->value('product_img');
                    $price= App\Models\Product::where('id',$cart->product_id)->value('price');
                    @endphp
                    @php
                        $total = $cart->price +$total;
                    @endphp
                    <tr>
                        <td>{{ $product_name }} <strong class="mx-2">x</strong>   {{ $cart->quantity }}</td>
                        <td>${{ $cart->price }}</td>
                      </tr>
                   @endforeach

                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black">${{$total  }}</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold"><strong>${{ $total }}</strong></td>
                    </tr>
                  </tbody>
                </table>

               

                

              </div>
            </div>
          </div>

        </div>

    <!-- </form> -->
      </div>
      
    </div>
  </div>
<script src={{ asset('js/location.js') }}></script>
@endsection


