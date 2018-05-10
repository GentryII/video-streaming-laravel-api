@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">View-Churches</h4>
@stop
@section('title')
    <h3><i class="fa fa-book" style="font-size: 30px; margin-right: 10px"> View Churches </i><a href="{{route('create')}}"><button type="button" data-toggle="modal" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button></a></h3>
@stop
@section('content')
    <form style="margin-left: 100px; margin-right: 100px;">
        <div class="form-group">
            <label style="margin-top: 30px">Church Name</label>
            <input type="text" class="form-control" value="{{$church -> church}}">
        </div>
        <div class="form-group">
            <label>Sermon Bible Verse</label>
            <input type="text" class="form-control" value="{{$church -> location}}">
        </div>
        <div class="form-group">
            <label style="margin-top: 30px">Church Logo</label>
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{$church->logo}}" alt="logo" style="width: 100%; height: 50%">
            </div>
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" class="form-control" value="{{$church -> route}}">
        </div>
    </form>
@stop