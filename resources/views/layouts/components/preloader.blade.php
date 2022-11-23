<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('/dist')}}/img/Logo.png" style="border-radius:35%" alt="AdminLTELogo" height="200" width="200">

    @if (session('status'))
        <div class="alert alert-success m-2" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning m-2 text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif
  </div>
