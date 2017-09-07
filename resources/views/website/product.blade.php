@extends('layouts.website')

@section('content')
        <div id="right_title">
            <div id="title_left">产品中心</div>
            <div id="title_right">当前位置：<a  href="/">站点首页</a> >产品中心</div>
        </div>
        <div id="right_content">
            <ul id="picUL">
                @foreach ($data['products'] as $product)
                <li>
                    <a href="/website/productdetail/{{ $product->id }}">
                        <img src="{{ $product->image }}" width="161" height="151" alt="{{ $product->description }}">
                        <br>
                        {{ $product->description }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="right_bottom"></div>
@endsection
