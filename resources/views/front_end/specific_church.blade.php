<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/QuickSermon/public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/QuickSermon/public/Boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="/QuickSermon/public/Boot/css/front_end.css">

    <title>Quick Sermons</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            width: 100%;
            height: 5%;
        }

        .title {
            font-size: 24px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif
    <div class="top-left logo">
        <table>
            <td><img src="/QuickSermon/public/images/logo.jpg" class="image"></td>
            <td><h4>Virtual-Labs</h4></td>
        </table>
    </div>

    <div class="content">
        <img src="/QuickSermon/public/images/picc/picclogo.jpg" class="imagechurchlogo" style="margin-top: -250px">
        <div class="title m-b-md" style="margin-top: -50px">
            Welcome to P.I.C.C Sermons
            <p style="font-size: 18px">Select the service you would like to access</p>
        </div>
        <div class="main-main">
        @yield('content')
        </div>
    </div>
</div>
<div>
</div>
<script src="/QuickSermon/public/Boot/js/jquery.js"></script>
<script src="/QuickSermon/public/Boot/js/bootstrap.min.js"></script>
<footer style="text-align: center; margin-bottom: 20px;margin-top:0">
    <hr style="margin-bottom: 40px" />
    Virtual Labs Inc. &copy2017
</footer>
</body>
</html>
