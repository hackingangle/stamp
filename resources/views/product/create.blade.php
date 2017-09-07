@extends('layouts.dashboard')

@section('header')
    <link href="{{ asset('css/dashboard/jquery/Huploadify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/product.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        @include('product.nav')
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
        <form method="post" action="/product">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">产品名称</label>
                <div class="col-sm-10">
                    <input type="text" name="description" value="" class="form-control" id="description" placeholder="产品名称">
                </div>
            </div>
            <div class="form-group row">
                <label for="logo" class="col-sm-2 col-form-label">产品图片</label>
                <div class="col-sm-10">
                    <div id="productImg"></div>
                    <img class="displayProduct" src="" alt="" id="productImgDisplay">
                    <input type="hidden" name="image" value="" class="form-control" id="productImgSubmit">
                </div>
            </div>
            <div class="form-group row">
                <label for="top" class="col-sm-2 col-form-label">橱窗展示（默认否）</label>
                <div class="col-sm-10">
                    <select name="top" class="custom-select d-block my-3" required>
                        <option value="2">否</option>
                        <option value="1">是</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" id="applyBtn">新增</button>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('footer')
    <script src="{{ asset('js/dashboard/jquery/Huploadify.js') }}"></script>
    <script src="{{ asset('js/dashboard/product.js') }}"></script>
@endsection
