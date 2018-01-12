@extends('layouts.app')

@section('content')
    <div class="am-container">
        <div class="header">
            <div class="am-g">
                <h1>编辑活动</h1>
            </div>
            <hr>
        </div>

        {!! Form::model($issue, ['route' => ['issues.update', $issue->id], 'method' => 'put', 'class' => 'am-form']) !!}
        @include('issues._form')
        {!! Form::close() !!}
    </div>
@endsection