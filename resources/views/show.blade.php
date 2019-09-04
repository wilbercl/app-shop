@extends('layouts.app')

@section('title', 'Product')

@section('body-class', 'profile-page')

@section('styles')
  <style> 
    .row .col-md-4{
      margin-bottom: 4em;
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
                <img src="{{$product->featuredimageurl}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>             

              <div class="name">
                <h3 class="title">{{$product->name}}</h3>
                <h6>{{$product->category->name}}</h6>
              </div>
            </div>

            @if (session('notification'))
              <div class="alert alert-success" role="alert">
                {{ session('notification') }}
              </div>
            @endif
          </div>
        </div>
        
        <div class="description text-center">
          <p>{{$product->long_description}}</p>
        </div>    
        
        <div class="text-center">
          <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
            <i class="material-icons">add</i> Add to Shopping Cart
          </button>
        </div>

<!--         <div class="tab-content tab-space">
        @foreach ($images as $image)
          <div class="tab-pane active text-center gallery" id="studio">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="{{$image->url}}" width="250" class="rounded">
                  
                </div>
                
              </div>
            </div>
            @endforeach
        </div>
 -->
        <div class="row">
          @foreach ($images as $image)
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <img src="{{$image->url}}" width="250">
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <!-- <div class="tab-content tab-space">     
          <div class="tab-pane active text-center gallery" id="studio">
            <div class="row">
              <div class="col-md-6 ml-auto">
               @foreach ($images as $image)
                <img src="{{$image->url}}" class="rounded">
                @endforeach 
              </div>
              
            </div>
          </div>                  
        </div> -->

         
      </div>
    </div>
  </div>

<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Select the amount you want to add</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>

      <form method="POST" action="{{url('cart')}}">
      @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="modal-body">
          <input type="number" name="quantity" value="1" class="form-control">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-simple">Save</button>
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>    
        </div>
      </form>
           
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
