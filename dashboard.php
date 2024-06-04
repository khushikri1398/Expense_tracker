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
        .link{
            background-color: grey;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
        .link:hover {
            background-color: #483d8b;
        }
        .logout
        {
            text-align: center;
            margin-bottom: 14px;
            margin-top: 4px;
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
<div class="container">
    <div class="dashboard-links">
            <a href="expense.php" class="link">Expense</a>
            <a href="expense_form.php" class="link">Add_Expense</a></div>
    </div>
</div>
<div>
    <div class="logout"><a href="logout.php" class="link">logout</a></div>
</div>
<?php
include("footer.php");
?>

</html>