<?php
    session_start();
?>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="index-style.css">
    <style>
        body{
            background-color: lavender;
        }
        table{
            background-color: white;
        }
    </style>
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);

$userprofile=$_SESSION['username'];

if($userprofile== true)
{

}
else
{
    ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/project/index.php"/>
    <?php
}
?>
<a href="logout.php"><input type="submit" name="" value="logout" style="background:violet; color:white; height: 35px; width: 100px; margin-top=20px; font-size=18px; border:0; border-radius:5px;cursor:pointer"></a>
<?php
include("footer.php");
?>

</html>