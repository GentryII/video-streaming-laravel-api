<?php
/**
 * Created by PhpStorm.
 * User: Therealisback
 * Date: 19/09/2017
 * Time: 2:19 PM
 */
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "qserm";
$connection = mysqli_connect($serverName, $userName, $password, $dbname);

if(!$connection)
{
    die("Connection failed; ".mysqli_connect_error());
}
?>