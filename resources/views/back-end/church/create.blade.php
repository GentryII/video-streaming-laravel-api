@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <i class="fa fa-angle-double-right" style="display: inline-block; color: #000000; font-size: 20px"></i>
    <h4 style="display: inline-block; color:#000000;">Churches</h4>
@stop
@section('title')

        <!--success notification-->
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
                <!--success notification-->

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

    <h3><i class="fa fa-home" style="font-size: 30px;"></i> Client Churches <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus-square"></i> Add New</button></h3>
    <div class="modal" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #35475e">
                    <h3 class="modal-title" style="color: #ffffff">New Client Church</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'store-church', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        {{Form::label('church', 'Church')}}
                        {{Form::text('church', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('location', 'Location(District)')}}
                        {{Form::text('location', null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('logo', 'Church Logo')}}
                        {{Form::file('logo', array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('route', 'Church Route(For Linking on the web)')}}
                        {{Form::text('route', null, array('class' => 'form-control'))}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    {!! Form::close() !!}

                </div>
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
            <input type="text" style="margin-left: 850px; width: 15%" placeholder="Search"/>
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
                            <th>Church</th>
                            <th>Location</th>
                            <th>Logo</th>
                            <th>Route(Link on the web)</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($churches as $church)
                            <tr style="width: 100px">
                                <td>{{$church -> church}}</td>
                                <td>{{$church -> location}}</td>
                                <td>{{$church -> logo}}</td>
                                <td>{{$church -> route}}</td>
                                <td><div style="float: right;">
                                        <button type="button" class="btn btn-warning" onclick="submitForm('{{route('view-church', $church->id)}}')"><i class="fa fa-eye"></i>View</button>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="submitForm('{{route('edit-church', $church->id)}}')"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="submitForm('{{route('delete-church', $church->id)}}')"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                                @empty
                                    <h2>Record Empty</h2>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                {{$churches->links()}}
                </div>
            </div>
        </div>
    </div>
    @stop
