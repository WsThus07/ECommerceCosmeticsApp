@extends('admin.layouts.template')
@section('page_title')
Admin - All Products
@endsection
@section('content')
<div class="container-xxl flex-grow-1 mt-5">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4 ">
          <span class="text-muted fw-light">Page/</span> All Products
        </h4>
      </div>
       @if(session()->has('message'))

            <div class="alert alert-success">
                {{  session()->get('message') }}
            </div>

      @endif
    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Available Products Information</h5>

      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Product Name</th>
              <th>Img</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($products as $product)

            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->id }}</strong></td>
              <td>{{ $product->product_name }}</td>
              <td>
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-6">
                    <img src="{{ asset($product->product_img) }}" alt="{{ $product->product_name }}" height="100px">
                    </div>
                    <div class="col-sm-6">
                        <div class="dropdown ">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('editproductimg',$product->id) }}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit Image</a
                            >
                            </div>
                        </div>
                   </div>
                </div>
              </td>
              <td>{{ $product->price }} $</td>
              <td>{{$product->quantity}}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('editproduct',$product->id) }}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <a class="dropdown-item" href="{{ route('deleteproduct',$product->id) }}"
                      ><i class="bx bx-trash me-1"></i> Delete</a
                    >
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

</div>
@endsection

