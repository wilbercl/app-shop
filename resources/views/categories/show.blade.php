@extends('layouts.app')

@section('title', 'Category')

@section('body-class', 'profile-page')

@section('styles')
  <style> 
    .team {
      padding-bottom: 50px;
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
  </style>
@endsection

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  
</div>

<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{$category->featured_image_url}}" alt="Representative image of the category {{$category->name}}" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{$category->name}}</h3>
              </div>

              @if (session('notification'))
              <div class="alert alert-success" role="alert">
                {{ session('notification') }}
              </div>
              @endif

              <div class="description text-center">
                <p>{{$category->description}}</p>
              </div>  
            </div>


          </div>

          
          <div class="team text-center">
            <div class="row">
            
            @foreach ($products as $product)
              <div class="col-md-4">
                <div class="team-player">
                  <div class="card card-plain">
                    <div class="col-md-6 ml-auto mr-auto">
                      <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                    </div>
                    <h4 class="card-title"> 
                      <a href="{{url('/products/'.$product->id)}}">{{ $product->name }}</a>
                      <!-- <br> -->
                      <!-- <small class="card-description text-muted">{{$product->category_name}}</small> -->
                    </h4>
                    <div class="card-body">
                      <p class="card-description"> {{ $product->description }} </p>
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

          <div class="text-center">
            {{$products->links()}}
          </div>
        
            

        </div>
          

      
        
      </div>
    </div>
  </div>

@include('includes.footer')
@endsection
