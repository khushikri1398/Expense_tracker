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