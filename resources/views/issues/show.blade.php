@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="/assets/vendor/atwho/jquery.atwho.min.css">
    <link rel="stylesheet" href="/assets/vendor/highlight/default.min.css">
    <style>
        .am-comment-bd h2 {
            margin-top: 0;
            border-bottom: 1px solid #e6e8ec;
        }

        .am-comment-bd .hljs {
            background: none;
        }

        .am-comment-bd pre {
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')

    <div class="issue-heading">
        <div class="am-container">
            {{$issue->title}}

            @if (Auth::check() && Auth::user() == $issue->user )
                <a href="{{route('issues.destroy', $issue->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" type="button" class="am-btn am-btn-danger am-radius am-btn-sm">Destroy</a>
                {!! link_to_route('issues.edit', 'Edit', $issue->id, ['class'=>'am-btn am-btn-primary am-radius am-btn-sm']) !!}
            @endif
        </div>
    </div>

    <div class="am-container">
        <ul class="am-comments-list am-comments-list-flip">

            <li class="am-comment">
                <img src="{{$issue->user->avatar()}}" alt="" class="am-comment-avatar" width="100" height="100">
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta">
                            <span class="am-comment-author">{{$issue->user->name}}</span>
                        </div>
                    </header>
                    <div class="am-comment-bd"><p>{!! markdown($issue->content) !!}</p></div>
                </div>
            </li>

            @foreach($comments as $comment)
                @include('shared._comment')
            @endforeach
        </ul>

        @if (Auth::check())

            {!! Form::open(['route' => 'comments.store', 'class' => 'am-form']) !!}
            {!! Form::hidden('issue_id', $issue->id) !!}
            {!! Form::hidden('user_id', Auth::id()) !!}
            <fieldset>
                <div class="am-form-group">
                    {{ Form::textarea('content', null,  ['rows' => '5', 'placeholder' => '填写评论内容，支持markdown。']) }}
                </div>

                <p>
                    {{ Form::submit('提交', ['class' => 'am-btn am-btn-default', 'id'=>'store-comment']) }}
                </p>
            </fieldset>
            {!! Form::close() !!}

        @else
            <p>
                <a href="{{route('login')}}" class="am-btn am-btn-secondary am-btn-block">
                    <span class="am-icon-user"></span> 登录后发评论
                </a>
            </p>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="/assets/vendor/highlight/highlight.min.js"></script>
    <script src="/assets/vendor/atwho/jquery.caret.min.js"></script>
    <script src="/assets/vendor/atwho/jquery.atwho.min.js"></script>
    <script src="/assets/vendor/jquery.hotkeys/jquery.jquery.hotkeys.js"></script>
    <script src="/assets/js/show.js"></script>
@endsection
