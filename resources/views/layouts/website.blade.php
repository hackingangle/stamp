<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- 网站设置 -->
    <title>{{ $data['settings']['title'] }}</title>
    <meta name="keywords" content="{{ $data['settings']['keywords'] }}" />
    <meta name="description" content="{{ $data['settings']['description'] }}" />

    <!-- Styles -->
    <link href="{{ asset('css/website/frame.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/bg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/website/index.css') }}" rel="stylesheet">

    <!-- jquery fancy -->
    <link href="{{ asset('css/website/jquery/fancy.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>
<!-- header -->
<div id="header_01">
    <div id="header_logo">
        <img src="{{ $data['settings']['logo'] }}" width="1000" height="100" alt="{{ $data['settings']['title']. '-logo' }}"  />
    </div>
</div>
<div id="header_menu">
    <div id="menu">
        <ul>
            <li><a href="/" title="网站首页">网站首页</a>
            </li><li><a href="/article/index/category/company.html" title="公司简介">公司简介</a>
            </li><li><a href="/article/index/category/news.html" title="新闻中心">新闻中心</a>
            </li><li><a href="/article/index/category/Products.html" title="产品中心">产品中心</a>
            </li><li><a href="/article/index/category/case.html" title="案例展示">案例展示</a>
            </li><li><a href="/article/index/category/kzlc.html" title="刻章流程">刻章流程</a>
            </li><li><a href="/article/index/category/honor.html" title="荣誉资质">荣誉资质</a>
            </li><li><a href="/article/index/category/Contactus.html" title="联系我们">联系我们</a>
            </li>          </ul>
    </div>
</div>

<!-- banner -->
<div id="header_flash"> <img src="{{ $data['settings']['banner'] }}" width="1000" height="350"> </div>


<!-- body -->
@yield('content')

<!-- footer -->
<div id="footer">版权所有：{{ $data['settings']['copyright'] }}<br>
    电话：{{ $data['settings']['mobile'] }}&nbsp;&nbsp;&nbsp;地址：{{ $data['settings']['address'] }}
    {{ $data['settings']['address'] }}</div>

<!-- import js -->
<script src="{{ asset('js/website/import/scroll.js') }}"></script>
<script src="{{ asset('js/website/jquery/fancy.js') }}"></script>
<script src="{{ asset('js/website/import/menu.js') }}"></script>
</body>
</html>
