@extends('user_template.layouts.template')
@section('main-content')

<!-- most rated -->
<div class="site-blocks-cover" data-aos="fade">
    <div class="">
        <div class="video-background">
            <video autoplay loop muted>
                <source src="{{ asset('home/images/Elegantme.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        </div>
    </div>
  </div>
  <!-- most rated -->


<!-- All Products -->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center mb-5 col-12">
          <h2 class="text-uppercase">All Products</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3">
          <div class="nonloop-block-3 owl-carousel">

            <!-- new item -->

            @foreach ( $products as $product)


            <div class="item">
              <div class="item-entry">
                <a href="#" class="product-item md-height bg-gray d-block">
                  <img src="{{ asset($product->product_img) }}" class="img-fluid"  alt="{{ $product->product_name }}" height="100">
                </a>
                <h2 class="item-title"><a href="#">{{ $product->product_name }}</a></h2>
                <strong class="item-price"> ${{ $product->price }}</strong>
<div class="box-main">
    <form action="{{ route('addproducttocart') }}" method="POST" >
    @csrf
    <input type="hidden" value="{{ $product->id }}" name="product_id">
    <input type="hidden" value="{{ $product->price }}" name="price">
    <input type="hidden" value="1" name="quantity">
   <input type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" value="Buy">
  </form>
</div>
                <div class="star-rating">
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                  <span class="icon-star2 text-warning"></span>
                </div>

              </div>
            </div>
            @endforeach


            <!-- new item -->

          </div>
        </div>
      </div>
    </div>
  </div>
<!-- All Products -->


<!-- new collection -->
  <div class="site-blocks-cover inner-page py-5" data-aos="fade">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto order-md-2 align-self-start">
          <div class="site-block-cover-content">
          <h2 class="sub-title">#New Summer Collection 2019</h2>
          <h1>New Shoes</h1>
          <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
          </div>
        </div>
        <div class="col-md-6 order-1 align-self-end">
          <img src="{{ asset('home/images/model_6.png') }}" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <!-- new collection -->

@endsection
