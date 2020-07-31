@extends('layouts.form')
@section('title', 'Danh Sách sản phẩm')
@section('content')
<div class="container mt-5">
    <h2 class="text-center" style="margin-top:135px">DANH SÁCH SẢN PHẨM</h2>
    @if (count($products)>0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
        @foreach ($products as $key=>$item)
        <div class="card text-center mt-3 border ml-5 rounded pt-2" style="width: 18rem;">
            <img src="{{$item->image}}" class="card-img-top" alt="{{$item->name}}">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name}}</h5>
                <p class="card-text">{{ number_format($item->price)." VNĐ"}}</p>
                <a href="{{route('show',$item->id)}}" class="btn btn-primary rounded-pill">Details</a>
                <button onclick="addcart({{$item->id}})" class="btn btn-danger rounded-pill" style="width:100px"><i
                        class="fa fa-shopping-cart" aria-hidden="true"></i></button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">{{ $products->links() }}</div>
    @else
    <h5 class="text-center">Hiện chưa có sản phẩm nào</h5>
    @endif
</div>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endpush
@endsection
