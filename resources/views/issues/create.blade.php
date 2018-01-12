@extends('layouts.app')

@section('content')
    <div class="am-container">
        <div class="header">
            <div class="am-g">
                <h1>添加新活动</h1>
            </div>
            <hr>
        </div>

        {!! Form::open(['route' => 'issues.store', 'class' => 'am-form']) !!}
        @include('issues._form')
        {!! Form::close() !!}
    </div>
@endsection