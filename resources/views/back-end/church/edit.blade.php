@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">Edit Church</h4>
@stop
@section('title')
    <h3><i class="fa fa-pencil-square-o" style="font-size: 30px; margin-right: 10px"> Edit Sermons </i><a href="{{route('create-church')}}"><button type="button" data-toggle="modal" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button></a></h3>
@stop
@section('content')
        {!! Form::open(['action' => ['ChurchesController@update', $church->id], 'method' => 'PATCH', 'files' => true, 'style' => 'margin-left: 100px; margin-right: 100px;']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label style="margin-top: 30px">New Church Name</label>
            <input type="text" class="form-control" value="{{$church -> church}}" name="church">
        </div>
        <div class="form-group">
            <label>New Church Location</label>
            <input type="text" class="form-control" value="{{$church -> location}}" name="location">
        </div>
        <div class="form-group">
            <label>New Logo</label>
            <input type="file" class="form-control" name="logo"/>
        </div>
        <div class="form-group">
            <label>New Church Route</label>
            <input type="text" class="form-control" value="{{$church -> route}}" name="route">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Save Changes</button>
        {!! Form::close() !!}
    @stop