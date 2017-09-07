@extends('layouts.dashboard')

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            @if ($data['from'] === 'add')
                <div class="alert alert-success" role="alert">
                    创建成功
                </div>
            @endif
            @if ($data['from'] === 'update')
                <div class="alert alert-success" role="alert">
                    更新成功
                </div>
            @endif
        <form method="post" action="/settings{{ !empty($data['settings'])?'/'. $data['settings']['id']:'' }}">
            {{ csrf_field() }}
            @if (!empty($data['settings']))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ $data['settings']['name'] }}" class="form-control" id="name" placeholder="用来显示在浏览器标签中">
                </div>
            </div>
            <div class="form-group row">
                <label for="desc" class="col-sm-2 col-form-label">描述（SEO）</label>
                <div class="col-sm-10">
                    <input type="text" name="desc" value="{{ $data['settings']['desc'] }}" class="form-control" id="desc"
                           placeholder="SEO重要信息，被搜索引擎收录，用来理解网站的功能">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">应用</button>
                </div>
            </div>
        </form>
    </main>
@endsection
