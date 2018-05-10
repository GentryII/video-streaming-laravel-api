@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">Edit</h4>
@stop
@section('title')
    <h3><i class="fa fa-pencil-square-o" style="font-size: 30px; margin-right: 10px"> Edit Sermons </i><a href="{{route('create')}}"><button type="button" data-toggle="modal" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Back</button></a></h3>
@stop
@section('content')
        {!! Form::open(['action' => ['SermonsController@update', $sermon->id], 'method' => 'PATCH', 'files' => true, 'style' => 'margin-left: 100px; margin-right: 100px;']) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h2 style="margin-top: 30px;color: #2aabd2;">New Sermon Title</h2>
                        <input type="text" class="form-control" value="{{$sermon -> title}}" name="title">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">New Sermon Bible Verse</h2>
                        <input type="text" class="form-control" value="{{$sermon -> album}}" name="album">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">New Preacher</h2>
                        <input type="text" class="form-control" value="{{$sermon -> artist}}" name="artist">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">Image</h2>
                        <input type="text" class="form-control" value="{{$sermon -> image}}" name="image">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <h2 style="color: #2aabd2;">Sermon Number</h2>
                        <input type="text" class="form-control" value="{{$sermon -> trackNumber}}" name="trackNumber">
                    </div>

                    <!--<textarea id="editor1" name="description"></textarea>-->
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 20px; width: 100%">Save Changes</button>
                </div>

                <div class="col-md-6" style="margin-top: 10px">
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">Sermon Count</h2>
                        <input type="text" class="form-control" value="{{$sermon -> totalTrackCount}}" name="totalTrackCount">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">Sermon Duration</h2>
                        <input type="text" class="form-control" value="{{$sermon -> duration}}" name="duration">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">Sermon Site</h2>
                        <input type="text" class="form-control" value="{{$sermon -> site}}" name="site">
                    </div>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">New Category</h2>
                        <select name="genre">
                            <option>{{$sermon -> genre}}</option>
                            @foreach($categories as $category)
                                <option>{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <audio controls>
                        <source src= "/QuickSermon/public/audios/{{$sermon -> source}}">
                    </audio>
                    <a href="/QuickSermon/public/audios/{{$sermon -> audio}}" style="display: inline-block"><h3>{{$sermon -> audio}}</h3></a>
                    <div class="form-group">
                        <h2 style="color: #2aabd2;">New Audio Clip</h2>
                        <input type="file" class="form-control" name="audio"/>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    @stop