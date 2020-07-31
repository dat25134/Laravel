<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<div class="sidebar-container">
    <div class="sidebar-logo">
        Dashboar
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Navigation</li>
        <li>
        <a href="{{route('dashboard.index')}}">
                <i class="fa fa-home" aria-hidden="true"></i> Homepage
            </a>
        </li>
        <li class="header">Another Menu</li>
        <li>
        <a href="{{route('dashboard.listProduct')}}">
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

