<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
</head>

<?php
include("connection.php");
include("header.php");

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
            <a href="expense_form.php" class="lnk">Add Expenses</a>
            <a href="expense.php" class="lnk">Expenses</a>
            <a href="expense_fetch.php" class="lnk">Expenses Summary</a>
            <a href="chart.php" class="lnk">Graphs</a>
        </div>
    </div>
<div class= "img">
    <img src="images/dash.jpg" height="350" width="500">
</div>
<div>
    <div class="logout"><a href="logout.php" class="lnk">logout</a></div>
</div>
<?php
include("footer.php");
?>

</html>