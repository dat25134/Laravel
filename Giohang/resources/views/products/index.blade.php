@extends('home')
@section('title', 'Danh Sách sản phẩm')
@section('content')
<div class="container-fluid pt-5">
    <h2 class="text-center">DANH SÁCH SẢN PHẨM</h2>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
            @foreach ($products as $key=>$item)
            <div class="card text-center mt-3 border ml-5 rounded pt-2" style="width: 18rem;">
                <img src="{{$item->image}}" class="card-img-top" alt="{{$item->name}}">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->name}}</h5>
                  <p class="card-text">{{ number_format($item->price)." VNĐ"}}</p>
                  <a href="{{route('show',$item->id)}}" class="btn btn-primary rounded-pill">Details</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
