@extends('layouts.app')

@section('title', 'App Shop')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  
</div>

<div class="main main-raised">
  <div class="container">
  
    <div class="section text-center">
      <h2 class="title">All Products</h2>
      <div class="team">
        <div class="row">

          <a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">New Product</a>
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2">Name</th>
                    <th class="col-md-4">Description</th>
                    <th>Category</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach( $products as $product)
                <tr>
                    <td class="text-center">{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category ? $product->category->name : 'General'}}</td>
                    <td class="text-right">&euro; {{$product->price}}</td>
                    <td class="td-actions text-right">
                        <form method="POST" action="{{url('admin/products/'.$product->id.'/delete')}}">

                        <!-- Las tres cosas significan lo mismo, se usa cuando el pedido es un metodo POST -->
                        @csrf
                        <!-- {{csrf_field()}} 
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

                          <a href="" rel="tooltip" title="View Product" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-info"></i>
                          </a>
                          <a href="{{url('admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Edit Product" class="btn btn-success btn-simple btn-xs">
                              <i class="fa fa-edit"></i>
                          </a>
                          <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
          {{ $products->links() }}

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
