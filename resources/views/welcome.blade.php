@extends('layouts.app')

@section('title', 'Welcome to App Shop')

@section('body-class', 'landing-page')

@section('styles')
  <style> 
    .team .row .col-md-4{
      margin-bottom: 5em;
    }
    .team .row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display:         flex;
    flex-wrap: wrap;
  }
   .team .row > [class*='col-'] {
    display: flex;
    flex-direction: column;
  }

    .tt-query {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
       -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }

  .tt-hint {
    color: #999
  }

  .tt-menu {    /* used to be tt-dropdown-menu in older versions */
    width: 122px;
    margin-top: 4px;
    padding: 4px 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
            border-radius: 4px;
    -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
  }

  .tt-suggestion {
    padding: 3px 20px;
    line-height: 24px;
  }

  .tt-suggestion.tt-cursor,.tt-suggestion:hover {
    color: #fff;
    background-color: #0097cf;

  }

  .tt-suggestion p {
    margin: 0;
  }
  </style>
@endsection

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
          <h5 class="description">You can check our complete list of categories, compare prices and place your orders when you are safe.</h5>
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
      <h2 class="title">Available Categories</h2>

      <form method="GET" action="{{url('/search')}}" class="form-inline">
        <input type="text" placeholder="What product are you looking for?" class="form-control" name="query" id="search">
        <button type="submit" class="btn btn-primary btn-fab btn-fab-mini btn-round">
          <i class="material-icons">search</i>
        </button>
      </form>

      <div class="team">
        <div class="row">
        @foreach ($categories as $category)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{$category->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title"> 
                  <a href="{{url('/categories/'.$category->id)}}">{{ $category->name }}</a>
                  <!-- <br>
                  <small class="card-description text-muted">{{$category->category_name}}</small> -->
                </h4>
                <div class="card-body">
                  <p class="card-description"> {{ $category->description }} </p>
                </div>
                <!-- <div class="card-footer justify-content-center">
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                  <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                </div> -->
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
          <h2 class="text-center title">You have not yet registered?</h2>
          <h4 class="text-center description">Register by entering your basic data and you can place orders through our shopping cart.</h4>
          <form class="contact-form" method="GET" action="{{url('register')}}">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Start Register
                </button>
              </div>
            </div>

            <!-- <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <a href="{{url('register')}}" class="btn btn-primary btn-round">Start Register</a>
              </div>
            </div> -->
            

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection

@section('scripts')
  <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
  <script>
  $(function () {
    var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '{{url('/products/json')}}'
    });

    //inicializar el typeahead sobre nuestro input de busqueda
    $('#search').typeahead(
    {
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'products',
      source: products
    });
  });
  </script>
@endsection