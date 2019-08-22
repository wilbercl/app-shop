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
      
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <ul class="nav nav-pills nav-pills-primary" role="tablist">
            <li>
                <a href="#dashboard" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Shopping Cart
                </a>
            </li>
            
            <li>
                <a href="#tasks" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Place Orders
                </a>
            </li>
        </ul>

    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection

