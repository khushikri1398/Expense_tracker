<?php 
session_start();
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="index-style.css">
    <title>Update Expenses</title>
    <style>
        .dashboard, .logout {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .dashboard a, .logout a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: rosybrown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            display: inline-block;
        }
        .dashboard a:hover, .logout a:hover {
            background-color: blueviolet;
        }
    </style>
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
                    <input type="text" value="<?php echo $result['category'];?>" class="input" name="category" required>
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
include("connection.php");
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
            ?>
                <meta http-equiv = "refresh" content = "0; url =http://localhost/project/expense.php"/>
            <?php
        } else {
            echo "<script>alert('Failed to update data');</script>";
        }
    }
}
include ("footer.php");
?>
