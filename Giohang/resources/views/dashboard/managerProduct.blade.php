@extends('layouts.form')
@section('title', 'DASHBOARD')
@section('content')
@include('layouts.sidebar')
{{-- datatable --}}
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<div class="content-container">
    <div class="container-fluid" style="margin-top:130px" id="content">
        <div class="dashboard">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <h2 class="text-center">Danh sách chi tiết các sản phẩm</h2>
                </div>
                <div class="p-2 bd-highlight"><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">ADD</button></div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                {{-- <form action="{{route('dashboard.create')}}" method="POST">
                @csrf --}}
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm chi tiết sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Tên sản phẩm <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name">
                                {{-- @error('name')
                                    <p class="text-danger"> {{$message}}</p>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-form-label">Giá: <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="price" name="price">
                                {{-- @error('price')
                                    <p class="text-danger"> {{$message}}</p>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Hình ảnh<span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="image" name="image">
                                <span class="text-danger">Đường link của ảnh</span>
                                {{-- @error('image')
                                    <p class="text-danger"> {{$message}}</p>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <span class="text-danger">* : bắt buộc phải nhập</span>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">THÊM</button> --}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <button type="submit" class="btn btn-primary" onclick="newProduct()"
                                data-dismiss="modal">THÊM</button>
                        </div>

                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>

        <table class="table" id="ListProduct">

            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody id="body">
                @foreach ($products as $item)
                <tr id="p{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td id="productName{{$item->id}}">{{$item->name}}</td>
                    <td id="productDes{{$item->id}}">{{$item->description}}</td>
                    <td id="productPrice{{$item->id}}">{{$item->price}}</td>
                    <td id="productImg{{$item->id}}"><img src="{{$item->image}}" alt="" style="width:50px;height:50px">
                    </td>
                    <td class="text-center">
                        {{-- @include('layouts.modal') --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product"
                            onclick="getProduct({{$item->id}})">
                            Edit
                        </button>
                        <button class="btn btn-danger ml-3" data-toggle="modal"
                            data-target="#deleteProduct{{$item->id}}">Delete</button></td>


                    <div class="modal fade" id="deleteProduct{{$item->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa không!!!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary" onclick="delProduct({{$item->id}})" data-dismiss="modal">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
<script>
    function formdata () {
        $('#ListProduct').DataTable();
        };
        formdata();
</script>
@if (Session::has('success'))
<script>
    {{!!request()->session()->get('success')!!}}
</script>
@endif
@endpush
{{-- modal --}}
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="name" class="col-form-label">ID Sản phẩm </label>
                    <input type="text" class="form-control" id="idProduct" name="idProduct" readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">Tên sản phẩm <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả sản phẩm</label>
                    <input type="text" class="form-control" id="desProduct" name="desProduct">
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">Giá: <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="priceProduct" name="priceProduct">
                </div>
                <div class="form-group">
                    <label for="image" class="col-form-label">Hình ảnh<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="imageProduct" name="imageProduct">
                    <span class="text-danger">Đường link của ảnh</span>
                </div>
                <div class="form-group">
                    <span class="text-danger">* : bắt buộc phải nhập</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editProduct()" data-dismiss="modal">Áp
                    dụng</button>
            </div>
        </div>
    </div>
</div>

@endsection
