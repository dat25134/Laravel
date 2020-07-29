@extends('home')
@section('title', 'Chi tiết giỏ hàng')
@section('content')
<h2 class="text-center">Chi tiết giỏ hàng</h2>
<table class="table">
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
            <td class="d-flex justify-content-center font-weight-bold" style="vertical-align: middle">{{$key+1}}</td>
            <td>
                <div class="card p-2 rounded" style="width: 18rem;">
                    <img src="{{$item[0]->image}}" class="card-img-top" alt="{{$item[0]->name}}"
                        class="img-fluid img-thumbnail">
                    <div class="card-body">
                        <h5 class="card-title">{{$item[0]->name}}</h5>
                        <p class="card-text">Giá : <span
                                style="font-size: 150%;font-weight:bold;color:rgb(146, 28, 28)">{{number_format($item[0]->price)." VNĐ"}}</span>
                        </p>
                        <span>Số Lượng : </span><input type="number" id="{{$item[0]->id}}" name="{{$item[0]->id}}" onchange='updateSL({{$item[0]->id}})' value="{{$item[1]}}" style="width: 50px">
                        <div style="position: absolute; top:0;right:0 ; background-color: white">
                            <a href="{{route('delete',$item[0]->id)}}">
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </td>
            <td style="vertical-align: middle">
            <h2 style="font-weight:bold; color: rgb(131, 20, 20)" id="p{{$item[0]->id}}">{{number_format($item[0]->price*$item[1]) . " VNĐ"}}</h2>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function updateSL(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let sl = document.getElementById(id).value;
        $.ajax({
        type: "POST",
        url: 'http://localhost:8000/sesion/aaaa/' + id,
        data: { sl:sl}
        }).done(function(total) {
            $("#total").text('Tổng cộng: ' + Number(total).toLocaleString('en') + " VNĐ");
            $("#p"+id).load(" #p"+id);
        });
    }
</script>
<h3 id="total">Tổng cộng: {{ number_format($total)." VNĐ" }}</h3>
<a href="{{ route('index')}}"> Quay lại trang chủ</a>
@endsection
