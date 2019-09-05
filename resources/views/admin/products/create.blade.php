@extends('layouts.app')

@section('title', 'Register Product')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>

<div class="main main-raised">
  <div class="container">
    
    <div class="section">
      <h2 class="title text-center">Register Product</h2>

      @if($errors->any())
        <div class="alert alert-danger">
          <url>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </url>
        </div>
      @endif
      
      <form method="POST" action="{{url('/admin/products')}}">
        @csrf

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
          </div>
            
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Price</label>
                <input type="number" class="form-control" name="price">
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Description</label>
                <input type="text" class="form-control" name="description">
              </div> 
            </div>
            
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Category</label>
                  <select class="form-control" name="category_id">
                    <option value="0">General</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </div>                 

          <textarea class="form-control" placeholder="Description long" rows="5" name="long_description" rows="5"></textarea>

          <button class="btn btn-primary">Register</button>
          <a href="{{url('/')}}" class="btn btn-default"> Cancel</a>

      </form>

    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection
