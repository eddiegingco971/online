@extends('layouts.app')

@section('content')
  {{-- <!-- Preloader -->
  @include('layouts.components.preloader') --}}

  <!-- Navbar -->

  <nav class="navbar navbar-expand navbar-dark navbar-light py-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> --}}
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
       <!-- Navbar Search -->

      <a href="{{url('/')}}" class="brand-link">
        <img src="{{asset('/dist')}}/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 d-none d-sm-inline-block" style="opacity: .8" >
        <span class="brand-text font-weight-light">Mac Kaon Foodhub</span>
      </a>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      @if (Route::has('login'))
      @auth
        @if (Auth::user()->user_type == 'admin')
            <a href="{{url('/home')}}" class="btn btn-md text-white mt-1 d-none d-sm-inline-block"><strong>Dashboard</strong></a>
        @elseif(Auth::user()->user_type == 'staff')
            <a href="{{url('/staff')}}" class="btn btn-md text-white mt-1 d-none d-sm-inline-block"><strong>Dashboard</strong></a>
        @else
            <a href="{{url('/user')}}" class="btn btn-md text-white mt-1 d-none d-sm-inline-block"><strong>Dashboard</strong></a>
        @endif
        <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                @if (Auth::user()->user_type == 'admin')
                <img src="{{asset('/dist')}}/img/Logo.png" alt="" width="30" height="30" class="rounded-circle">
                <p class="d-none d-sm-inline-block">{{Auth::user()->lastname}}</p>
                @elseif(Auth::user()->user_type == 'staff')
                <img src="{{asset('/dist')}}/img/Logo.png" alt="" width="30" height="30" class="rounded-circle">
                <p class="d-none d-sm-inline-block">{{Auth::user()->lastname}}</p>
                @else
                <img src="{{asset('/dist/img/user-profile/user-avatar.jpg')}}" alt="" width="30" height="30" class="rounded-circle">
                <p class="d-none d-sm-inline-block">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @if (Auth::user()->user_type == 'admin')
                <li><a class="dropdown-item" href="{{url('/profile')}}">Password Settings</a></li>
                <li><a class="dropdown-item" href="{{url('/home')}}">Dashboard</a></li>
                @elseif(Auth::user()->user_type == 'staff')
                <li><a class="dropdown-item" href="{{url('/profile')}}">Password Settings</a></li>
                <li><a class="dropdown-item" href="{{url('/staff')}}">Dashboard</a></li>
                @else
                <li><a class="dropdown-item" href="{{url('/profile')}}">Account Settings</a></li>
                <li><a class="dropdown-item" href="{{url('/user')}}">Dashboard</a></li>
                @endif
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
                </li>
            </ul>
        </li>
        @else

            <a href="{{ route('login') }}" class="btn btn-sm text-white">Sign in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="mr-3 text-white btn btn-sm btn-outline-primary">Sign up</a>
            @endif
        @endauth
        @endif

    </ul>

</nav>

    <!-- Main content -->
    <div class="content py-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <nav class="navbar navbar-expand justify-content-center">
                <ul class="navbar-nav mx-auto">
                <div class="col-12 offset-md-0">

                    <form method="POST" action="{{route('product.search')}}">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </ul>
                <ul class="navbar-nav ml-auto">
                     <a class="nav-link" data-toggle="dropdown" href="#">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </button>
                        </div>
                        <span class="badge badge-warning navbar-badge">15</span>
                     </a>

                     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header">Your Cart</span>
                      @if (Route::has('login'))
                      @foreach ($carts as $cart)
                      <div class="dropdown-divider"></div>
                        <div class="container">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i>{{$cart->product_id}}
                                <i class="fas fa-file mr-2"></i>{{$cart->quantity}}
                                <span class="float-right text-muted text-sm">Price: {{$cart->price}}</span>
                            </a>
                        </div>
                      @endforeach
                      @endif

                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer bg-dark">Checkout</a>
                    </div>

                </ul>
                </nav>

                {{-- <ul class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <div class="col-4 offset-md-2">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </button>
                        </div>
                      <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header">Cart</span>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer bg-dark">Checkout</a>
                    </div>
                  </ul > --}}

            </div>
        </div>
    </div>


  <!-- Content Wrapper. Contains page content -->
