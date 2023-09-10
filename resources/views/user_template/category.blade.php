@extends('user_template.layouts.template')
@section('main-content')

<div class="site-blocks-cover inner-page" data-aos="fade">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto order-md-2 align-self-start">
          <div class="site-block-cover-content">
          <h2 class="sub-title">#New Summer Collection 2019</h2>
          <h1>Arrivals Sales</h1>
          <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
          </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
          <img src="{{ asset('home/images/model_4.png') }}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <div class="custom-border-bottom py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('Home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
      </div>
    </div>
  </div>


  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-1">

          <div class="row align">
            <div class="col-md-12 mb-5">
              <div class="float-md-left"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

            @foreach ($products as $product )


            <div class="col-lg-6 col-md-6 item-entry mb-4">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{ asset($product->product_img) }}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">{{ $product->product_name }}</a></h2>
                <strong class="item-price">${{ $product->price }}</strong>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('addproducttocart') }}" method="POST" >
                            @csrf

                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="1" name="quantity">
                           <input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Buy">

                          </form>
                    </div>
                    <div class="col-md-4">
                        <a href="{{  route('singleproduct',[$product->id,$product->slug]) }}" class="btn btn-outline-dark btn-block">See More</a>
                    </div>
                </div>

              </div>
 @endforeach

          </div>
          <!-- Pagination -->
          <div class="row">
            <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 order-2 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
                @foreach ( $categories as $category )
               <li class="mb-1"><a href="{{ route('category',[$category->id,$category->slug]) }}" class="d-flex"><span>{{ $category->category_name }}</span> <span class="text-black ml-auto">({{ $category->product_count }})</span></a></li>
              @endforeach
            </ul>
          </div>
          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              </div>
          </div>
        </div>

      </div>

    </div>
  </div>


@endsection
