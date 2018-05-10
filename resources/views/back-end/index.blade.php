@extends('back-end.admin')
@section('path')
    <h4 style="margin-left: 10px;color:#000000; display: inline-block">Dashboard</h4>
    <h4 style="display: inline-block; color:#000000;">::Home</h4>
@stop
@section('content')
    <div class="row" style="height: 80%">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title">Client Churches</h1>
                    <a href={{route("create-church")}}>
                        <span><i class="fa fa-home" style="font-size: 250px;"></i></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row" style="height: 80%">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h1 class="card-title">All Sermons</h1>
                        <a href= {{route("create")}}>
                            <span><i class="fa fa-book" style="font-size: 250px;"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row" style="height: 80%">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="card-title">Users</h1>
                            <a href={{"create-user"}}>
                                <span><i class="fa fa-user" style="font-size: 250px;"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
    </div>


    @endsection