<div class="content bg-primary">
    <div class="container py-3">
        <div class="row">
            {{-- <div class="row justify-content-center"> --}}

            @php
            $categories=DB::table('categories')->where('status','active')->get();
            @endphp

            <div class="single-banner ml-2 p-2">
                <strong><a href="#" class="text-white">Home</a></strong>
            </div>

            @if($categories)

                <!-- Example single danger button -->
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <strong>Categories</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="#!">{{$category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <div class="single-banner ml-1 p-2">
                <strong><a href="#"  class="text-white">About Us</a></strong>
            </div>



            {{-- @if($categories)
                @foreach($categories as $category)
                <div class="single-banner ml-3 p-2">
                    <strong>{{$category->category_name}}</strong>
                </div>
                @endforeach
            @endif --}}

        </div>
    </div>
</div>



<div class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach ($sliders as $slider)

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                <div class="text" id="t1">{{$slider->title}}</div>
                <div class="text" id="t2">{{$slider->description}}</div>
                <button class="btn btn-lg bg-primary" id="t3" >{{$slider->link}}</button>
                    <img src="{{asset('dist/img/slider/'.$slider->image)}}" style="width:100%; height:vh;">
                </div>

            <style>
                #t1{
                /* background-image: linear-gradient(to left, violet, indigo, blue, green, yellow, orange, red);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; */
                text-align: center;
                display: inline-block;
                color: white;
                text-shadow: 2px 3px gray;
                font-weight: bold;
                font-size: 40px;
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
                }
                #t2{
                /* background-image: linear-gradient(to left, violet, indigo, blue, green, yellow, orange, red);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; */
                text-align: center;
                display: inline-block;
                color: white;
                text-shadow: 2px 1px black;
                /* font-weight: bold; */
                font-size: 20px;
                position: absolute;
                top: 55%;
                left: 50%;
                transform: translate(-50%, -50%);
                }
                #t3{
                /* background-image: linear-gradient(to left, violet, indigo, blue, green, yellow, orange, red);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent; */
                text-align: center;
                display: inline-block;
                color: white;

                position: absolute;
                top: 80%;
                left: 50%;
                transform: translate(-50%, -50%);
                }

                /* Hide the images by default */
                .mySlides {
                position: relative;
                display: none;
                width: 100%;
                height: 80%;
                background-repeat: no-repeat;
                background-size: cover;
                }

                /* Fading animation */
                .fade {
                animation-name: fade;
                animation-duration: 8.5s;
                }

                @keyframes fade {
                from {opacity: .3}
                to {opacity: 1}
                }
            </style>
            @endforeach
        </div>
    </div>
</div>



{{-- @if (Route::has('login'))
    @auth
        <input type="hidden" name="user_id" id="email" value="{{auth()->user()->id}}">
    @endauth
@endif --}}

<div class="content">
    @php
    $products=DB::table('products')->where('status','active')->get();
    $carts=DB::table('carts')->where('status')->get();
    // $total = ($product->price*$product->quantity);
    @endphp

    <div class="container-fluid py-1 bg-primary">
        <h1 class="ml-3">Best Deals</h1>
    </div>
 <div class="container">
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="card bg-dark m-1 elevation-3" style="justify-content: space-between; height:400px;">
              <div class="card-body">
                <form action="{{url('cart-create')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  @if (Route::has('login'))
                    @auth
                     <input type="hidden" name="user_id" id="email" value="{{auth()->user()->id}}">
                    @endauth
                  @endif
                  <img for="product_id" src="{{asset('dist/img/product/'.$product->product_photo)}}" width="200px" height="180px" alt="Image" >
                  <input type="hidden" name="product_id" id="product_id" class="form-control" value="{{$product->id}}">
                  <h4 class="text-center"><strong>{{$product->product_name}}</strong></h4>
              </div>

                <div class="card-footer mt-2">
                <h6>Price: {{$product->price}}</h6>
                <input type="hidden" name="price" id="price" value="{{$product->price}}">
                <div class="form-group text-dark">

                  <input class="form-control" type="number" name="quantity" id="quantity" class="form-control" value="1">

                </div>
                <div class="form-group text-dark">
                  {{-- @foreach ($orders as $order)
                    <input class="form-control" type="total_amount" name="total_amount" id="total_amount" class="form-control" value="{{($product->price)*($order->quantity)}}">
                  @endforeach --}}

                  <input class="form-control" type="total_amount" name="total_amount" id="total_amount" class="form-control" placeholder="Price * Quantity">
                  <input type="hidden" name="status" id="status" class="form-control" value="new">
                  {{-- @foreach ($carts as $cart)
                    <input type="hidden" name="status" id="status" class="form-control" value="{{$cart->status}}">
                  @endforeach --}}

                </div>
                  <button class="btn btn-light" type="submit">Add Cart</button>
                  <button class="btn btn-success float-right">Order</button>

              </div>
            </form>
            </div>
          @endforeach
    </div>
 </div>
</div>

{{-- @foreach ($carts as $cart)
<input type="hidden" name="status" id="status" class="form-control" value="{{$cart->status}}">
@endforeach --}}

<div class="content">
    <section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="card col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="card col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="card col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="card col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
