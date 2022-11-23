<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.components.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.components.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Account Settings</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            @if (Auth::user()->user_type == 'admin')

            <div class="col-md-4">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                        @foreach ($profiles as $profile)
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('dist/img/user-profile/'.$profile->user_pic)}}"
                           alt="User profile picture">
                        @endforeach
                    </div>
                    @foreach ($profiles as $profile)
                    <h3 class="profile-username text-center">{{$profile->firstname}} {{$profile->middlename}} {{$profile->lastname}}</h3>

                    <p class="text-muted text-center">{{$profile->email}}</p>
                    @endforeach
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-md-8">
                <div class="card">
                  <div class="card-header p-2">
                    <h3 class="text-center">Admin Settings</h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">

                      <div class="tab-pane" id="settings">
                        <form  class="form-horizontal" action="{{url('profile-create')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            @else

            <div class="col-md-4">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                        @foreach ($profiles as $profile)
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('dist/img/user-profile/'.$profile->user_pic)}}"
                           alt="User profile picture">
                        @endforeach
                    </div>
                    @foreach ($profiles as $profile)
                    <h3 class="profile-username text-center">{{$profile->firstname}} {{$profile->middlename}} {{$profile->lastname}}</h3>

                    <p class="text-muted text-center">{{$profile->email}}</p>
                    @endforeach
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-md-8">
                <div class="card">
                  <div class="card-header p-2">
                    <h3 class="text-center">Staff Settings</h3>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">

                      <div class="tab-pane" id="settings">
                        <form  class="form-horizontal" action="{{url('profile-create')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <label for="inputFirstname" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="firstname" class="form-control" id="inputFirstname">
                            </div>
                            @error('firstname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>


    @endif


          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- jQuery -->
<script src="{{asset('/plugins')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/plugins')}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/plugins')}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/plugins')}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/plugins')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/plugins')}}/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/plugins')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/plugins')}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/plugins')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist')}}/js/adminlte.js"></script>

<script src="{{asset('/dist')}}/js/pages/dashboard.js"></script>

</body>
</html>
