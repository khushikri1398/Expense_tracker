<?php
include("connection.php");

$userprofile = $_SESSION['email'];

if (!$userprofile) {
    header('Location: index.php');
    exit();
}

$query_category = "SELECT category, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY category ORDER BY total_amount DESC";
$result_category = mysqli_query($con, $query_category);

$category_expenses = array();
while ($row_category = mysqli_fetch_assoc($result_category)) {
    $category_expenses[] = array("label" => $row_category['category'], "y" => $row_category['total_amount']);
}

$current_year = date("Y");
$query_monthly_all = "SELECT MONTH(date) as month, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' AND YEAR(date) = '$current_year' GROUP BY MONTH(date) ORDER BY month ASC";
$result_monthly_all = mysqli_query($con, $query_monthly_all);

$monthly_expense = array();
while ($row_monthly = mysqli_fetch_assoc($result_monthly_all)) {
    $monthly_expense[] = array("label" => $row_monthly['month'], "y" => $row_monthly['total_amount']);
}

$query_yearly = "SELECT YEAR(date) as year, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' GROUP BY YEAR(date) ORDER BY total_amount DESC";
$result_yearly = mysqli_query($con, $query_yearly);

$yearly_expense = array();
while ($row_yearly = mysqli_fetch_assoc($result_yearly))
{
    $yearly_expense[] = array("label"=> $row_yearly['year'], "y"=> $row_yearly['total_amount']);
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
        }
    </script>
</head>
<body>

<?php include("header.php"); ?>
    <div class="container">
        <div class="dashboard-links">
            <a href="dashboard.php" class="lnk">Dashboard</a>
            <a href="expense.php" class="lnk">Expenses</a>
            <a href="expense_fetch.php" class="lnk">Expenses Summary</a>
        </div>
    </div>
    
    <div id="categoryChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="monthlyChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>
    <div id="yearlyChartContainer" style="height: 370px; width: 100%; margin-bottom: 50px;"></div>

    <div class="logout"><a href="logout.php" class="link"><input type='submit' value='Logout'></a></div>
    <?php include("footer.php"); ?>
</body>
</html>
