@extends('layouts.website')

@section('content')
    <div id="in_alzs">
        <div id="in_alzs_title">优质章展台<a href="{{ route('website.product') }}"  class="more2">更多&gt;&gt;</a></div>
        <div id="in_alzs_content">
            <ul>
                @foreach ($data['products'] as $product)
                <li>
                    <a href="/website/productdetail/{{ $product->id }}">
                        <img src="{{ $product->image }}" width="168px" height="158px">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
@section('content_down')
    {{--<div style=" clear:both;"></div>--}}
    {{--<div id="in_cpzs">--}}
        {{--<div id="in_cpzs_title1">优质章展台<a href="/article/index/category/Products.html" class="more2">更多&gt;&gt;</a></div>--}}
        {{--<div id="in_cpzs_content1">--}}
            {{--<ul>--}}
                {{--<li><a href="/article/detail/id/243.html"><img src="/Uploads/Picture/2017-06-09/593a0c0d38da2.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/242.html"><img src="/Uploads/Picture/2017-06-09/593a0ad001ab2.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/241.html"><img src="/Uploads/Picture/2017-06-09/593a09d5106f0.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/229.html"><img src="/Uploads/Picture/2017-06-08/5939047ece88d.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/228.html"><img src="/Uploads/Picture/2017-06-09/593a0d01440ea.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/227.html"><img src="/Uploads/Picture/2017-06-09/593a0d5ae2fc3.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/225.html"><img src="/Uploads/Picture/2017-06-08/593905833007a.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/224.html"><img src="/Uploads/Picture/2017-06-08/593905718c078.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/222.html"><img src="/Uploads/Picture/2017-06-09/593a0e59e8796.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/220.html"><img src="/Uploads/Picture/2017-06-08/593904350458f.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/197.html"><img src="/Uploads/Picture/2017-03-21/58d0d8e7b20f1.jpg" width="168px" height="158px"></a></li><li><a href="/article/detail/id/196.html"><img src="/Uploads/Picture/2017-03-21/58d0d8d74e012.jpg" width="168px" height="158px"></a></li>      </ul>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

