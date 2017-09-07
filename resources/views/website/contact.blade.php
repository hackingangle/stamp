@extends('layouts.website')

@section('content')
    <div id="right_title">
        <div id="title_left">联系我们</div>
        <div id="title_right">当前位置：<a  href="/">站点首页</a>  >联系我们</div>
    </div>
    <div id="right_content">
        <div id="newsContent">
            <p>
                {!! str_replace("\n", '<br/>', $data['contact']['description']) !!}
            </p>
        </div>
    </div>
@endsection
