@extends('layouts.app')

@section('title', 'Register Category')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>

<div class="main main-raised">
  <div class="container">
    
    <div class="section">
      <h2 class="title text-center">Register Category</h2>

      @if($errors->any())
        <div class="alert alert-danger">
          <url>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </url>
        </div>
      @endif
      
      <form method="POST" action="{{url('/admin/categories')}}" enctype="multipart/form-data">
        @csrf

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="bmd-label-floating">Name</label>
                <input type="text" class="form-control" name="name">
              </div>         
            </div>

            <div class="col-sm-6">
              <label class="control-label">Image Category</label>
              <input type="file" name="image">
            </div>
          </div>
          
           <textarea class="form-control" placeholder="Description" rows="5" name="description" rows="5"></textarea>       

          <button class="btn btn-primary">Register</button>
          <a href="{{url('/')}}" class="btn btn-default"> Cancel</a>

      </form>

    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection
