@extends('layouts.app')

@section('title', 'App Shop')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>

<div class="main main-raised">
  <div class="container">
    
    <div class="section">
      <h2 class="title text-center">Edit Category</h2>

      @if($errors->any())
        <div class="alert alert-danger">
          <url>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </url>
        </div>
      @endif

      @if (session('notification'))
        <div class="alert alert-success" role="alert">
          {{ session('notification') }}
        </div>
      @endif
      
      <form method="POST" action="{{url('/admin/categories/'.$category->id.'/edit')}}" enctype="multipart/form-data">
        @csrf

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
              </div>
            </div>    

            <div class="col-sm-6">              
              <label class="control-label">Image Category</label>
              <input type="file" name="image" value="{{$category->image}}">  
              @if ($category->image)  
              <p class="help-block"> 
                Upload only if you want to replace the 
                <a href="{{asset('/images/categories/'. $category->image)}}" target="_blank">current image </a>     
              </p>
              @endif    
            </div>           
          </div>
          
          <textarea class="form-control" placeholder="Description" rows="5" name="description" rows="5"> 
            {{$category->description}}
          </textarea>

          <button class="btn btn-primary">Update</button>
          <a href="{{url('admin/categories')}}" class="btn btn-default"> Cancel</a>

      </form>

    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection
