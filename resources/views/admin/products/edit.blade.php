@extends('layouts.app')

@section('title', 'App Shop')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>

<div class="main main-raised">
  <div class="container">
    
    <div class="section">
      <h2 class="title text-center">Edit Product</h2>
      
      <form method="POST" action="{{url('/admin/products/'.$product->id.'/edit')}}">
        @csrf

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
          </div>
            
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{$product->price}}">
            </div>
            </div>
          </div>
          
          <div class="form-group label-floating">
            <label class="control-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{$product->description}}">
          </div>        

          <textarea class="form-control" placeholder="Description long" rows="5" name="long_description" rows="5"> 
            {{$product->long_description}}
          </textarea>

          <button class="btn btn-primary">Update</button>
          <a href="{{url('admin/products')}}" class="btn btn-default"> Cancel</a>

      </form>

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
