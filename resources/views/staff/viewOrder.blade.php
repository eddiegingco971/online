<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.components.head')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/plugins')}}/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.components.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{asset('/dist')}}/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Orders</span>
    </a>

    <!-- Sidebar -->
    @include('layouts.components.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('layouts.components.preloader')

    {{-- @if (session('status'))
        <div class="alert alert-warning m-2 text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning m-2 text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif --}}

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-3">
            <h1>Order Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card elevation-3 mt-3">
                <div class="card-header">
                  <h3 class="card-title">View User Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      {{-- <th>Order ID#</th>
                      <th>User ID#</th> --}}
                      <th>Product</th>
                      {{-- <th>Order Date</th> --}}
                      <th>Quantity</th>
                      <th>Description</th>
                      <th>Total Amount</th>
                      <th>Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                        <tr>
                          <td><img src="{{asset('dist/img/product/'. $order->products->product_photo)}}" width="100px" height="100px" alt="Image" style="border-radius: 10%"> {{$order->products->product_name}}</td>
                          <td>{{$order->quantity}}</td>
                          <td>{{$order->products->description}}</td>
                          <td>{{$order->payment_method}}</td>
                          <td>{{$order->products->price}}</td>
                          {{-- <td>{{$order->status}}</td> --}}
                        </tr>
                      @endforeach

                    </tbody>
                    {{-- <tfoot>

                          <tr>
                          <td>{{$order->id}}</td>
                          <td>{{$order->user_id}}</td>
                          <td>{{$order->tracking_number}}</td>
                          <td>{{$order->order_date}}</td>
                          <td>{{$order->quantity}}</td>
                          <td>{{$order->total_amount}}</td>
                          <td>{{$order->payment_method}}</td>
                          <td>{{$order->payment_status}}</td>
                          <td>{{$order->status}}</td>
                        </tr>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                    </tfoot> --}}
                  </table>
                  <a href="{{url('/staff')}}">
                    <button class="btn btn-sm btn-danger d-flex justify-content-end float-right">
                       <i class="fa fa-arrow-left px-1 mt-1" aria-hidden="true"></i>  Back
                    </button>
                  </a>
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
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.components.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/plugins')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/plugins')}}/jszip/jszip.min.js"></script>
<script src="{{asset('/plugins')}}/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/plugins')}}/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/plugins')}}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist')}}/js/adminlte.min.js"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{asset('/dist')}}/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "paging": false,"info": false,
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
</html>
