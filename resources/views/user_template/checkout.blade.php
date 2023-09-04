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
            <div class="form-group row">
              <div class="col-md-9">
                <h3 class=""> {{ auth()->user()->name }}</h3>
                <hr>
                <p>Your order will be sending At :<br> {{ $shipping_infos->adresse . ', ' . $shipping_infos->city_name . ', ' . $shipping_infos->country . ', ' . $shipping_infos->postal_code }}</p>
                <hr>
                 <p> Phone Number : {{$shipping_infos->phone_number}}</p>
                <hr>

              </div>
            </div>
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

                <div class="border p-3 mb-3">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                  <div class="collapse" id="collapsebank">
                    <div class="py-2">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 mb-5">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                  <div class="collapse" id="collapsepaypal">
                    <div class="py-2">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>
            <form action="{{ route('placeorder') }}" method="POST">
                @csrf
                            <div class="form-group">
                            <button class="btn btn-success btn-lg btn-block">Place Order</button>
                            </div>
            </form>
            <form action="" method="POST">
                <div class="form-group">
                  <button class="btn btn-danger btn-lg btn-block">Cancel Order</button>
                </div>
            </form>

              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

@endsection


