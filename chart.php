<?php
include("connection.php");

$userprofile = $_SESSION['email'];

if (!$userprofile) {
    header('Location: index.php');
    exit();
}

// Query for category expenses
$query_category = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY category ORDER BY total_amount DESC";
$result_category = mysqli_query($con, $query_category);
$category_expenses = array();
while ($row_category = mysqli_fetch_assoc($result_category)) {
    $category_expenses[] = array("label" => $row_category['category'], "y" => $row_category['total_amount']);
}

// Query for monthly expenses in the current year
$current_year = date("Y");
$query_monthly_all = "SELECT MONTH(date) as month, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' AND YEAR(date) = '$current_year' GROUP BY MONTH(date) ORDER BY month ASC";
$result_monthly_all = mysqli_query($con, $query_monthly_all);
$monthly_expense = array();
while ($row_monthly = mysqli_fetch_assoc($result_monthly_all)) {
    $monthly_expense[] = array("label" => $row_monthly['month'], "y" => $row_monthly['total_amount']);
}

// Query for yearly expenses
$query_yearly = "SELECT YEAR(date) as year, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date) ORDER BY total_amount DESC";
$result_yearly = mysqli_query($con, $query_yearly);
$yearly_expense = array();
while ($row_yearly = mysqli_fetch_assoc($result_yearly)) {
    $yearly_expense[] = array("label" => $row_yearly['year'], "y" => $row_yearly['total_amount']);
}

// Query for daily expenses
$current_date = date("Y-m-d");
$query_daily = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' AND DATE(date) = CURDATE() GROUP BY category ORDER BY total_amount DESC";
$result_daily = mysqli_query($con, $query_daily);
$daily_expense = array();
while ($row_daily = mysqli_fetch_assoc($result_daily)) {
    $daily_expense[] = array("label" => $row_daily['category'], "y" => $row_daily['total_amount']);
}

// Query for daily expenses in the current month
$first_day_of_month = date("Y-m-01");
$last_day_of_month = date("Y-m-31");
$query_daily_month = "
    SELECT 
        DATE(date) as expense_date, 
        SUM(amount) as total_amount 
    FROM 
        expense 
    WHERE 
        email='$userprofile' 
        AND DATE(date) BETWEEN '$first_day_of_month' AND '$last_day_of_month'
    GROUP BY 
        DATE(date) 
    ORDER BY 
        DATE(date) ASC";
$result_daily_month = mysqli_query($con, $query_daily_month);
$daily_expenses_month = array();
while ($row_daily_month = mysqli_fetch_assoc($result_daily_month)) {
    $daily_expenses_month[] = array("label" => $row_daily_month['expense_date'], "y" => $row_daily_month['total_amount']);
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Charts</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
    <script src="js/canvas.js"></script>
    <script>
        window.onload = function () {
            var categoryChart = new CanvasJS.Chart("categoryChartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Expense Distribution by Category"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "₹#,##0",
                    dataPoints: <?php echo json_encode($category_expenses, JSON_NUMERIC_CHECK); ?>
                }]
            });
            categoryChart.render();

            var monthlyChart = new CanvasJS.Chart("monthlyChartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Monthly Expense Distribution for <?php echo $current_year; ?>"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "₹#,##0",
                    dataPoints: <?php echo json_encode($monthly_expense, JSON_NUMERIC_CHECK); ?>
                }]
            });
            monthlyChart.render();

            var yearChart = new CanvasJS.Chart("yearlyChartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Expense Distribution by Year"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "₹#,##0",
                    dataPoints: <?php echo json_encode($yearly_expense, JSON_NUMERIC_CHECK); ?>
                }]
            });
            yearChart.render();

            var dailyChart = new CanvasJS.Chart("dailyChartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Daily Expense Distribution for <?php echo $current_date; ?>"
                },
                data: [{
                    type: "pie",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label} - #percent%",
                    yValueFormatString: "₹#,##0",
                    dataPoints: <?php echo json_encode($daily_expense, JSON_NUMERIC_CHECK); ?>
                }]
            });
            dailyChart.render();

            var dailyMonthChart = new CanvasJS.Chart("dailyMonthChartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                title: {
                    text: "Daily Expense Distribution for Current Month"
                },
                data: [{
                    type: "line",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "₹{y}",
                    yValueFormatString: "#,##0",
                    dataPoints: <?php echo json_encode($daily_expenses_month, JSON_NUMERIC_CHECK); ?>
                }]
            });
            dailyMonthChart.render();
        }
    </script>
</head>
<body>

<header class="header">
        <h1>Expense Tracker</h1>
        <nav class="navbar">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="expense.php">Expenses</a>
            <a class="nav-link" href="expense_fetch.php">Expense Summary</a>
            <a class="nav-link" href="logout.php">Logout</a>
        </nav>
    </header>
    
    <div id="dailyChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="dailyMonthChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="monthlyChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="yearlyChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="categoryChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <?php include("footer.php"); ?>
</body>
</html>
