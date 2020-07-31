@extends('layouts.form')
@section('title', 'DASHBOARD')
@section('content')
@include('layouts.sidebar')
{{-- datatable --}}
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<div class="content-container" >
    <div class="container-fluid" id="content">
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
                <form action="{{route('dashboard.create')}}" method="POST">
                    @csrf
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
                                    <label for="name" class="col-form-label">Tên sản phẩm <span
                                            class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    @error('name')
                                    <p class="text-danger"> {{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Mô tả sản phẩm</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-form-label">Giá: <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="price" name="price">
                                    @error('price')
                                    <p class="text-danger"> {{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-form-label">Hình ảnh<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="image" name="image">
                                    <span class="text-danger">Đường link của ảnh</span>
                                    @error('image')
                                    <p class="text-danger"> {{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <span class="text-danger">* : bắt buộc phải nhập</span>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary">THÊM</button> --}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <button type="submit" class="btn btn-primary" >THÊM</button>
                        </div>

                    </div>
                </div>
            </form>
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
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody id="body">
                @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td><img src="{{$item->image}}" alt="" style="width:50px;height:50px"></td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td class="text-center"><button class="btn btn-info">Edit</button><button
                            class="btn btn-danger mt-1" onclick="delProduct({{$item->id}})">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{!!<script>
            $(document).ready( function () {
            $('#ListProduct').DataTable();
            } );
        </script>!!}} --}}
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
    @endsection
