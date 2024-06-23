<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
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
            <a class="nav-link" href="expense_form.php">Add Expenses</a>
            <a class="nav-link" href="expense.php">Expenses</a>
            <a class="nav-link" href="expense_fetch.php">Expenses Summary</a>
            <a class="nav-link" href="chart.php">Graphs</a>
            <a class="nav-link" href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <div class="img">
            <img src="images/dash.jpg" height="350" width="500">
        </div>
    </div>

    <footer class="footer">
        <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
    </footer>

</body>

</html>
