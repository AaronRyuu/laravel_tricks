@extends('layouts.app')

@section('content')
    <div class="detail">
        <div class="am-g am-container">
            <div class="am-u-lg-12">
                <h1 class="detail-h1">Sign Up</h1>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

            <form method="post" class="am-form" action="{{ route('register') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('name') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="name">昵称: </label>
                    <input type="text" id="name" class="am-form-field" placeholder="输入你的昵称" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="am-icon-warning">{{$errors->first('name')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('username') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="username">用户名: </label>
                    <input type="text" id="username" class="am-form-field" placeholder="输入你的用户名" name="username" value="{{ old('username') }}">

                    @if ($errors->has('username'))
                        <span class="am-icon-warning">{{$errors->first('username')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-file">
                    <label class="am-form-label" for="avatar">头像: </label>
                    <br>

                    <button type="button" class="am-btn am-btn-success am-btn-sm">
                        <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                    </button>

                    <input type="file" id="photo_upload" name="file">
                    <input type="hidden" name="avatar" value="{{old('avatar')}}">

                    <hr data-am-widget="divider" class="am-divider am-divider-dashed am-no-layout">
                    <div>
                        <img src="{{ old('avatar', 'https://images.itfun.tv/school/images/common/user_noimg.png') }}" id="photo_show" style="max-height: 200px;">
                    </div>
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('email') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="email">邮箱: </label>
                    <input type="text" id="email" name="email" class="am-form-field" placeholder="输入你的邮箱"  value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="am-icon-warning">{{$errors->first('email')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback {{ $errors->has('password') ? ' am-form-error' : '' }}">
                    <label class="am-form-label" for="password">密码: </label>
                    <input type="password" name="password" id="password" class="am-form-field" placeholder="输入你的密码">
                    @if ($errors->has('password'))
                        <span class="am-icon-warning">{{$errors->first('password')}}</span>
                    @endif
                </div>

                <div class="am-form-group am-form-icon am-form-feedback">
                    <label class="am-form-label" for="password_confirmation">重复密码: </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="am-form-field"
                           placeholder="请重新输入你的密码">
                </div>

                <hr>
                <div class="am-cf">
                    <input type="submit" value="Sign Up" class="am-btn am-btn-primary am-btn-sm am-fl">
                    <a href="{{ route('login') }}" class="am-btn am-btn-default am-btn-sm am-fr">Already Has Account ^_^?</a>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/js/jquery.html5-fileupload.js"></script>
    <script src="/assets/js/upload.js"></script>
@endsection
