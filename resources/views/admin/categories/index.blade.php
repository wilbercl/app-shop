@extends('layouts.app')

@section('title', 'All Categories')

@section('body-class', 'profile-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  
</div>

<div class="main main-raised">
  <div class="container">
  
    <div class="section text-center">
      <h2 class="title">All Categories</h2>

        @if (session('notification'))
          <div class="alert alert-success" role="alert">
            {{ session('notification') }}
          </div>
        @endif
      
      <div class="team">
        <div class="row">

          <div class="col">
            <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">New Category</a>         
          </div>

          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="col-md-2 text-center">Name</th>
                    <th class="col-md-4 text-center">Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach( $categories as $key => $category)
                <tr>
                    <td class="text-center">{{$key + 1}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td class="td-actions">
                        <form method="POST" action="{{url('admin/categories/'.$category->id.'/delete')}}">

                        <!-- Las tres cosas significan lo mismo, se usa cuando el pedido es un metodo POST -->
                        @csrf
                        <!-- {{csrf_field()}} 
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

                          <a href="{{url('categories/' . $category->id)}}"  rel="tooltip" title="View Category" class="btn btn-info btn-link" target="_blank">
                            <i class="fa fa-info"></i>
                          </a>
                          <a href="{{url('admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Edit Category" class="btn btn-success btn-link">
                              <i class="fa fa-edit"></i>
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
        
        {{ $categories->links() }}     

        </div>
      </div>
    </div>
    
  </div>
</div>

@include('includes.footer')
@endsection
