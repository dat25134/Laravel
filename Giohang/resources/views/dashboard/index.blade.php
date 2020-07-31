@extends('layouts.form')
@section('title', 'DASHBOARD')
@section('content')
@include('layouts.sidebar')
<div class="content-container">
    <div class="container-fluid" id="content">
        <div class="dashboard">
            <div class="info">
                <div class="group group1">
                    <div class="row1 row">
                        <i class="fa fa-paw fa-5x"></i>
                        <div class="nd">
                            <label for="SL"> {{count($products)}} </label>
                            <p>Số lượng sản phẩm</p>
                        </div>
                    </div>
                    <div class="row2 row">
                        <a href=""><i
                                class="fa fa-caret-right"></i> Xem chi tiết</a>
                    </div>
                </div>
                <div class="group group2">
                    <div class="row1 row">
                        <i class="fa fa-user-circle-o fa-5x"></i>
                        <div class="nd">
                            <label for="SL"> 123 </label>
                            <p>Số lượng user</p>
                        </div>
                    </div>
                    <div class="row2 row">
                        <a href=""><i
                                class="fa fa-caret-right"></i> Xem chi tiết</a>
                    </div>
                </div>
                <div class="group group3">
                    <div class="row1 row">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <div class="nd">
                            <label for="SL">123 </label>
                            <p>Số lượng đơn hàng</p>
                        </div>
                    </div>
                    <div class="row2 row">
                        <a href=""><i
                                class="fa fa-caret-right"></i> Xem chi tiết</a>
                    </div>
                </div>
                <div class="group group4">
                    <div class="row1 row">
                        <i class="fa fa-dollar fa-5x"></i>
                        <div class="nd">
                            <label for="thunhap" style="font-size: 40px"> 123 </label>
                            <p>Thu Nhập</p>
                        </div>
                    </div>
                    <div class="row2 row">
                        <a href=""><i
                                class="fa fa-caret-right"></i> Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@endpush
@endsection
