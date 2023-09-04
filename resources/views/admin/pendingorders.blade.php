@extends('admin.layouts.template')
@section('page_title')
Admin - Pending Orders
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4">
          <span class="text-muted fw-light">Page/</span> Pending Orders
        </h4>
    </div>
     <!-- Hoverable Table rows -->
     <div class="card">
        <h5 class="card-header">Available Category Information</h5>
       
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Shipping Information</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Will Pay</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($pending_orders as $order)
              <tr>
                @php
            $user_name = App\Models\User::where('id', $order->user_id)->value('name');
            $product_name= App\Models\Product::where('id',$order->product_id)->value('product_name');
                @endphp
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> 
                    <strong>{{ $user_name }}</strong>
                 </td>
                  <td> 
                    <ul class="list-unstyled">
                        <li> Phone Number - {{ $order->shipping_phoneNumber }}</li>
                        <li> Country - {{ $order->shipping_country }}</li>
                        <li> City - {{$order->shipping_city  }}</li>
                        <li>Postal Code - {{ $order->shipping_postalcode }}</li>
                    </ul>
                  </td>
                  <td>{{ $product_name }}</td>
                  <td>{{ $order->quantity }}</td>
                  <td>{{ $order->total_price }}</td>
                  <td>{{ $order->status }}</td>
                  <td>
                    <a class="btn btn-success" href="">
                        <i class="bx bx-edit-alt me-1"></i>Approve Now</a>
                  </td>
              </tr>
             @endforeach
          </tbody>
          </table>
        </div>
      </div>
</div>
@endsection
