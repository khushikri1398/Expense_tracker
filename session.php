<?php
session_start();
$_SESSION["username"]="khushi";

echo $_SESSION["username"];

$_SESSION["class"]="BCA";


echo $_SESSION["class"];

session_unset();

?>