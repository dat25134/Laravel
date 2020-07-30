@extends('home')
@section('title', 'Danh Sách sản phẩm')
@section('content')
<div class="container-fluid pt-5">
    <div class="d-flex bd-highlight mb-3">
        <div class="mr-auto p-2 bd-highlight"><h2 class="text-center">DANH SÁCH SẢN PHẨM</h2></div>
        <div class="p-2 bd-highlight"><a href="{{route('showcart')}}"> Xem chi tiết giỏ hàng <i class="fa fa-shopping-cart btn btn-primary rounded-circle" aria-hidden="true"></i></a></div>
      </div>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
            @foreach ($products as $key=>$item)
            <div class="card text-center mt-3 border ml-5 rounded pt-2" style="width: 18rem;">
                <img src="{{$item->image}}" class="card-img-top" alt="{{$item->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->name}}</h5>
                  <p class="card-text">{{ number_format($item->price)." VNĐ"}}</p>
                  <a href="{{route('show',$item->id)}}" class="btn btn-primary rounded-pill">Details</a>
                  <button onclick="addcart({{$item->id}})" class="btn btn-danger rounded-pill" style="width:100px"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    function addcart(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        type: "POST",
        url: 'http://localhost:8000/'+id+'/addcart',
        }).done(function(message) {
            toastr["success"](message, "Success");
        });
    }
</script>

@endsection
