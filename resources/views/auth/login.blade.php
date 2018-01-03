@extends('layouts.app')

@section('content')
    <div class="detail">
        <div class="am-g am-container">
            <div class="am-u-lg-12">
                <h1 class="detail-h1">Login</h1>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

            <div class="am-btn-group">
                <a href="/auth/qq" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-qq am-icon-sm"></i> QQ</a>
                <a href="#" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-weibo am-icon-sm"></i> Weibo</a>
                <a href="#" class="am-btn am-btn-default am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
            </div>
            <br>
            <br>

            <form method="post" class="am-form" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('username') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="username">用户名: </label>
                    <input type="text" id="username" name="username" class="am-form-field" placeholder="输入你的用户名" value="{{old('username')}}">

                    @if ($errors->has('username'))
                        <span class="am-icon-warning">{{$errors->first('username')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('password') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="password">密码: </label>
                    <input type="password" name="password" id="password" class="am-form-field" placeholder="输入你的密码">

                    @if ($errors->has('password'))
                        <span class="am-icon-warning">{{$errors->first('password')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('captcha') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="captcha">验证码: </label>

                    <div class="am-g doc-am-g">
                        <div class="am-u-sm-9">
                            <input type="text" name="captcha" id="captcha" class="am-form-field" placeholder="输入你的验证码">

                            @if ($errors->has('captcha'))
                                <span class="am-icon-warning">{{$errors->first('captcha')}}</span>
                            @endif
                        </div>
                        <div class="am-u-sm-3">
                            <img src="{{captcha_src()}}" alt="" style="cursor: pointer;" onclick="this.src='{{captcha_src()}}'+ Math.random();">
                        </div>
                    </div>
                </div>

                <label for="remember-me">
                    <input id="remember-me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    记住密码
                </label>
                <br>

                <hr>
                <div class="am-cf">
                    <input type="submit" name="" value="Login" class="am-btn am-btn-secondary am-btn-sm am-fl">
                    <a href="{{ route('password.request') }}" class="am-btn am-btn-default am-btn-sm am-fr">Forget
                        Password ^_^?</a>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection