@extends('layouts.dashboard')

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
        <form method="post" action="/company{{ !empty($data['company'])?'/'. $data['company']['id']:'' }}">
            {{ csrf_field() }}
            @if (!empty($data['company']))
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">公司介绍</label>
                <div class="col-sm-10">
                    <textarea name="description" rows="25" class="form-control" id="description" placeholder="公司介绍页面展示的内容">{{ $data['company']['description'] }}</textarea>
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
