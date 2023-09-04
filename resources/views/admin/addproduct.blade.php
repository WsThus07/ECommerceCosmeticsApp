@extends('admin.layouts.template')
@section('page_title')
Admin - Add Product
@endsection
@section('content')
<div class="container-xxl flex-grow-1 mt-5">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4 ">
          <span class="text-muted fw-light">Page/</span> Add Product
        </h4>
      </div>

    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add New Product</h5>
              <small class="text-muted float-end">Input information </small>
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
              <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" name="product_name" placeholder="Enter a Product Name" />
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                    <div class="col-sm-10">
                      <input type="number" step="0.01" class="form-control" id="basic-default-name" name="price" placeholder="Enter a Product Price" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="basic-default-name" name="quantity" placeholder="Enter a Product Quantity" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="product_short_desc" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="product_long_desc" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Select Product Category</label>
                    <div class="col-sm-10">
                        <div class="mb-3">
                            <select class="form-select" id="product_category_id" name="product_category_id" aria-label="Default select example">
                              <option selected> Select Product Category</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                    <div class="col-sm-10">
                        <div class="mb-3">
                            <select class="form-select" id="product_subcategory_id" name="product_subcategory_id" aria-label="Default select example">
                              <option selected> Select Product Sub Category</option>
                              @foreach ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                          @endforeach
                            </select>
                          </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="product_img" name="product_img"/>
                    </div>
                </div>



                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

</div>
@endsection
