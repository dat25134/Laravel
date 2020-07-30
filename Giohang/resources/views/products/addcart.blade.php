@extends('home')
@section('title', 'Chi tiết giỏ hàng')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Chi tiết giỏ hàng</h2>
    </div>
    <div class="card-body">
        <table class="table border" id="listProdut">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mặt hàng</th>
                    <th scope="col"> Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productsList as $key=>$item)
                <tr class="table">
                    <td class="text-center font-weight-bold" style="vertical-align: middle">{{$key+1}}</td>
                    <td>
                        <div class="card p-2 rounded" style="width: 18rem;">
                            <img src="{{$item[0]->image}}" class="card-img-top w-50 h-50" alt="{{$item[0]->name}}"
                                class="img-fluid img-thumbnail" style="margin:auto">
                            <div class="card-body">
                                <h5 class="card-title">{{$item[0]->name}}</h5>
                                <p class="card-text">Giá : <span
                                        style="font-size: 150%;font-weight:bold;color:rgb(146, 28, 28)">{{number_format($item[0]->price)." VNĐ"}}</span>
                                </p>
                                <span>Số Lượng : </span><input type="number" id="{{$item[0]->id}}" name="sl" onchange='updateSL({{$item[0]->id}})' value="{{$item[1]}}" style="width: 50px" min='1'>
                                <div style="position: absolute; top:0;right:0 ; background-color: white">
                                    {{-- <a href="{{route('delete',$item[0]->id)}}"> --}}
                                        <button onclick="delCart({{$item[0]->id}})" type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    {{-- </a> --}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td style="vertical-align: middle">
                    <h2 style="font-weight:bold; color: rgb(131, 20, 20)" id="p{{$item[0]->id}}">{{number_format($item[0]->price*$item[1]) . " VNĐ"}}</h2>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2"><h3 >Tổng cộng: </h3></td>
                    <td  class="text-danger"><h3 id="total">{{ number_format($total)." VNĐ" }}</h3></td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
<div class="container text-center">
    <a href="{{ route('index')}}" class="btn btn-info"> Quay lại trang chủ</a>
</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endpush

@endsection
