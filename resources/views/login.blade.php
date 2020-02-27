@extends('layout.default')
@section('content')
<form action="{{route('login')}}" method="post">
    {{ csrf_field() }}
<div class="card">
    <div class="card-header">
        用户登录
    </div>
    <div class="card-body">
            <div class="form-group">
            <label for="my-input">邮箱</label>
    <input id="my-input" class="form-control" type="text" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
            <label for="my-input">密码</label>
            <input id="my-input" class="form-control" type="password" name="password">
    </div>

    <div class="card-footer text-muted">
        <button type="submit" class="btn btn-success">登录</button>
    </div>
</div>
</form>
@endsection
