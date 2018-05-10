<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "qserm";
$connection = mysqli_connect($serverName, $userName, $password, $dbname);

if(!$connection)
{
    die("Connection failed; ".mysqli_connect_error());
}


if(isset($_POST['txtUsername']) && isset($_POST['txtPassword']))
{
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    $query = "SELECT email, password from users ".
        "WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);
}

if($result->num_rows > 0)
{
    echo 'Success';
}
?>
<html>
<head>
    <title>Android Connection Testing</title>
</head>
<body>
<form action="?" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Username <input type="text" name="txtUsername" value=""></br>
    Password <input type="password" name="txtPassword" value=""></br>
    <input type="submit" name="btnSubmit" value="Login">
</form>
</body>
</html>
