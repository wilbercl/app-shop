@extends('layouts.app')

@section('body-class', 'login-page')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">

            @if($errors->any())
            <div class="alert alert-danger">
              <url>
                  @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </url>
            </div>
            @endif

            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Log In</h4>
                <!-- <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> -->
              </div>
              <p class="description text-center">Or Be Classical</p>
              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username...">
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                </div>

                <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" value={{ old('remember') ? "checked" : "" }}>
                      Remember Me
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                  </label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</button>
                </div>
              </div>

              <!-- <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</button>
              </div> -->

              <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
              </a>-->

            </form>
          </div>
        </div>
      </div>
    </div>

    @include('includes.footer')
</div>
@endsection
