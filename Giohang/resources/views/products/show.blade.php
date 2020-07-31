@extends('layouts.form')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<h2 class="text-center" style="margin-top:135px"> Chi tiết sản phẩm</h2>
<div class="d-flex bd-highlight mt-5">
    <div class="p-2 flex-fill bd-highlight col-3 pl-5">
        <div class="card" style="width: 18rem;">
            <img src="{{$product->image}}" class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-danger"> Giá: <span
                        style="font-size: 150%;font-weight:bold">{{ number_format($product->price) . " VNĐ"}}</span>
                </li>
            </ul>
            <div class="card-body text-center">
            <a href="{{route('showcart')}}" class="btn btn-warning">Mua ngay</a>
            </div>
        </div>
    </div>
    <div class="p-2 flex-fill bd-highlight col-9 pt-5">
        <h2>{{$product->name}}</h2>
        <ul class="list-group">
            <li class="list-group-item">Service 1</li>
            <li class="list-group-item">Service 2</li>
            <li class="list-group-item">Service 3</li>
            <li class="list-group-item">Service 4</li>
            <li class="list-group-item">Service 5</li>
          </ul>
    </div>

</div>

@endsection
