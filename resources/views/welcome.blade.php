@extends('layouts.app')

@section('title', 'Welcome to App Shop')

@section('body-class', 'landing-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Welcome to App Shop.</h1>
        <h4>Place orders online and we will contact you to make the delivery.</h4>
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> Watch video
        </a>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Why App Shop?</h2>
          <h5 class="description">You can check our complete list of products, compare prices and place your orders when you are safe.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-info">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Questions</h4>
              <p>We quickly answer any questions you have via chat. You are not alone, we are always attentive to your concerns.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Secure Payment</h4>
              <p>Every order you make will be made through a call. If you do not trust online payments you can pay on delivery the associated value.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-danger">
                <i class="material-icons">fingerprint</i>
              </div>
              <h4 class="info-title">Private Information</h4>
              <p>The orders you make will only be known through your user panel. No one else has access to information.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="section text-center">
      <h2 class="title">Available Products</h2>
      <div class="team">
        <div class="row">
        @foreach ($products as $product)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <!-- <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{$product->images ? $product->images->first()->image : asset('img/profile_city.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div> -->
                <h4 class="card-title"> {{ $product->name }}
                  <br>
                  <small class="card-description text-muted">{{$product->category ? $product->category->name : 'General'}}</small>
                </h4>
                <div class="card-body">
                  <p class="card-description"> {{ $product->description }} </p>
                </div>
                <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Work with us</h2>
          <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            Creative Tim
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            Blog
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
    </div>
  </div>
</footer>
@endsection
