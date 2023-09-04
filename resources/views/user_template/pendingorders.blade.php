@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
          {{  session()->get('message') }}
        </div>
        @endif
        <table class="table">
            <thead>
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
                    <td>${{ $item->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection
