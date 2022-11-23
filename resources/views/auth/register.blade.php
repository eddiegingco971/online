@extends('layouts.app')

@section('content')

  {{-- <!-- Preloader -->
  @include('layouts.components.preloader') --}}

  <!-- Main Sidebar Container -->
  {{-- <div class="content bg-primary">
    <div class="container mt-2">
        <div class="row">
            @php
            $categories=DB::table('categories')->where('status','active')->get();
            @endphp
            <div class="single-banner ml-2 p-2">
                <strong><a href="{{url('/')}}" class="text-light">Home</a></strong>
            </div>

            @if($categories)

                <!-- Example single danger button -->
                <div class="dropdown">
                <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
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
                <strong><a href="#"  class="text-light">About Us</a></strong>
            </div>

        </div>
    </div>
</div> --}}

  <!-- Content Wrapper. Contains page content -->
<div class="content">
    <div class="container mt-4">
        <div class="row justify-content-center border elevation-3">
            <div class="col-md-4 p-5 mt-3 d-none d-md-block">
                <img src="{{asset('/dist')}}/img/Logo.png" width="350" height="600" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="col-md-6 offset-md-1 mt-4 p-3">
                <div class="card">
                    <div class="card-header text-center bg-primary"><h2><strong>{{ __('Register') }}</strong></h2></div>

                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                        <form  class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="row mb-3">

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Fullname">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div> --}}
                            <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="firstname" class="col-sm-6 col-form-label text-md-start text-dark">{{ __('Firstname') }}</label>
                                    <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="Firstname">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="lastname" class="col-sm-6 col-form-label text-md-start text-dark">{{ __('Lastname') }}</label>
                                    <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Lastname">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <label for="age" class="col-sm-6 col-form-label text-md-start text-dark">{{ __('Age') }}</label>
                                    <input id="age" type="age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus placeholder="Age">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="gender" class="col-sm-6 col-form-label text-md-start text-dark">{{ __('Gender') }}</label>
                                    <select class="form-select form-control" name="gender">
                                        <option hidden="true" value="">--Select Gender--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                      </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                            <div class="col-sm-6">
                                <label for="birthdate" class="col-sm-6 col-form-label text-md-start text-dark">{{ __('Birthdate') }}</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control">
                                @error('birtdate')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>



                            <div class="col-sm-6">
                                <label for="phone_number" class="col-sm-8 col-form-label text-md-start">{{ __('Phone Number') }}</label>
                                <input type="phone_number" id="phone_number" name="phone_number" class="form-control" placeholder="09xxxxxxxxx">
                                @error('phone_number')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>




                            </div>

                            <div class="row pb-3">


                            <div class="col-sm-6">
                                <label for="address" class="col-sm-6 col-form-label">Address</label>
                                <textarea type="text" id="address" name="address" class="form-control" placeholder="Complete Address"></textarea>
                                @error('address')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="barangay" class="col-sm-6 col-form-label">Barangay</label>
                                <select  type="text" id="barangay" name="barangay" class="form-select form-control">
                                    <option hidden="true" value="#">--Select Barangay--</option>
                                    <option value="Cabatuan">Cabatuan</option>
                                    <option value="Cantubod">Cantubod</option>
                                    <option value="Carbon">Carbon</option>
                                    <option value="San Carlos">San Carlos</option>
                                    <option value="Concepcion">Concepcion</option>
                                    <option value="Dagohoy">Dagohoy</option>
                                    <option value="Sta. Fe">Sta. Fe</option>
                                    <option value="Hibale">Hibale</option>
                                    <option value="Magtangtang">Magtangtang</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="Nahud">Nahud</option>
                                    <option value="Sto. Niño">Sto. Niño</option>
                                    <option value="Poblacion">Poblacion</option>
                                    <option value="Remedios">Remedios</option>
                                    <option value="Tabok">Tabok</option>
                                    <option value="Taming">Taming</option>
                                    <option value="Villa Anunciado">Villa Anunciado</option>
                                    </select>
                                @error('barangay')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            </div>


                            <div class="row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" id="email" name="email" class="form-control" placeholder="sample@gmail.com">
                            </div>
                            @error('email')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>

                            <div class="row">
                            <div class="col-sm-6">
                                <label for="password" class="col-sm-6 col-form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Atleat 8 characters or above">
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="col-sm-6">
                                <label for="password_confirmation" class="col-sm-10 col-form-label">Confirm Password</label>
                                <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password" class="form-control">
                                @error('password_confirmation')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            </div>

                            <div class="row pb-3">

                            </div>

                            <div class="row">
                            <div class="col-sm-10 m-1">
                                <div class="checkbox">
                                <label>
                                    <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                                </label>
                                </div>
                            </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100 font-weight-bold mt-1">
                                        {{ __('Register') }}
                                    </button>
                                    <a href="{{url('/login')}}">
                                        <p class=" text-center mt-2">Already have an account?</p>
                                    </a>
                                </div>
                            </div>

                        </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- /.content-wrapper -->
  @endsection
