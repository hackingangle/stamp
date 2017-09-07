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
            <li>
                <a {{ $data['nav'] === 'index'?'style=color:#ffd600':'' }} href="{{ route('website.index') }}" title="网站首页">网站首页</a>
            </li>
            <li>
                <a {{ $data['nav'] === 'company'?'style=color:#ffd600':'' }} href="{{ route('website.company') }}" title="公司简介">公司简介</a>
            </li>
            <li>
                <a {{ $data['nav'] === 'flow'?'style=color:#ffd600':'' }} href="{{ route('website.flow') }}" title="刻章流程">刻章流程</a>
            </li>
            <li>
                <a {{ $data['nav'] === 'contact'?'style=color:#ffd600':'' }} href="{{ route('website.contact') }}" title="contact">联系我们</a>
            </li>
            <li>
                <a {{ $data['nav'] === 'flow'?'style=color:#ffd600':'' }} href="{{ route('website.product') }}" title="产品中心">产品中心</a>
            </li>
        </ul>
    </div>
</div>

<!-- banner -->
<div id="header_flash"> <img src="{{ $data['settings']['banner'] }}" width="1000" height="350"> </div>


<!-- body -->
@yield('wrap_content')
<div id="wrap">
    {{--<div id="in_cpzs_title1">产品分类</div>--}}
    {{--<div id="left_kzlb1">--}}
        {{--<ul>--}}
            {{--<li><a href="/article/index/category/guangzu.html">公章</a></li><li><a href="/article/index/category/guangyin.html">财务章</a></li><li><a href="/article/index/category/one.html">发票章</a></li><li><a href="/article/index/category/two.html">人名章</a></li><li><a href="/article/index/category/three.html">钢印</a></li><li><a href="/article/index/category/five.html">光敏章</a></li>    </ul>--}}
    {{--</div>--}}
    <div id="left">
        <div id="left_zszx">
            <div id="left_zszx_title"><a href="{{ route('website.product') }}" class="more">更多&gt;&gt;</a></div>
            <div id="left_zszx_content">
                <div id="in_gd">
                    <div class="in_gd marquee level" id="pro1" direction="up" speed="30" step="0" pause="0">
                        <ul>
                            @foreach ($data['topProducts'] as $product)
                            <li>
                                <a href="/website/productdetail/{{ $product->id }}"><img src="{{ $product->image }}" height="130px" width="170px"><br>{{ $product->description }}</a>
                            </li>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="index_right">
        @yield('content')
    </div>
    @yield('content_down')
    <div style="clear: both;"></div>
</div>

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
