@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">Churches</h4>
@stop
@section('title')
    @stop

@section('content')
    @foreach ($search as $result)
        {{ $result->church }}
    @endforeach
    {{ $result->links() }}
    @stop