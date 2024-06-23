<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Summary</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
    <script src="js/script.js"></script>
</head>
<body>
    <?php
    include("connection.php");
    $userprofile = $_SESSION['email'];

    if ($userprofile == true) {

    } else {
        header('Location: index.php');
    }
    ?>

    <header class="header">
        <h1>Expense Tracker</h1>
        <nav class="navbar">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="expense.php">Expenses</a>
            <a class="nav-link" href="chart.php">Graphs</a>
            <a class="nav-link" href="logout.php">Logout</a>
        </nav>
    </header>


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

    $query_category = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY category ORDER BY total_amount DESC";
    $result_category = mysqli_query($con, $query_category);

    $query_yearly = "SELECT YEAR(date) as year, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date)";
    $result_yearly = mysqli_query($con, $query_yearly);

    $query_monthly_all = "SELECT YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date), MONTH(date) ORDER BY total_amount DESC";
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
        <select id="sortOrderMonthly" onchange="sortMonthlyTable()">
            <option value="" disabled selected hidden>Sort</option>
            <option value="desc">High to Low</option>
            <option value="asc">Low to High</option>
        </select>
        <table border="1" cellspacing="7" width="50%" id="monthlyTable">
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
        <select id="sortOrderYearly" onchange="sortYearlyTable()">
            <option value="" disabled selected hidden>Sort</option>
            <option value="desc">High to Low</option>
            <option value="asc">Low to High</option>
        </select>
        <table border="1" cellspacing="7" width="50%" id="yearlyTable">
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
            mysqli_data_seek($result_category, 0);
            while ($row_category_option = mysqli_fetch_assoc($result_category)) {
                echo "<option value='" . $row_category_option['category'] . "'>" . $row_category_option['category'] . "</option>";
            }
            ?>
        </select>
        <select id="sortOrderCategory" onchange="sortCategoryTable()">
            <option value="" disabled selected hidden>Sort</option>
            <option value="desc">High to Low</option>
            <option value="asc">Low to High</option>
        </select>
        <table border="1" cellspacing="7" width="50%" id="categoryTable">
            <tr>
                <th>Category</th>
                <th>Total Amount</th>
            </tr>
            <?php
            mysqli_data_seek($result_category, 0);
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
    include("footer.php");
    ?>
</body>
</html>
