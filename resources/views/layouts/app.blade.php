<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Laravel Meetup</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/vendor/amazeui/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/common.css">
</head>

<body>
<header class="am-topbar am-topbar-fixed-top">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="/">Meetup</a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
                    class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li><a href="{{route('issues.index')}}">活动</a></li>
                <li><a href="/about">关于</a></li>
            </ul>

            @if (Auth::guest())
                <div class="am-topbar-right">
                    <a href="{{route('login')}}" class="am-btn am-btn-secondary am-topbar-btn am-btn-sm">
                        <span class="am-icon-user"></span> Login
                    </a>
                </div>
                <div class="am-topbar-right">
                    <a href="{{route('register')}}" class="am-btn am-btn-primary am-topbar-btn am-btn-sm">
                        <span class="am-icon-pencil"></span> Sign Up
                    </a>
                </div>
            @else
                <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
                    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                        <li class="am-dropdown" data-am-dropdown>
                            <a class="am-btn-secondary am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                <span class="am-icon-user"></span> {{Auth::user()->name}}
                                <span class="am-icon-caret-down"></span>
                            </a>
                            <ul class="am-dropdown-content">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="am-icon-power-off"></span> 退出
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif

        </div>
    </div>
</header>

@include('shared._flash')

@yield('content')

<footer class="footer">
    <p class="am-padding-left">Copyright © 2017. Made With <i class="am-icon am-icon-heart"></i> By Aaron. All Rights
        Reserved.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/assets/vendor/amazeui/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/assets/vendor/amazeui/js/amazeui.min.js"></script>
<script src="/assets/js/laravel.js"></script>
<script src="/assets/js/common.js"></script>

@yield('scripts')
</body>
</html>
