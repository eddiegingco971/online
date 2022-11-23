{{-- <!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.components.head')
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body >

    <header>
        @include('layouts.base-navbar')
    </header>

  <main>
  <!-- Content Wrapper. Contains page content -->
  @include('user.content')
  <!-- /.content-wrapper -->
</main>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- jQuery -->
<script src="{{asset('/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/plugins')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist')}}/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html> --}}

@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
{{-- <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6 mt-3">
              <h1>Cart Management</h1>
          </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">

          <div class="card elevation-3">
            <div class="card-header">
              <h3 class="card-title">List of Cart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="height: 50vh;overflow:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($carts as $cart)
                    <tr>
                      <td>
                        <img src="{{asset('dist/img/product/'.$cart->products->product_photo)}}" style="width: 50px; height: 50px" alt="">
                        {{$cart->products->product_name}}
                    </td>
                      <td>{{$cart->products->price}}</td>
                      <td>
                        <span class="btn btn1 btn-warning decrement-btn"><i class="fa fa-minus"> </i></span>
                        <input type="text" name="quantity" class="input-quantity qty-input" value="{{$cart->quantity}}"/>
                        <span class="btn btn1 btn-warning increment-btn"><i class="fa fa-plus"></i></span>
                        {{$cart->quantity}}
                    </td>
                      <td>{{$cart->total_amount}}</td>


                      <td>
                        <a href="{{url('edit-cart/' .$cart->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="{{url('delete-cart/'.$cart->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-4">

            <div class="card elevation-3">
              <div class="card-header">
                <h3 class="card-title">Checkout</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <div class="col-sm-12">
                        <label class="price text-dark">Name</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="price text-dark">Address</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="price text-dark">Sub-Total: ₱{{$cart->total_amount}}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="price text-dark">Delivery Fee: ₱ </label>
                    </div>

                    <div class="col-sm-12">
                        <label class="price text-dark">Total Payment: ₱ </label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-12 price text-light btn btn-primary">Order Now</label>
                    </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section> --}}



  <div class="py-3 py-md-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="shopping-cart">
                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block bg-info">
                        <div class="row ">
                            <div class="col-md-3">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2  d-none d-sm-none d-mb-block d-lg-block">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>


                    @foreach ($carts as $cart)
                    <div class="cart-item py-1">
                        <div class="row">
                            <div class="col-md-3 my-auto">

                                <a href="">
                                    <label class="product-name">
                                        <img src="{{asset('dist/img/product/'.$cart->products->product_photo)}}" style="width: 100px; height: 100px" alt="">
                                        {{$cart->products->product_name}}
                                    </label>
                                </a>
                            </div>
                            <div class="col-md-2 my-auto">
                                <label class="price text-dark">₱{{$cart->products->price}}</label>
                            </div>
                            <div class="col-md-3 col-8 my-auto">
                                <div class="quantity">
                                    <div class="input-group">
                                        <span class="btn btn1 btn-warning decrement-btn"><i class="fa fa-minus"> </i></span>
                                        <input type="text" name="quantity" class="input-quantity qty-input" value="{{$cart->quantity}}"/>
                                        <span class="btn btn1 btn-warning increment-btn"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto  d-none d-sm-none d-mb-block d-lg-block">
                                <label class="price text-dark">₱{{$cart->total_amount}}</label>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="remove">
                                    <a href="{{url('delete-cart/'.$cart->id)}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card text-dark">
                <div class="card-header text-center bg-info"><h3>CHECKOUT</h3></div>

                <div class="card-body">

                        <div class="col-sm-12">
                            <label class="price text-dark">Name</label>
                        </div>
                        <div class="col-sm-12">
                            <label class="price text-dark">Address</label>
                        </div>
                        <div class="col-sm-12">
                            <label class="price text-dark">Sub-Total: ₱{{$cart->total_amount}}</label>
                        </div>
                        <div class="col-sm-12">
                            <label class="price text-dark">Delivery Fee: ₱ </label>
                        </div>

                        <div class="col-sm-12">
                            <label class="price text-dark">Total Payment: ₱ </label>
                        </div>
                        <div class="col-sm-12">
                            <label class="col-12 price text-light btn btn-primary">Order Now</label>
                        </div>



                </div>
            </div>
        </div>

    </div>
</div>
  <!-- /.content -->

@endsection


    {{-- <div class="content-wrapper">

        @include('layouts.components.preloader')

        @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-warning text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

      </div> --}}






