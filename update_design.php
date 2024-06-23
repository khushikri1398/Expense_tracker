<?php 
include("connection.php"); 
include("header.php"); 
$id= $_GET['id'];
$query="SELECT * FROM expense where id='$id' ";
$data=mysqli_query($con,$query);
$result=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/index-style.css">
    <link rel="stylesheet" type="text/css" href="CSS/form.css">
    <title>Update Expenses</title>
</head>
<body>
    <div class="container">
        <form name="expenseForm" action="#" method="POST">
            <div class="title">
                Update Expenses
            </div>
            <div class="dashboard"><a href="dashboard.php" class="link">Dashboard</a></div>
            <div class="form">
            <div class="input_field">
                    <label>Category</label>
                    <select class="input" name="category" required>
                        <option value="" disabled selected hidden>Select</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Food">Food</option>
                        <option value="Education">Education</option>
                        <option value="Travel">Travel</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Amount</label>
                    <input type="number" value="<?php echo $result['amount'];?>" class="input" name="amount" required>
                </div>
                <div class="input_field">
                    <label>Description</label>
                    <input type="text" value="<?php echo $result['descr'];?>" class="input" name="descr" required>
                </div>
                <div class="input_field">
                    <label>Date</label>
                    <input type="date" value="<?php echo $result['date'];?>" class="input" name="date" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Update Expense" class="btn" name="update">
                </div>
                <div class="logout"><a href="logout.php" class="link">Logout</a></div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

$userprofile=$_SESSION['email'];

if($userprofile== true)
{

}
else
{
    header('Location: index.php');
}
?>
<?php
if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $amt= $_POST['amount'];
    $desc = $_POST['descr'];
    $date= $_POST['date'];

    if ($category!= "" && $amt != ""  && $desc!="" && $date!=="") {
        $query="UPDATE expense set category='$category',amount= '$amt',descr= '$desc',date='$date' WHERE id='$id' ";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('expense updated');</script>";
            header('Location: expense.php');
        } else {
            echo "<script>alert('Failed to update data');</script>";
        }
    }
}
?>
<footer class="footer" style="position :fixed">
    <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
</footer>
