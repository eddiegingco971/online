<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


<link rel="stylesheet" href="{{asset('/plugins')}}/fontawesome-free/css/all.min.css">
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
<link href="{{asset('/base')}}/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{asset('/base')}}/css/custom.css" rel="stylesheet">
    {{-- <link href="{{asset('/base')}}/css/carousel.css" rel="stylesheet"> --}}
    {{-- <link href="{{asset('/base')}}/css/navbar-top-fixed.css" rel="stylesheet"> --}}

    {{-- <style>
        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          right: 0;
          border-radius: 5px;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1;}

        .dropdown:hover .dropdown-content {
          display: block;
        }
    </style> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
   <header>
        <div class="main-navbar shadow-sm sticky-top elevation-3">
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        {{-- <div class="col-md-3 my-auto d-none d-sm-none d-md-block d-lg-block"> --}}
                        <div class="col-md-3 my-auto">
                            {{-- <a class="brand-name">
                                <img src="{{asset('/dist')}}/img/Logo.png" alt="" width="30" height="30" class="rounded-circle">
                                Mac Kaon FoodHub
                            </a> --}}
                            <a class="brand-name">
                                <a class="nav-link" href="#">
                                    <img src="{{asset('/dist')}}/img/Logo.png" alt="" width="30" height="30" class="rounded-circle">
                                    Mac Kaon FoodHub
                                </a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bot-navbar">
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-start">

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{url('/all-product')}}">
                                    <i class="fab fa-product-hunt"></i> Products
                                </a>
                            </li> --}}
                            @php
                            $categories=DB::table('categories')->where('status','active')->get();
                            @endphp

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> All Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($categories as $category)
                                        <li><a class="dropdown-item" href="#"></i> {{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/about')}}">
                                    <i class="fas fa-info-circle"></i> About Us
                                </a>
                            </li>
                        </ul>
                    </div>


            </div>
            {{-- <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-start">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                   Cart (0)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Wishlist (0)
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> All Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> --}}
        </div>
    </div>
  </header>

<main>
    @yield('content')

    {{-- @include('layouts.footer') --}}
</main>

<script src="{{asset('/base')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>
