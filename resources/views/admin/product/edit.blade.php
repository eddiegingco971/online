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
                          <h1>Edit Product</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @php
                            $categories=DB::table('categories')->where('status','active')->get();
                            @endphp

                            <div class="form-group">
                              <label for="category_id" class="col-form-label">Category</label>
                              <select class="form-select form-control" type="category_id" name="category_id">
                                <option hidden="true" selected value="{{$products->category_id}}">--Default Category--</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                  @endforeach
                              </select>
                              @error('category_id')
                                  <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
{{--
                            @php
                  $prices=DB::table('prices')->get();
                  @endphp
                  <div class="form-group">
                    <label for="price_id" class="col-form-label">Price</label>
                    <select class="form-select form-control" name="price_id">
                      <option hidden="true" selected value="{{$products->price_id}}">--Select any Sizing--</option>
                        @foreach ($prices as $price)

                          <option value="{{$price->id}}">{{$price->sizes}}</option>

                        @endforeach
                    </select>
                    @error('price_id')
                        <div class="text-danger">{{$message}}</div>
                      @enderror --}}
                  {{-- </div> --}}

                            {{-- <div class="form-group">
                                <label for="sizing_id" class="col-form-label">Sizing</label>
                                <select class="form-select form-control" name="sizing_id">
                                  <option value="{{$sizing->id}}">--Select any Sizing--</option>
                                    @foreach ($sizings as $sizing)

                                      <option value="{{$sizing->id}}">{{$sizing->sizing_name}}</option>

                                    @endforeach
                                </select>
                                @error('sizing_id')
                                    <div class="text-danger">{{$message}}</div>
                                  @enderror
                            </div> --}}

                            <div class="form-group">
                              <label for="product_photo" class="col-form-label">Product Image</label>
                              <input type="file" name="product_photo" class="form-control" id="product_photo">
                              <img src="{{asset('dist/img/product/'.$products->product_photo)}}" width="150px" height="100px" alt="Image" style="border-radius: 10%; margin-top: 2px;">
                            </div>
                            <div class="form-group">
                                <label for="product_name" class="col-form-label">Product Name</label>
                                <input type="product_name" name="product_name" class="form-control" value="{{$products->product_name}}" id="product_name" placeholder="Product Name">
                              </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea type="description" name="description" class="form-control"  id="product_name">{{$products->description}}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="price" class="col-form-label">Price</label>
                              <input type="price" name="price" class="form-control" value="{{$products->price}}" id="price" placeholder="0.00">
                            </div>
                            <div class="form-group">
                              <label for="status" id="status">Status</label>
                              <select  type="status" name="status" class="form-select form-control" id="status" >
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                               </select>
                          </div>
                              <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="{{url('/product')}}">Back</a>
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





