@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
          {{  session()->get('message') }}
        </div>
        @endif
        <div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="{{route('Home')}}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{ route('addtocart') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Pending Orders</strong></div>
              </div>
            </div>
          </div>

        <div class="p-3 p-lg-5 ">
                <table class="table site-block-order-table mb-5">
            <thead>
                <th>Image Product</th>
                <th>Product Name</th>
                <th>Price</th>

            </thead>
            <tbody>
                @foreach ($pending_orders as $item)
                <tr>
                        @php

                    $product_name= App\Models\Product::where('id',$item->product_id)->value('product_name');
                    $product_img= App\Models\Product::where('id',$item->product_id)->value('product_img');

                    @endphp

                    <td> <img src="{{ asset($product_img) }}" alt="{{ $product_name }}" style="height: 50px"> </td>
                    <td>{{ $product_name }}</td>
                    <td>{{ $item->total_price }} $</td>
                </tr>

                @endforeach

            </tbody>
        </table>
        </div>
</div>

@endsection
