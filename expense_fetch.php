<?php
session_start();
?>
<head>
    <title>Expense Summary</title>
    <link rel="stylesheet" href="index-style.css">
    <style>
        body {
            background-color: lavender;
            font-family: Arial, sans-serif;
        }
        table {
            background-color: white;
        }
        .dashboard, .logout {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .dashboard a, .logout a {
            text-decoration: none;
        }
        .dashboard a input, .logout a input {
            padding: 10px 20px;
            background-color:rosybrown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .dashboard a input:hover {
            background-color: blueviolet;
        }
        .logout a input:hover {
            background-color: red;
        }
        .update, .delete {
            background-color:green;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            height: 30px;
            font-weight: bold;
        }
        .update:hover {
            background-color: slateblue;
        }
        .delete {
            background-color:red;
        }
        .delete:hover {
            background-color:crimson;
        }
        .dashboard-links {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .lnk {
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
    </style>
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);
$userprofile = $_SESSION['email'];

if ($userprofile == true) {

} else {
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/project/index.php"/>
    <?php
}
?>
<div class="container">
    <div class="dashboard-links">
        <a href="dashboard.php" class="lnk">Dashboard</a>
        <a href="expense.php" class="lnk">Expenses</a>
    </div>
</div>
<?php
$query_daily = "SELECT SUM(amount) as daily_expense FROM expense WHERE email='$userprofile' AND DATE(date) = CURDATE()";
$result_daily = mysqli_query($con, $query_daily);
$row_daily = mysqli_fetch_assoc($result_daily);
$daily_expense = $row_daily['daily_expense'] ? $row_daily['daily_expense'] : 0;

$query_weekly = "SELECT SUM(amount) as weekly_expense FROM expense WHERE email='$userprofile' AND YEARWEEK(date, 1) = YEARWEEK(CURDATE(), 1)";
$result_weekly = mysqli_query($con, $query_weekly);
$row_weekly = mysqli_fetch_assoc($result_weekly);
$weekly_expense = $row_weekly['weekly_expense'] ? $row_weekly['weekly_expense'] : 0;

$query_monthly = "SELECT SUM(amount) as monthly_expense FROM expense WHERE email='$userprofile' AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
$result_monthly = mysqli_query($con, $query_monthly);
$row_monthly = mysqli_fetch_assoc($result_monthly);
$monthly_expense = $row_monthly['monthly_expense'] ? $row_monthly['monthly_expense'] : 0;

$query_category = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY category";
$result_category = mysqli_query($con, $query_category);

$query_yearly = "SELECT YEAR(date) as year, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date)";
$result_yearly = mysqli_query($con, $query_yearly);

$query_monthly_all = "SELECT YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date), MONTH(date)";
$result_monthly_all = mysqli_query($con, $query_monthly_all);
?>

<h2 align="center">Expense Summary</h2>
<h4 align="center">Expense summary on basis of dates</h4>
<center>
    <table border="1" cellspacing="7" width="50%">
        <tr>
            <th>Daily Expense</th>
            <th>Weekly Expense</th>
            <th>Monthly Expense</th>
        </tr>
        <tr>
            <td><?php echo $daily_expense; ?></td>
            <td><?php echo $weekly_expense; ?></td>
            <td><?php echo $monthly_expense; ?></td>
        </tr>
    </table>
</center>
<h4 align="center">Expense summary on basis of months</h4>
<center>
    <table border="1" cellspacing="7" width="50%">
        <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Total Amount</th>
        </tr>
        <?php
        while ($row_monthly_all = mysqli_fetch_assoc($result_monthly_all)) {
            echo "<tr>
                <td>" . $row_monthly_all['year'] . "</td>
                <td>" . $row_monthly_all['month'] . "</td>
                <td>" . $row_monthly_all['total_amount'] . "</td>
            </tr>";
        }
        ?>
    </table>
</center>
<h4 align="center">Expense summary on basis of years</h4>
<center>
    <table border="1" cellspacing="7" width="50%">
        <tr>
            <th>Year</th>
            <th>Total Amount</th>
        </tr>
        <?php
        while ($row_yearly = mysqli_fetch_assoc($result_yearly)) {
            echo "<tr>
                <td>" . $row_yearly['year'] . "</td>
                <td>" . $row_yearly['total_amount'] . "</td>
            </tr>";
        }
        ?>
    </table>
</center>
<h4 align="center">Expense summary on basis of categories</h4>
<center>
    <table border="1" cellspacing="7" width="50%">
        <tr>
            <th>Category</th>
            <th>Total Amount</th>
        </tr>
        <?php
        while ($row_category = mysqli_fetch_assoc($result_category)) {
            echo "<tr>
                <td>" . $row_category['category'] . "</td>
                <td>" . $row_category['total_amount'] . "</td>
            </tr>";
        }
        ?>
    </table>
</center>
<?php
$query = "SELECT * FROM expense WHERE email='$userprofile' ";
$data = mysqli_query($con, $query);
$total = mysqli_num_rows($data);
?>
<div class="logout"><a href="logout.php" class="link"><input type='submit' value='Logout'></a></div>
<?php
include("footer.php");
?>
</html>
