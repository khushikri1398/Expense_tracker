<?php 
include("connection.php"); 
include("header.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/index-style.css">
    <link rel="stylesheet" type="text/css" href="CSS/form.css">
    <title>Expense Form</title>
</head>
<body>
    <div class="container">
        <form name="expenseForm" action="#" method="POST">
            <div class="title">
                Add expenses
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
                    <input type="number"  class="input" name="amount" required>
                </div>
                <div class="input_field">
                    <label>Description</label>
                    <input type="text" class="input" name="descr" required>
                </div>
                <div class="input_field">
                    <label>Date</label>
                    <input type="date" class="input" name="date" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Add Expense" class="btn" name="register">
                </div>
                <div class="logout"><a href="logout.php" class="link">Logout</a></div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
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
<?php
if (isset($_POST['register'])) {
    $category = $_POST['category'];
    $amt= $_POST['amount'];
    $desc = $_POST['descr'];
    $date= $_POST['date'];

    if ($category!= "" && $amt != ""  && $desc!="" && $date!=="") {
        $query = "INSERT INTO expense (email,category,amount,descr,date) VALUES ('$userprofile','$category', '$amt', '$desc', '$date')";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('expense added');</script>";
            header('Location: expense.php');
        } else {
            echo "<script>alert('Failed to insert data');</script>";
        }
    }
}
?>
<footer class="footer" style="position :fixed">
    <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
</footer>
