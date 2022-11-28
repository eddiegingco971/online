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
      <span class="brand-text font-weight-light">Fee</span>
    </a>

    <!-- Sidebar -->
    @include('layouts.components.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('layouts.components.preloader')

    {{-- @if (session('status'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-warning text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif --}}

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2 mt-3">
            <section class="content text-dark">
                <div class="container-fluid">
                      <div class="card elevation-3">
                        <div class="card-header text-center">
                          <h1>Edit Fee</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="{{url('update-fee/'.$fees->id)}}" method="POST">
                              @csrf
                              @method('PUT')

                              <div class="form-group">
                                <label for="barangay_name" class="col-form-label">Barangay Name</label>
                                <input type="text" name="barangay_name" class="form-control" id="barangay_name" value="{{$fees->barangay_name}}">
                              </div>

                              <div class="form-group">
                                  <label for="price" id="price">Price</label>
                                  <input type="price" name="price" class="form-control" value="{{$fees->price}}">
                              </div>

                              <div class="form-group">
                                <label for="status" id="status">Status</label>
                                <select  type="status" name="status" class="form-select form-control">
                                  <option value="{{$fees->status}}">--Default Status--</option>
                                  <option value="active">Active</option>
                                  <option value="inactive">Inactive</option>
                                 </select>

                                @error('status')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                              <a type="button" class="btn btn-secondary" href="{{url('/sizing')}}">Cancel</a>
                              {{-- <button type="submit" class="btn btn-info" style="position: relative; left:78%;">Save</button> --}}
                              <button type="submit" class="btn btn-info">Save</button>
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
</html>





