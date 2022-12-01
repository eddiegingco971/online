@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">

          <div class="container">
              <div class="row mt-2">
              <div class="col-md-4">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">

                        <img class="profile-user-img img-fluid img-circle"
                             src="{{asset('dist/img/user-profile/'. auth()->user()->avatar)}}"
                             alt="User profile picture">

                      </div>

                      <h3 class="profile-username text-center">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</h3>

                      <p class="text-muted text-center">{{auth()->user()->email}}</p>

                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>

              <div class="col-md-8">
                  <div class="card">
                    {{-- <div class="card-header p-2">
                      <h3 class="text-center">Admin Settings</h3>
                    </div> --}}
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                        <div class="tab-pane" id="settings">
                          {{-- <form action="{{url('update-profile/'.$users->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT') --}}
                          {{-- <form  class="form-horizontal" action="{{url('profile-create')}}" method="POST" enctype="multipart/form-data"> --}}
                              {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}} === 'male' ? '/dist/img/male.png' : '/dist/img/female.png' "  > --}}

                              <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" readonly>
                                </div>

                              </div>

                            <div class="form-group row">

                              <label for="inputFirstname" class="col-sm-2 col-form-label">First Name</label>
                              <div class="col-sm-4">
                                  <input type="text" name="firstname" class="form-control" value="{{auth()->user()->firstname}}" readonly>
                              </div>


                              <label for="inputLastname" class="col-sm-2 col-form-label">Lastname</label>
                              <div class="col-sm-4">
                                <input type="text" name="lastname" class="form-control" value="{{auth()->user()->lastname}}" readonly>
                              </div>


                            </div>

                            {{-- <div class="form-group row">
                              <label for="inputMiddlename" class="col-sm-2 col-form-label">Middlename</label>
                              <div class="col-sm-10">
                                  <input type="text" name="middlename" class="form-control" id="inputMiddlename" value="@foreach ($profiles as $profile)
                                  {{$profile->firstname}} @endforeach">
                              </div>
                              @error('middlename')
                                  <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div> --}}

                            <div class="form-group row">

                              <label for="inputAge" class="col-sm-2 col-form-label">Age</label>
                              <div class="col-sm-4">
                                  <input type="age" name="age" class="form-control" value="{{auth()->user()->age}}" readonly>
                              </div>


                              <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
                              <div class="col-sm-4">
                                  <input  type="text" name="gender" class="form-select form-control" id="inputGender" value="{{auth()->user()->gender}}" readonly>

                              </div>

                            </div>

                            <div class="form-group row">
                              <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                              <div class="col-sm-10">
                                  <textarea type="text" name="address" class="form-control" id="inputAddress" readonly>{{auth()->user()->address}}</textarea>
                              </div>

                            </div>

                            <div class="form-group row">

                              <label for="inputBarangay" class="col-sm-2 col-form-label">Barangay</label>
                              <div class="col-sm-4">
                                  <input  type="text" name="barangay_id" class="form-control" id="inputBarangay" value="{{auth()->user()->fees->barangay_name}}" readonly>
                              </div>



                              <label for="inputPhonenumber" class="col-sm-2 col-form-label">Phone No. </label>
                              <div class="col-sm-4">
                                  <input type="phone_number" name="phone_number" class="form-control" id="inputPhonenumber" value="{{auth()->user()->phone_number}}" readonly>
                              </div>

                            </div>

                            {{-- <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                  </label>
                                </div>
                              </div>
                            </div> --}}

                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <a href="{{url('edit-profile/' . auth()->user()->id)}}" class="btn btn-danger">Edit</a>
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
              </div>
              </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
