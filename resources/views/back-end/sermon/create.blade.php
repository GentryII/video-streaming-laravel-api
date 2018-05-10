@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">Sermons</h4>
    @stop
@section('title')

    <!--Notification -->
    @if(Session::has('success_message'))
        <div class="alert alert-success {{Session::has('success_message_important') ? 'alert-important' : ''}}" style="width: 40%;
         height: 100%; float: right; font-size: 30px">
            <i class="fa fa-check" style="font-size: 30px"></i>
            @if(Session::has('success_message_important'))
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{Session::get('success_message')}}
        </div>
    @endif
            <!--Notification -->

        <!--deletion notification-->
        @if(Session::has('deletion_message'))
            <div class="alert alert-danger {{Session::has('success_message_important') ? 'alert-important' : ''}}" style="width: 30%;
         height: 100%; float: right; font-size: 30px">
                <i class="fa fa-close" style="font-size: 30px"></i>
                @if(Session::has('deletion_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif
                {{Session::get('deletion_message')}}
            </div>
            @endif
                    <!--deletion notification-->

            <!--update notification-->
            @if(Session::has('update_message'))
                <div class="alert alert-success {{Session::has('success_message_important') ? 'alert-important' : ''}}" style="width: 40%;
         height: 100%; float: right; font-size: 30px">
                    <i class="fa fa-check" style="font-size: 30px"></i>
                    @if(Session::has('deletion_message_important'))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @endif
                    {{Session::get('update_message')}}
                </div>
                @endif
                        <!--update notification-->

    <h3><i class="fa fa-book" style="font-size: 30px;"></i> Sermons <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add New</button></h3>
    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #35475e">
                    <h3 class="modal-title" style="color: #ffffff">New Sermon</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        {{Form::label('title', 'Sermon Title')}}
                        {{Form::text('title', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('album', 'Bible Verse for the Sermon')}}
                        {{Form::text('album', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('artist', 'Preacher')}}
                        {{Form::text('artist', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('genre', 'Sermon Category')}}
                        {{Form::select('genre', ['sunday' => 'Sunday', 'monday' => 'Monday', 'tuesday' => 'Tuesday',
                        'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday', 'saturday' => 'Saturday', ])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('source', 'Sermon Audio File')}}
                        {{Form::file('source', array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="image" value="http://10.0.3.2/QuickSermon-local/public/img/picc.jpg" />
                    </div>
                    <div class="form-group">
                        {{Form::label('trackNumber', 'Sermon Number')}}
                        {{Form::text('trackNumber', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('totalTrackCount', 'Sermon Total Count')}}
                        {{Form::text('totalTrackCount', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('duration', 'Sermon Duration')}}
                        {{Form::text('duration', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('site', 'Sermon Repository')}}
                        {{Form::text('site', null, array('class' => 'form-control'))}}
                    </div>
                    <!--<textarea id="editor1" name="description"></textarea>-->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @stop
        @section('content')
            <div class="row">
                <div class="col-md-12" style="margin-left: 20px; margin-top: 20px">
                    <datalist id="entries">
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                        <option>30</option>
                        <option>All</option>
                    </datalist>
                    @if($errors->any())
                        <ul class="alert alert-danger" style="width: 97%">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    {!! Form::open(['url' => 'search', 'method' => 'post']) !!}
                    <input type="text" style="margin-left: 850px; width: 15%" placeholder="Search" name="searchItem"/>
                    <button type="submit" class="btn btn-primary"></button>
                    {!! Form::close() !!}
                </div>
            </div>

        <div class="cobtainer-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-left: 20px">
                    <form method="post" id="actions" class="delete">
                        <script type="text/javascript">
                            function submitForm(action) {
                                var form = document.getElementById('actions');
                                form.action = action;
                                form.submit();
                            }
                        </script>

                        <table class="table" style="margin-top: 30px; width: 90%; margin-left: 20px">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sermons as $sermon)
                                <tr style="width: 100px">
                                    <td>{{$sermon -> title}}</td>
                                    <td>{{$sermon -> artist}}</td>
                                    <td>{{$sermon -> genre}}</td>
                                    <td><div style="float: right;">
                                            <button type="button" class="btn btn-warning" onclick="submitForm('{{route('view', $sermon->id)}}')"><i class="fa fa-eye"></i>View</button>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="submitForm('{{route('edit', $sermon->id)}}')"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="submitForm('{{route('delete', $sermon->id)}}')"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                    @empty
                                        <h2>Record Empty</h2>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                        {{ $sermons->links() }}

                    </div>
                </div>
            </div>
        </div>
@stop