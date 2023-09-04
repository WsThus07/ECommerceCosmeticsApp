@extends('admin.layouts.template')
@section('page_title')
Admin - Update Product Image
@endsection
@section('content')
<div class="container-xxl flex-grow-1 mt-5">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4 ">
          <span class="text-muted fw-light">Page/</span> Update Product
        </h4>
      </div>

    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Update Product</h5>
              <small class="text-muted float-end">Update image </small>
            </div>
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
              <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                  <div class="col-sm-10">
                    {{ $product_info->product_name }}
                  </div>
                </div>
                <input type="hidden" name="id" value="{{ $product_info->id }}">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Previous image</label>
                  <div class="col-sm-10">
                  <img src="{{ asset($product_info->product_img) }}" alt="{{ $product_info->product_name }}">
                  </div>
                </div>


                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Image Product</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="product_img" name="product_img"/>
                    </div>
                </div>



                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Image Product</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

</div>
@endsection
