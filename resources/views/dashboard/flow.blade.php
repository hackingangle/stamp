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
        <form method="post" action="/flow{{ !empty($data['flow'])?'/'. $data['flow']['id']:'' }}">
            {{ csrf_field() }}
            @if (!empty($data['flow']))
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">流程内容</label>
                <div class="col-sm-10">
                    <textarea name="description" rows="25" class="form-control" id="description" placeholder="刻章流程介绍">{{ $data['flow']['description'] }}</textarea>
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
