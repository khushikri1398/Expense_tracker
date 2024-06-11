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
    header('Location: index.php');
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
// Retrieves the total sum (SUM(amount)) of expenses for the current day (CURDATE()) for the user.
$result_daily = mysqli_query($con, $query_daily);
$row_daily = mysqli_fetch_assoc($result_daily);
$daily_expense = $row_daily['daily_expense'] ? $row_daily['daily_expense'] : 0;

$query_weekly = "SELECT SUM(amount) as weekly_expense FROM expense WHERE email='$userprofile' AND YEARWEEK(date, 1) = YEARWEEK(CURDATE(), 1)";
//Ensures that weeks are numbered consistently, with Monday as the start of the week.
$result_weekly = mysqli_query($con, $query_weekly);
$row_weekly = mysqli_fetch_assoc($result_weekly);
$weekly_expense = $row_weekly['weekly_expense'] ? $row_weekly['weekly_expense'] : 0;

$query_monthly = "SELECT SUM(amount) as monthly_expense FROM expense WHERE email='$userprofile' AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())";
$result_monthly = mysqli_query($con, $query_monthly);
$row_monthly = mysqli_fetch_assoc($result_monthly);
$monthly_expense = $row_monthly['monthly_expense'] ? $row_monthly['monthly_expense'] : 0;

$query_category = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY category";
$result_category = mysqli_query($con, $query_category);
//GROUP BY is used to group rows that have the same values in specified columns into aggregated data. Here, it groups the rows by the category column.
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
    <select id="categoryFilter" onchange="filterCategory()">
        <option value="all">All Categories</option>
        <?php
        mysqli_data_seek($result_category, 0); // This line resets the result set pointer to the beginning of the result set, ensuring that subsequent fetch operations start from the first row.
        while ($row_category_option = mysqli_fetch_assoc($result_category)) {
            echo "<option value='" . $row_category_option['category'] . "'>" . $row_category_option['category'] . "</option>";
        }// Inside the loop, it echoes an <option> element for each category, with the category name set as both the option's value and its displayed text.
        //It's used twice because the value attribute (value='...') and the displayed text (<option>...</option>) of the <option> tag can be different.
        ?>
    </select>
    <table border="1" cellspacing="7" width="50%" id="categoryTable">
        <tr>
            <th>Category</th>
            <th>Total Amount</th>
        </tr>
        <?php
        mysqli_data_seek($result_category, 0); // Reset result set pointer
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
<script>
    function filterCategory() {
        var dropdown = document.getElementById("categoryFilter");
        //This line gets the HTML element with the ID categoryFilter (likely a <select> dropdown) and assigns it to the variable dropdown
        //This dropdown is used to select the category by which the table should be filtered
        var table = document.getElementById("categoryTable");
        //This line gets the HTML element with the ID categoryTable (likely a <table>) and assigns it to the variable table. This is the table that will be filtered.
        var rows = table.getElementsByTagName("tr");
        //This line gets all the <tr> (table row) elements within the categoryTable and assigns them to the variable rows
        var selectedCategory = dropdown.value;
        //This line gets the value of the selected option from the dropdown and assigns it to the variable selectedCategory

        for (var i = 1; i < rows.length; i++) {
            var categoryCell = rows[i].getElementsByTagName("td")[0];
            if (categoryCell) {
                var category = categoryCell.textContent || categoryCell.innerText;
                if (selectedCategory === "all" || category === selectedCategory) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>
</html>
