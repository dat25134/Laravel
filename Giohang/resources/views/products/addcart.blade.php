@extends('layouts.form')
@section('title', 'Chi tiết giỏ hàng')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center" style="margin-top:135px"> Chi tiết giỏ hàng</h2>
    </div>
    <div class="card-body">
        <table class="table border text-center" id="listProdut">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mặt hàng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col"> Thành tiền</th>
                    <th cope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productsList as $key=>$item)
                <tr class="table">
                    <td class="text-center font-weight-bold" style="vertical-align: middle">{{$key+1}}</td>
                    <td style="vertical-align: middle">{{$item[0]->name}}</td>
                    <td style="vertical-align: middle">
                        <img src="{{$item[0]->image}}" class="card-img-top w-50 h-50" alt="{{$item[0]->name}}"
                            class="img-fluid img-thumbnail" style="margin:auto">
                    </td>
                    <td style="vertical-align: middle">
                        <p class="card-text"><span
                                style="font-size: 150%;font-weight:bold;color:rgb(146, 28, 28)">{{number_format($item[0]->price)." VNĐ"}}</span>
                        </p>
                    </td>
                    <td style="vertical-align: middle">
                        <input type="number" id="{{$item[0]->id}}" name="sl" onchange='updateSL({{$item[0]->id}},this)'
                            value="{{$item[1]}}" style="width: 50px" min='1'>
                    </td>
                    <td style="vertical-align: middle">
                        <h2 style="font-weight:bold; color: rgb(131, 20, 20)" id="p{{$item[0]->id}}">
                            {{number_format($item[0]->price*$item[1]) . " VNĐ"}}</h2>
                    </td>
                    <td>
                        <div style="background-color: white">
                            <button onclick="delCartItem({{$item[0]->id}})" type="button" class="close"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                        <h3>Tổng cộng: </h3>
                    </td>
                    <td colspan="3" class="text-danger">
                        <h3 id="total">{{ number_format($total)." VNĐ" }}</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container text-center">
    <a href="{{ route('index')}}" class="btn btn-info"> Quay lại trang chủ</a>
    @if (count($productsList)>0) <button class="btn btn-danger" data-toggle="modal" data-target="#delCart"> Xóa tất cả
        các sản phẩm</button>
        <div class="modal fade" id="delCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa hết!!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-primary" onclick="delCart()" data-dismiss="modal">YES</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endpush

@endsection
