@extends('layouts.app')

@section('title', 'Product Images')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  
</div>

<div class="main main-raised">
  <div class="container">
  
    <div class="section text-center">
      <h2 class="title">"{{ $product->name }}" Product Images</h2>       

      
      <form method="POST" action="" enctype="multipart/form-data">
      @csrf
        <input type="file" name="photo" required> <!-- El campo required obliga a que el usuario haya seleccionado algun archivo de imagen -->
        <button type="submit" class="btn btn-primary btn-round">New Image</button>
        <a href="{{url('/admin/products')}}" class="btn btn-default btn-round">Back</a>
      </form>
       
      <hr>

      <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="{{$image->url}}" width="250">
              <form method="POST" action="">
              @csrf
              {{method_field('DELETE')}}
                <input type="hidden" name="image_id" value="{{$image->id}}">
                @if ($image->featured)
                  <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Outstanding Image">
                    <i class="material-icons">favorite</i>
                  </button>
                @else
                  <a href="{{ url('admin/products/' . $product->id . '/images/select/' . $image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i>
                  </a>
                @endif
                <button type="submit" class="btn btn-danger btn-round">Remove</button>
              </form>      
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
      
    
    
  </div>
</div>

@include('includes.footer')
@endsection
