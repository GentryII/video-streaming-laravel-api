<!DOCTYPE html>
<html style="position: relative;min-height: 100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VLabs | Admin</title>
    <link href="/Desh_car_hire/public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Desh_car_hire/public/Boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Desh_car_hire/public/Boot/css/main.css">
    <link href="/Desh_car_hire/public/css/bootstrap3_player.css" rel="stylesheet">
    <link href="/Desh_car_hire/public/Boot/css/audio_player.css" rel="stylesheet">
    <link href="/Desh_car_hire/public/sweet_alert/audio_player.css" rel="stylesheet">
    <script>
        var el = document.getElementById('actions');

        el.addEventListener('submit', function(){
            return confirm('Are you sure you want to submit this form?');
        }, false);
    </script>

    <script src="/main.js"></script>


</head>
<body style="font-family: 'Berlin Sans FB'; margin-bottom: 150px;">
<!--"Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif">-->
<div class="side-nav" id="side_nav" style="width: 80px; padding-top: 0;height:100%">
    <div class="logo">
        <img src="/QuickSermon/public/images/vlabs.jpg" class="image">
    </div>
    <nav>
        <ul class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-arrow-circle-left"></i></a>
            <li>
                <a href={{route("admin")}} onclick="openNav()">
                    <span><i class="fa fa-dashboard" style="font-size: 30px;"></i></span>
                    <span id="dash" style="font-size: 12px;"></span>
                </a>
            </li>
            <li>
                <a href={{route("create")}} onclick="openNav()">
                    <span><i class="fa fa-pencil" style="font-size: 30px;"></i></span>
                    <span id="new" style="font-size: 12px;"></span>
                </a>
            </li>
            <li>
                <a href="#" onclick="openNav()">

                    <span><i class="fa fa-clock-o" style="font-size: 30px;"></i></span>
                    <span id="recent" style="font-size: 12px;"></span>
                </a>
            </li>
            <li>
                <a href="#" onclick="openNav()">
                    <span><i class="fa fa-book" style="font-size: 30px;"></i></span>
                    <span id="all" style="font-size: 12px;"></span>
                </a>
            </li>
            <li>
                <a href={{route("create-church")}} onclick="openNav()">
                    <span><i class="fa fa-home" style="font-size: 30px;"></i></span>
                    <span id="churches" style="font-size: 12px;"></span>
                </a>
            </li>
            <li>
                <a href={{route("create-user")}} onclick="openNav()">
                    <span><i class="fa fa-user" style="font-size: 30px;"></i></span>
                    <span id="users" style="font-size: 12px;"></span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div id="main" style="margin-left: 80px">
    <div class="heading" style="background-color: rgba(0,0,0,0.1)">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="padding-top: 0">
                    <div style="margin-top: 30px">
                        <div class="path">
                            @yield('path')
                        </div>
                        <a href="#logoutModal" data-toggle="modal">
                            <div class="avatar">
                                <img src="/QuickSermon/public/audios/Folder.jpg" class="image">
                            </div>
                        </a>
                    </div>
                    <hr style="border-color: #d5dae5"/>
                </div>
                <div class="col-md-12" style="margin-bottom: 30px; margin-top: 10px">
                    @yield('title')
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
<footer style=" background-color: #2aabd2;position: absolute;bottom: 0;width: 100%; height: 150px;
"><h2 align="center" style="margin-top: 60px">&copy; Virtual Labs 2017</h2></footer>

<script src="/QuickSermon/public/Boot/js/jquery.js"></script>
<script src="/QuickSermon/public/Boot/js/nav.js"></script>
<script src="/QuickSermon/public/Boot/js/bootstrap.min.js"></script>
<script src="/QuickSermon/public/ckeditor/ckeditor.js"></script>
<script src="QuickSermon/public/audiojs/audio.min.js"></script>
<script src="QuickSermon/public/js/bootstrap3_player.js"></script>
<script src="/QuickSermon/public/Boot/js/audio_player.js"></script>
<script src="/QuickSermon/public/sweet_alert/sweetalert.min.js"></script>
<script src="/QuickSermon/public/alertifyjs/alertify.min.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>
<script>
    audiojs.events.ready(function() {
        var as = audiojs.createAll();
    });
</script>
<script>
    $('div.alert').not('.alert-important').delay(10000).slideUp(300)
</script>

<div class="modal" id="logoutModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #35475e">
                <h3 class="modal-title" style="color: #ffffff">New Sermon</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="audios/Folder.jpg" class="image">
                <p>Script containing admin details goes here;)</p>
            </div>
            {!! Form::open(['url' => 'logout', 'method' => 'get']) !!}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Logout</button>
            </div>
            {!! Form::close()!!}
        </div>
    </div>
</div>
</body>
</html>