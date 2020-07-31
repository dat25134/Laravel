<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 150%; font-weight:bold">
                HOME
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item navbar-brand dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('dashboard.index')}}" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li>
                        <div class="dropdown navbar-brand" id="loadagain">
                            <a href="{{route('showcart')}}">
                                <button class="btn dropdown">
                                    <div class="p-2 bd-highlight btn btn-primary" style="display:relative">Giỏ hàng <i
                                            class="fa fa-shopping-cart btn btn-primary rounded-circle"
                                            aria-hidden="true"></i>
                                        <span id="cart" class="font-weight-bold"
                                            style="background: red; width:15px;height:15px; border-radius:50%;display:absolute; top:0;right:0">{{count($data)}}</span>
                                    </div>
                                </button>
                            </a>

                            <div style="max-height:500px; overflow-y: scroll" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @if (count($data)>0)
                                @foreach ($data as $item)
                                <div class="dropdown-item">
                                    <div class="card mb-3" style="width: 300px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="{{$item[0]->image}}" class="card-img"
                                                    alt="{{$item[0]->name}}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$item[0]->name}}</h5>
                                                    <p class="card-text">SL : <input type="number" id="{{$item[0]->id}}"
                                                            name="sl" onchange='updateSL({{$item[0]->id}},this)'
                                                            value="{{$item[1]}}" style="width: 50px" min='1'></p>
                                                    <p class="card-text"><small class="text-muted">Thành tiền :
                                                            {{number_format($item[1]*$item[0]->price)." VNĐ"}}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="dropdown-item">
                                    <p class="text-info">Hiện không có sản phẩm</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script>
    $('.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
