@extends('layouts.dashboard')

@section('header')
    <link href="{{ asset('css/dashboard/jquery/Huploadify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/product.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        @include('product.nav')
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>描述</tlh>
                <th>图片</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data['products'] as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->description }}</td>
                <td><img class="productImgInTable" src="{{ $product->image }}" alt=""></td>
                <td>
                    <a href="/product/{{ $product->id }}" class="btn">编辑</a>
                    <a href="/product/del/{{ $product->id }}" class="btn">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('footer')
    <script src="{{ asset('js/dashboard/jquery/Huploadify.js') }}"></script>
    <script src="{{ asset('js/dashboard/product.js') }}"></script>
@endsection
