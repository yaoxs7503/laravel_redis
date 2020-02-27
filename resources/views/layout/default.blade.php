<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">首页</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">测试页面 <span class="sr-only">(current)</span></a>
            </li>
           <li class="nav-item active">
                <a class="nav-link" href="{{route('user.index')}}">用户列表<span class="sr-only">(current)</span></a>
            </li>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            @auth
            <a href="{{route('user.edit',auth()->user())}}" class="btn btn-info my-2 my-sm-0 mr-2">修改</a>
            <a href="{{route('logout')}}" class="btn btn-danger my-2 my-sm-0 mr-2">退出</a>
            @else
            <a href={{route('login')}} class="btn btn-success my-2 my-sm-0" >登录</a>
            <a  href="{{route('user.create')}}" class="btn btn-danger my-2 my-sm-0 mr-2"  >注册</a>
            @endauth
        </form>
    </div>
</nav>
@include('layout.errors')
@include('layout.message')
@yield('content')
</div>
</body>
</html>
<script src="/js/app.js"></script>

