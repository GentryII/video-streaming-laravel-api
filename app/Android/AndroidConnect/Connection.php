<?php namespace App\Android\AndroidConnection;
use Illuminate\Support\Facades\Request;

/**
 * Created by PhpStorm.
 * User: Therealisback
 * Date: 19/09/2017
 * Time: 6:00 PM
 */
class Connection
{
    public function database(Request $request)
    {
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
    }
}