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
      <span class="brand-text font-weight-light">Category</span>
    </a>

    <!-- Sidebar -->
    @include('layouts.components.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('layouts.components.preloader')
{{--
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
    --}}
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-3">
            <section class="content text-dark">
                <div class="container-fluid">
                      <div class="card elevation-3">
                        <div class="card-header text-center">
                          <h1>Edit Order</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="{{url('update-order/'.$orders->users->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                              <label for="payment_status" class="col-form-label">Payment Status</label>
                              <select  type="payment_status" name="payment_status" class="form-select form-control" id="payment_status" >
                                @foreach ($orders as $order)
                                    <option value="{{$order->payment_status}}">{{$order->payment_status}}</option>
                                @endforeach
                               </select>
                            </div>
                            <div class="form-group">
                              <label for="status" id="status">Status</label>
                              <select  type="status" name="status" class="form-select form-control" id="status" >
                                @foreach ($orders as $order)
                                    <option value="{{$order->status}}">{{$order->Status}}</option>
                                @endforeach

                               </select>
                          </div>
                              <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="{{url('/order')}}">Back</a>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>

                          </form>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
            </section>


        </div>
      </div>
    </div>

    <!-- Main content -->
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

<!-- AdminLTE App -->
<script src="{{asset('/dist')}}/js/adminlte.min.js"></script>

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
</html>
