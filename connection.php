<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "p2";
$con = mysqli_connect($server, $username, $password, $db);

if($con){
    //echo "connection ok";
}
else{
    echo "connection failed".mysqli_connect_error();
}
?>