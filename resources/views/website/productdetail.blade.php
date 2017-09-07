@extends('layouts.website')

@section('content')

    <div id="right_title">
        <div id="title_left">产品细节</div>
        <div id="title_right">当前位置：<a  href="/">站点首页</a> >产品中心>产品细节</div>
    </div>
    <div id="right_content">
        <h2 id="newTitle"><strong>{{ $data['product']['description'] }}</strong></h2>
        <img width="600px" src="{{ $data['product']['image'] }}" alt="{{ $data['product']['description'] }}">
    </div>
    <div id="right_bottom"></div>
@endsection
