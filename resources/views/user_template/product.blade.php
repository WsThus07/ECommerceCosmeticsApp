@extends('user_template.layouts.template')
@section('main-content')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('Home') }}">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $product_detail->product_name }}</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="item-entry">
            <a href="#" class="product-item md-height bg-gray d-block">
              <img src="{{ asset($product_detail->product_img) }}" alt="Image" class="img-fluid">
            </a>

          </div>

        </div>
        <div class="col-md-6">

          <h2 class="text-black">{{ $product_detail->product_name }}</h2>
          <p>{{ $product_detail->product_short_desc }}</p>
          <p class="mb-4">{{ $product_detail->product_long_desc }}</p>
          <p><strong class="text-primary h4">${{ $product_detail->price }}</strong></p>
          <div class="mb-1 d-flex">
            <ul class="p-2 bg-light list-unstyled">
                <li class="mb-2"><i class="fas fa-tag"></i> Category: {{ $product_detail->product_category_name }}</li>
                <li class="mb-2"><i class="fas fa-tags"></i> Subcategory: {{ $product_detail->product_subcategory_name }}</li>
                <li class="mb-2"><i class="fas fa-box"></i> Quantity: {{ $product_detail->quantity }}</li>
            </ul>


          </div>

          <div class="btn-main">
            <form action="{{ route('addproducttocart') }}" method="POST" >
                @csrf
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="quantity">
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                  </div>

                  </div>
                <input type="hidden" value="{{ $product_detail->id }}" id="product_id" name="product_id">
                <input type="hidden" value="{{ $product_detail->price }}" id="price" name="price">
               <input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Add To Card">

              </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section block-3 site-blocks-2">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Featured Products</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3">
          <div class="nonloop-block-3 owl-carousel">
         @foreach ($featuredprod as $prod )

            <div class="item">
              <div class="item-entry">
                <a href="{{ route('singleproduct',[$prod->id,$prod->slug])  }}" class="product-item md-height bg-gray d-block">
                  <img src="{{ asset( $prod->product_img) }}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="#">{{  $prod->product_name }}</a></h2>
                <strong class="item-price">${{ $prod->price }}</strong>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <form action="{{ route('addproducttocart') }}" method="POST" >
                            @csrf

                            <input type="hidden" value="{{ $prod->id }}" name="product_id">
    <input type="hidden" value="{{ $prod->price }}" name="price">
    <input type="hidden" value="1" name="quantity">
                           <input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Buy">

                          </form>
                    </div>
                    <div class="col-md-4">
                        <a href="{{  route('singleproduct',[$prod->id,$prod->slug]) }}" class="btn btn-outline-dark btn-block">See More</a>
                    </div>
                </div>
              </div>
            </div>
  @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
