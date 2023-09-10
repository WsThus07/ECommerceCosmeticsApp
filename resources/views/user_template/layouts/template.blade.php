<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ElegantMe &mdash;ElegantME e-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('home/fonts/icomoon/style.css') }}">
<!-- Include Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Include Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.16.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{ asset('home/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('home/css/style.css')}}">
@stack('scripts')

  </head>
  <body>

  <div class="site-wrap">

<!-- header -->
    <div class="site-navbar bg-white py-2">



      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{ route('Home') }}" class="js-logo-clone">ElegantMe</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="{{ route('Home') }}">Home</a></li>
                <li class="has-children active">

                  <a href="">Shop</a>

                  <ul class="dropdown">
                    @php
                    $categories = App\Models\Category::latest()->get();
                    $subcategories = App\Models\Subcategory::latest()->get();
                @endphp

                @foreach ($categories as $category)
                    @php
                        $matchingSubcategories = $subcategories->where('category_id', $category->id);
                    @endphp

                    <li class="has-children">
                        <a href="{{ route('category',[$category->id,$category->slug]) }}">{{ $category->category_name }}</a>
                        @if ($matchingSubcategories->count() > 0)
                            <ul class="dropdown">
                                @foreach ($matchingSubcategories as $subcategory)
                                    <li><a href="#">{{ $subcategory->subcategory_name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach



                  </ul>
                </li>

                <li><a href="#">Catalogue</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            @if (Route::has('login'))

                @auth


                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>



                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth

        @endif
        <a href="{{ route('addtocart') }}" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <span class="number">
                @php
                   $cart_count = App\Models\Cart::where('user_id', Auth::id())->count();
                   echo $cart_count;
                @endphp
            </span>
          </a>

          <a href="{{ route('history') }}" class="icons-btn d-inline-block profile">
            <span class="icon-user"></span>
            <!-- Add other profile-related content here -->
        </a>



          </div>
        </div>
      </div>
    </div>
<!-- header -->
<div class="main mt-5">
    @yield('main-content')
</div>
<!-- footer -->
    <footer class="site-footer custom-border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="{{ asset('home/images/about_1.jpg') }}" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Finding Your Perfect Shirts This Summer</h3>
              <p>Promo from  July 15 &mdash; 25, 2019</p>
            </a>
          </div>
          <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quick Links</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Mobile commerce</a></li>
                  <li><a href="#">Dropshipping</a></li>
                  <li><a href="#">Website development</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
    <!-- footer -->
  </div>

  <script src="{{ asset('home/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('home/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('home/js/popper.min.js') }}"></script>
  <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('home/js/aos.js') }}"></script>

  <script src="{{ asset('home/js/main.js') }}"></script>

  </body>
</html>
