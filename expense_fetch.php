<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Summary</title>
    <script src="tailwind.js"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <?php
    include ("connection.php");
    include ("header.php");

    $userprofile = $_SESSION['email'];

    if (!$userprofile) {
        header('Location: index.php');
    }
    ?>


    <?php
    // Fetching expenses data from the database
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

    $current_year = date("Y");
    $query_monthly_all = "SELECT YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount FROM expense WHERE email='$userprofile' AND YEAR(date) = '$current_year' GROUP BY YEAR(date), MONTH(date) ORDER BY total_amount DESC";
    $result_monthly_all = mysqli_query($con, $query_monthly_all);

    $first_day_of_month = date("Y-m-01");
    $last_day_of_month = date("Y-m-t");
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
    ?>

    <div class="container  py-8">
        <h2 class="text-2xl font-bold text-center mb-4 text-red-600">Expense Summary</h2>
        <h4 class="text-xl font-semibold text-center mb-4 text-green-600">Expense summary based on dates</h4>
        <div class="flex justify-center mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 w-2/3">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class=" py-2">Daily Expense</th>
                            <th class=" py-2">Weekly Expense</th>
                            <th class=" py-2">Monthly Expense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $daily_expense; ?></td>
                            <td class="border px-4 py-2"><?php echo $weekly_expense; ?></td>
                            <td class="border px-4 py-2"><?php echo $monthly_expense; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h4 class="text-xl font-semibold text-center mb-4 text-green-600">Expense summary for this month</h4>
        <div class="flex justify-center mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 w-2/3">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_daily_month = mysqli_fetch_assoc($result_daily_month)) { ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $row_daily_month['expense_date']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row_daily_month['total_amount']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $month_names = array(
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        );
        ?>

        <h4 class="text-xl font-semibold text-center mb-4 text-green-600">Expense summary for
            <?php echo $current_year; ?></h4>
        <div class="flex justify-center mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 w-2/3">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="px-4 py-2">Month</th>
                            <th class="px-4 py-2">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_monthly_all = mysqli_fetch_assoc($result_monthly_all)) { ?>
                            <tr>
                                <td class="border px-4 py-2">
                                    <?php
                                    $month_number = $row_monthly_all['month'];
                                    echo $month_names[$month_number];
                                    ?>
                                </td>
                                <td class="border px-4 py-2"><?php echo $row_monthly_all['total_amount']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <h4 class="text-xl font-semibold text-center mb-4 text-green-600">Expense summary on basis of years</h4>
        <div class="flex justify-center mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 w-2/3">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="px-4 py-2">Year</th>
                            <th class="px-4 py-2">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_yearly = mysqli_fetch_assoc($result_yearly)) { ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $row_yearly['year']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row_yearly['total_amount']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h4 class="text-xl font-semibold text-center mb-4 text-green-600">Expense summary on basis of categories</h4>
        <div class="flex justify-center mb-8">
            <div class="bg-white shadow-md rounded-lg p-6 w-2/3">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php mysqli_data_seek($result_category, 0); ?>
                        <?php while ($row_category = mysqli_fetch_assoc($result_category)) { ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $row_category['category']; ?></td>
                                <td class="border px-4 py-2"><?php echo $row_category['total_amount']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include ("footer.php");
    ?>
</body>

</html>