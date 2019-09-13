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
                <td>$ {{$detail->price}}</td>
                <td>{{$detail->quantity}}</td>
                <td>$ {{$detail->quantity * $detail->price}}</td>
                <td class="td-actions">
                    <form method="POST" action="{{url('cart')}}">
                        @csrf
                        {{method_field('DELETE')}}

                        <input type="hidden" name="id" value="{{$detail->id}}">
                        <a href="{{url('/products/' . $detail->product->id)}}" target="_blank" rel="tooltip" title="View Product" class="btn btn-info btn-link">
                            <i class="fa fa-info"></i>
                        </a>
                        <button type="button" title="Edit Detail" class="btn btn-success btn-link" data-toggle="modal" data-target="#modalEditCartDetail" data-id="{{$detail->id}}" data-quantity="{{$detail->quantity}}">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>   
                </td>
            </tr>

            
            @endforeach
                
            </tbody>
        </table>

        <p><strong>Amount to pay: </strong>{{auth()->user()->cart->total}}</p>

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

<!-- Modal Core -->
<div class="modal fade" id="modalEditCartDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Detail: Quantity</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>

      <form method="POST" action="{{url('cart')}}">
        @csrf
        {{method_field('PUT')}}
        <div class="modal-body">
            <input type="hidden" name="id" value="" id="id">
            <input type="number" name="quantity" id="quantity" value="" class="form-control">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-simple">Save</button>
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>    
        </div>
      </form>
           
    </div>
  </div>
</div>

@include('includes.footer')
@endsection

@section('scripts')
  <script>
  $(document).ready(function (e) {
  $('#modalEditCartDetail').on('show.bs.modal', function(e) {    
     var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#id').val(id);

      var quantity = $(e.relatedTarget).data().quantity;
      $(e.currentTarget).find('#quantity').val(quantity);
  });
});
  </script>
@endsection