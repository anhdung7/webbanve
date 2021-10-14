<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rạp phim STAR') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="nav-header">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <!-- <div class="navbar-menu">
                    <div class="menu">
                        <button><img src="../css/images/menu.png" alt=""></button>
                        <ul>
                            <li><a href="/timphim?tenphimtim=">Danh sách phim</a></li>
                            <li><a href="/tuyendung">Tuyển dụng</a></li>
                            <li><a href="/hethongrap">Hệ thống rạp</a></li>
                            <li><a href="/huongdandatve">Hướng dẫn đặt vé</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="navbar-menu">
                </div>
                <div class="new-nav">
                    <label for="btn" class="button"><img src="../css/images/menu.png" alt=""></label>
                    <input type="checkbox" id="btn">
                    <ul class="new-menu">
                        <li><a href="/timphim?tenphimtim=">Danh sách phim</a></li>
                        <li><a href="/tuyendung">Tuyển dụng</a></li>
                        <li><a href="/hethongrap">Hệ thống rạp</a></li>
                        <li><a href="/huongdandatve">Hướng dẫn đặt vé</a></li>
                    </ul>
                </div>
                <a class="navbar-brand" href="/timphim?tenphimtim=">
                    <button>ĐẶT VÉ</button>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav centermenu ">
                        <a href="{{ url('/') }}">
                            <img src="../css/images/bluestar.png" alt="" class="img">
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng kí') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <?php if(isset($_SESSION['giohang'])) {?>
                                <a class="nav-link" href="/giohang">Giỏ hàng 
                                    <?php echo count($_SESSION['giohang']);?>
                                </a>
                                <?php }?>
                            </li>
                            &emsp;
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="/thongtin">
                                        {{ __('Quản lý tài khoản') }}
                                    </a>
                                    <a class="dropdown-item" href="/dsdoidiem">
                                        {{ __('Điểm thưởng') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
</body>
</html>
