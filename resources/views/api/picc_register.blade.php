@extends('back-end.admin')
@section('content')
    {!! Form::open(['url' => 'apistore', 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {{Form::label('name', 'Your Full Name(s)')}}
        {{Form::text('name', null, array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email address')}}
        {{Form::email('email', null, array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password')}}
        {{Form::password('audio', array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('password2', 'Comfirm Password')}}
        {{Form::text('password2', null, array('class' => 'form-control'))}}
    </div>

    {{Form::submit('Save', array('class' => 'btn btn-default'))}}
    {!! Form::close() !!}
@stop