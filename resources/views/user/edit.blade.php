@extends('layout.default')
@section('content')
<form action="{{route('user.update',$user)}}" method="post">
    @csrf
    @method('PUT')
<div class="card">
    <div class="card-header">
        修改资料
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="my-input">呢称</label>
            <input id="my-input" class="form-control" type="text" name="name" value="{{$user['name']}}" >
        </div>
    <div class="form-group">
            <label for="my-input">密码</label>
            <input id="my-input" class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
            <label for="my-input">确认密码</label>
            <input id="my-input" class="form-control" type="password" name="password_confirmation" >
    </div>
    <div class="card-footer text-muted">
        <button type="submit" class="btn btn-success">确认修改</button>
    </div>
</div>
</form>
@endsection
