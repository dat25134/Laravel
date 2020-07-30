@extends('layouts.form')
@section('title', 'DASHBOARD')
@section('content')
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
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
    </div>
  </div>
@endsection
