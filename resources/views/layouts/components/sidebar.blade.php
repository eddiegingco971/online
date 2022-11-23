@if (Auth::user()->user_type == 'admin')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('/dist')}}/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mac Kaon Foodhub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
          <img src="{{asset('/dist')}}/img/user2-160x160.jpg" width="50" height="50" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/profile')}}" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- <li class="nav-header">Core Management</li> --}}
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Order Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                @php
                    $carts = DB::table('carts')->where('status', 'new')->count();
                @endphp
                <a href="{{url('/cart-list')}}" class="nav-link">
                  <i class="far fa-clock nav-icon"></i>
                  <p>Cart</p>
                  <span class="badge badge-danger right">{{$carts}}</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/order')}}" class="nav-link">
                  <i class="far fa-calendar nav-icon"></i>
                  @php
                      $orders = DB::table('orders')->where('status', 'new')->count();
                  @endphp
                  <p>Today's Order</p>
                  <span class="badge badge-danger right">{{$orders}}</span>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/delivered')}}" class="nav-link">
                  {{-- <i class="far fa-calendar nav-icon"></i> --}}
                  <i class="far fa-check-circle nav-icon" aria-hidden="true"></i>
                  @php
                      $orders = DB::table('orders')->where('status', 'delivered')->count();
                  @endphp
                  <p>Delivered</p>
                  <span class="badge badge-danger right">{{$orders}}</span>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('/category')}}" class="nav-link active">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>Category Management</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/product')}}" class="nav-link active">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Product Management</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/user-list')}}" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>User Management</p>
            </a>
          </li>



          <li class="nav-header">Banner</li>

          <li class="nav-item">
            <a href="{{url('/slider')}}" class="nav-link">
              <i class="nav-icon far fa-images"></i>
              <p>
                Home Slider
                <span class="badge badge-danger right"></span>
              </p>
            </a>
          </li>

          {{-- <li class="nav-header">Events</li>
          <li class="nav-item">
            <a href="{{url('/calendar')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@elseif (Auth::user()->user_type == 'staff')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link">
    <img src="{{asset('/dist')}}/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Mac Kaon Foodhub</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
      <div class="image">
        <img src="{{asset('/dist')}}/img/user2-160x160.jpg" width="50" height="50" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{url('/profile')}}" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
      </div>
    </div>

    {{-- <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        {{-- <li class="nav-header">Core Management</li> --}}
        @php
            $orders = DB::table('orders')->where('status', 'new')->count();
        @endphp
        <li class="nav-item">
          <a href="{{url('/staff')}}" class="nav-link active">
            <i class="nav-icon fas fa-clipboard"></i>
            <p>Today's Order</p>
            <span class="badge badge-danger right">{{$orders}}</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/staffdelivered')}}" class="nav-link">
              {{-- <i class="far fa-calendar nav-icon"></i> --}}
              <i class="far fa-check-circle nav-icon" aria-hidden="true"></i>
              @php
                  $orders = DB::table('orders')->where('status', 'delivered')->count();
              @endphp
              <p>Delivered</p>
              <span class="badge badge-danger right">{{$orders}}</span>
            </a>
          </li>
        {{-- <li class="nav-item">
          <a href="{{url('/order')}}" class="nav-link active">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Order History</p>
          </a>
        </li> --}}

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

@else

{{-- <li class="nav-item">
  <a href="{{url('/order')}}" class="nav-link active">
    <i class="nav-icon fas fa-clipboard"></i>
    <p>Today's Order</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{url('/order')}}" class="nav-link active">
    <i class="nav-icon fas fa-clipboard-check"></i>
    <p>Order History</p>
  </a>
</li> --}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('/dist')}}/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mac Kaon Foodhub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
          <img src="{{asset('/dist')}}/img/user-profile/user-avatar.jpg" width="50" height="50" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{url('/profile')}}" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
        </div>
      </div>

      {{-- <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
    </div> --}}



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Account Setting</li>
          <li class="nav-item">
            <a href="{{url('/user-cart')}}" class="nav-link active">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Cart</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{url('/user-cart/{id}')}}" class="nav-link active">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Cart</p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{url('/user-order')}}" class="nav-link active">
              <i class="nav-icon fas fa-truck"></i>
              <p>Order</p>
            </a>
          </li>

          {{-- <li class="nav-header">Events</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@endif
