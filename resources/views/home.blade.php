@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>

<div class="main main-raised">
  <div class="container">
    
    <div class="section">
      <h2 class="title text-center">Dashboard</h2>
      
        @if (session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        @endif

        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a href="#dashboard" role="tab" data-toggle="tab" class="nav-link active">
                    <i class="material-icons">dashboard</i>
                    Shopping Cart
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#tasks" role="tab" data-toggle="tab" class="nav-link">
                    <i class="material-icons">list</i>
                    Orders Placed
                </a>
            </li>
        </ul>

        <hr>
        <p>Your shopping cart presents {{auth()->user()->cart->details->count()}} products</p>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Image</th>
                    <th class="text-center">Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach (auth()->user()->cart->details as $detail)
            <tr>
                <td class="text-center">
                    <img src="{{$detail->product->featured_image_url}}" height="50">
                </td>
                <td>
                    <a href="{{url('/products/'. $detail->product->id)}}" target="_blank"> {{$detail->product->name}} </a>
                </td>                    
                <td>$ {{$detail->product->price}}</td>
                <td>{{$detail->quantity}}</td>
                <td>$ {{$detail->quantity * $detail->product->price}}</td>
                <td class="td-actions">
                    <form method="POST" action="{{url('cart')}}">
                        @csrf
                        {{method_field('DELETE')}}

                        <input type="hidden" name="id" value="{{$detail->id}}">
                        <a href="{{url('/products/' . $detail->product->id)}}" target="_blank" rel="tooltip" title="View Product" class="btn btn-info btn-link">
                            <i class="fa fa-info"></i>
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

        <div class="text-center">
            <form method="POST" action="{{url('/order')}}">
                @csrf
                <button class="btn btn-primary btn-round">
                  <i class="material-icons">done</i> Review order
                </button>
            </form>           
        </div>
        
        
    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection

