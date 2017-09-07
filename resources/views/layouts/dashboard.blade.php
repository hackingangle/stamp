<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/v4.css') }}" rel="stylesheet">

    <!-- Custom header -->
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet">
    @yield('header')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href=" {{ route('dashboard.index') }}">后台管理 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">网站首页</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <!-- Authentication Links -->
                @guest
                    <a href="{{ route('login') }}">登录</a>
                @else
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        安全退出[管理员:{{ Auth::user()->name }}]
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ $data['nav'] === 'index'?'active':'' }}"
                           href="{{ route('dashboard.index') }}">引导</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $data['nav'] === 'settings'?'active':'' }}"
                           href="{{ route('dashboard.settings') }}">网站设置</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $data['nav'] === 'company'?'active':'' }}"
                           href="{{ route('dashboard.company') }}">公司信息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $data['nav'] === 'flow'?'active':'' }}"
                           href="{{ route('dashboard.flow') }}">刻章流程</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $data['nav'] === 'contact'?'active':'' }}"
                           href="{{ route('dashboard.contact') }}">联系我们</a>
                    </li>
                </ul>
            </nav>
            @yield('content')
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('footer')
</body>
</html>
