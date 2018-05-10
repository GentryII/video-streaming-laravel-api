@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">View</h4>
@stop
@section('title')
    <h3><i class="fa fa-book" style="font-size: 30px; margin-right: 10px"> View Sermons </i><a href="{{route('create')}}"><button type="button" data-toggle="modal" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button></a></h3>
    @stop
@section('content')
    <form style="margin-left: 100px; margin-right: 100px;">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h3 style="margin-top: 30px; color: #2aabd2; display: inline-block; margin-right: 160px"><b>Sermon Title</b></h3>
                    <p style="display: inline-block; font-size: 26px">{{$sermon -> title}}</p>
                </div>
                <div class="form-group">
                    <h3 style="color: #2aabd2; display: inline-block; margin-right: 90px"><b>Sermon Bible Verse</b></h3>
                    <p style="display: inline-block;font-size: 26px">{{$sermon -> album}}</p>
                </div>
                <div class="form-group">
                    <h3 style="color: #2aabd2; display: inline-block; margin-right: 210px"><b>Preacher</b></h3>
                    <p style="display: inline-block;font-size: 26px">{{$sermon -> artist}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h2 style="color: #2aabd2; display: inline-block; margin-right: 100px"><b>Category</b></h2>
                    <p style="display: inline-block;font-size: 26px">{{$sermon -> genre}}</p>
                </div>
                <div class="form-group">
                    <!--<label style="margin-top: 30px"><h2>Picture</h2></label>-->
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{$sermon->image}}" alt="logo">
                    </div>
                </div>
                <div class="form-group">
                    <h3 style="color: #2aabd2; display: inline-block; margin-right: 100px"><b>Audio Clip</b></h3>
                    <audio controls>
                        <source src= "{{$sermon -> source}}" style="display: inline-block">
                    </audio>
                </div>
                <!--<h3 style="display: inline-block">Title</h3>->
                <!--<a href="/QuickSermon/public/audios/" style="display: inline-block"><h3></h3></a>-->


                <!-- <textarea id="editor1" name="description"></textarea>-->
            </div>
        </div>
    </form>
    @stop