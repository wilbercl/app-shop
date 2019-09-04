@extends('layouts.app')

@section('title', 'All Products')

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

          <div class="col">
            <a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">New Product</a>         
          </div>

          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2 text-center">Name</th>
                    <th class="col-md-4 text-center">Description</th>
                    <th class="text-center">Category</th>
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

                          <a href="{{url('products/' . $product->id)}}"  rel="tooltip" title="View Product" class="btn btn-info btn-link">
                            <i class="fa fa-info"></i>
                          </a>
                          <a href="{{url('admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Edit Product" class="btn btn-success btn-link">
                              <i class="fa fa-edit"></i>
                          </a>
                          <a href="{{url('admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Product Images" class="btn btn-warning btn-link">
                            <i class="fa fa-image"></i>
                          </a>
                          <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link">
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

@include('includes.footer')
@endsection
