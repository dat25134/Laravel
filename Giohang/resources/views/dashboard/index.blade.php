@extends('layouts.form')
@section('title', 'DASHBOARD')
@section('content')
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<div class="sidebar-container">
    <div class="sidebar-logo">
        Dashboar
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Navigation</li>
        <li>
            <a href="#">
                <i class="fa fa-home" aria-hidden="true"></i> Homepage
            </a>
        </li>
        <li class="header">Another Menu</li>
        <li>
            <a href="#">
                <i class="fa fa-users" aria-hidden="true"></i> Quản lý sản phẩm
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> ....
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-info-circle" aria-hidden="true"></i> .....
            </a>
        </li>
    </ul>
</div>
<div class="content-container">

    <div class="container-fluid">
        <div class="dashboard">
            <div class="info">
                <div class="group group1">
                    <div class="row1 row">
                        <i class="fa fa-paw fa-5x"></i>
                        <div class="nd">
                            <label for="SL"> 123 </label>
                            <p>Số lượng giống chó</p>
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
@endsection
