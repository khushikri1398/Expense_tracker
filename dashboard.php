<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
    <!--<style>
        body{
            background-color: lavender;
        }
        table{
            background-color: white;
        }
        .container{
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-links{
            display:flex ;
            justify-content: space-around;
            margin: 20px 0;
        }
        .lnk{
            background-color:palevioletred;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .lnk:hover {
            background-color: #483d8b;
        }
        .logout
        {
            text-align: center;
            margin-bottom: 14px;
            margin-top: 4px;
        }
        .img{
            display: flex;
            justify-content: center;
            margin: 5px 5px;
            padding-bottom: 15px;
        }
    </style>-->
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);

$userprofile=$_SESSION['email'];

if($userprofile== true)
{

}
else
{
    header('Location: index.php');
}
?>
<div class="container">
    <div class="dashboard-links">
            <a href="expense.php" class="lnk">Expense</a>
            <a href="expense_form.php" class="lnk">Add_Expense</a></div>
    </div>
</div>
<div class= "img">
    <img src="images/image.jpg" height="350" width="500">
</div>
<div>
    <div class="logout"><a href="logout.php" class="lnk">logout</a></div>
</div>
<?php
include("footer.php");
?>

</html>