@extends('layouts.dashboard')

@section('header')
    <link href="{{ asset('css/dashboard/jquery/Huploadify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/settings.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                <label for="title" class="col-sm-2 col-form-label">名称</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="{{ $data['settings']['title'] }}" class="form-control" id="title" placeholder="用来显示在浏览器标签中">
                </div>
            </div>
            <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">logo</label>
                <div class="col-sm-10">
                    <div id="uploadLogo"></div>
                    <img class="dashboardLogo" src="{{ $data['settings']['logo'] }}" alt="" id="logoDisplay">
                    <input type="hidden" name="logo" value="{{ $data['settings']['logo'] }}" class="form-control" id="logo"
                           placeholder="网站顶部图，显示logo和部分广告">
                </div>
            </div>
            <div class="form-group row">
                <label for="keywords" class="col-sm-2 col-form-label">SEO关键词</label>
                <div class="col-sm-10">
                    <input type="text" name="keywords" value="{{ $data['settings']['keywords'] }}" class="form-control" id="keywords"
                           placeholder="SEO关键词，被搜索引擎收录，用来理解网站的功能">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">SEO描述</label>
                <div class="col-sm-10">
                    <input type="text" name="description" value="{{ $data['settings']['description'] }}" class="form-control" id="description"
                           placeholder="SEO描述，被搜索引擎收录，用来理解网站的功能">
                </div>
            </div>
            <div class="form-group row">
                <label for="banner" class="col-sm-2 col-form-label">广告图</label>
                <div class="col-sm-10">
                    <div id="uploadBanner"></div>
                    <img class="dashboardBanner" src="{{ $data['settings']['banner'] }}" alt="" id="bannerDisplay">
                    <input type="hidden" name="banner" value="{{ $data['settings']['banner'] }}" class="form-control" id="banner"
                           placeholder="网站中部-广告图">
                </div>
            </div>
            <div class="form-group row">
                <label for="copyright" class="col-sm-2 col-form-label">版权信息</label>
                <div class="col-sm-10">
                    <input type="text" name="copyright" value="{{ $data['settings']['copyright'] }}" class="form-control" id="copyright"
                           placeholder="网站底部-版权信息">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">联系电话</label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" value="{{ $data['settings']['mobile'] }}" class="form-control" id="mobile"
                           placeholder="网站底部-联系电话">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">地址</label>
                <div class="col-sm-10">
                    <input type="text" name="address" value="{{ $data['settings']['address'] }}" class="form-control" id="address"
                           placeholder="网站底部-地址">
                </div>
            </div>
            <div class="form-group row">
                <label for="icp" class="col-sm-2 col-form-label">备案号</label>
                <div class="col-sm-10">
                    <input type="text" name="icp" value="{{ $data['settings']['icp'] }}" class="form-control" id="icp"
                           placeholder="网站底部-备案信息">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="applyBtn">应用</button>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('footer')
    <script src="{{ asset('js/dashboard/jquery/Huploadify.js') }}"></script>
    <script src="{{ asset('js/dashboard/settings.js') }}"></script>
@endsection
