@extends('home')
@section('title', 'Danh Sách sản phẩm')
@section('content')
<div class="container-fluid pt-5">
    <div class="d-flex bd-highlight mb-3">
        <div class="mr-auto p-2 bd-highlight">
            <h2 class="text-center">DANH SÁCH SẢN PHẨM</h2>
        </div>


        <div class="dropdown">
            <button class="btn dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="p-2 bd-highlight btn btn-primary">Giỏ hàng <i
                        class="fa fa-shopping-cart btn btn-primary rounded-circle" aria-hidden="true"></i>
                </div>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                @if (count(session('cart'))>0)
                @foreach ($data as $item)
                <div class="dropdown-item">
                    <div class="card mb-3" style="width: 300px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="{{$item[0]->image}}" class="card-img" alt="{{$item[0]->name}}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item[0]->name}}</h5>
                                    <p class="card-text">SL :{{$item[1]}}</p>
                                <p class="card-text"><small class="text-muted">Thành tiền : {{$item[1]*$item[0]->price}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="dropdown-item">
                    <p class="text-info">{{$data}}</p>
                </div>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{route('showcart')}}" class="dropdown-item">Xem chi tiết</a>
            </div>
        </div>
    </div>
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
                <button onclick="addcart({{$item->id}})" class="btn btn-danger rounded-pill" style="width:100px"><i
                        class="fa fa-shopping-cart" aria-hidden="true"></i></button>
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
            toastr.options = {
                "positionClass": "toast-bottom-right",
            };
            toastr["success"](message, "Success");

        });
    }
</script>
{{-- dropdown menu --}}

<script>
    $('.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
@endsection
