@extends('layouts.app')

@section('body-class', 'login-page')

@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login" style="width: 35rem;">

          @if($errors->any())
          <div class="alert alert-danger">
            <url>
                @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </url>
          </div>
          @endif

            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
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

                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">perm_identity</i>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="name" value="{{ old('name', $name) }}" required autofocus placeholder="Name...">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">book</i>
                        </span>
                      </div>
                      <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required placeholder="Address...">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $email) }}" autocomplete="email" autofocus placeholder="Email...">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                    </div>
                  </div>
                </div>             
                            
              <div class="row">
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                    </div>
                    <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="Phone...">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password...">
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Username...">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Register</a>
                <a href="{{url('admin/products')}}" class="btn btn-primary btn-link btn-wd btn-lg"> Cancel</a>
              </div> 
            </div>

              <!-- <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Register</a>
                <a href="{{url('admin/products')}}" class="btn btn-primary btn-link btn-wd btn-lg"> Cancel</a>
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
