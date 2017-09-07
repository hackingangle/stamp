@extends('layouts.dashboard')

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h1>如何使用</h1>
        <p>
            您好，{{ Auth::user()->name }}，当前登录的角色：管理员

        </p>
        <p>
            这里将告诉你如何使用后台管理，来轻松生成网站内容
        </p>
        <ol>
            <li>
                <a href="{{ route('dashboard.settings') }}">网站设置</a>
                - 设置网站标题，SEO内容，被搜索引擎收录的描述等等内容
            </li>
        </ol>
    </main>
@endsection
