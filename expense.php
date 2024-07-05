<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
    <script src="js/script_main.js"></script>
    <style>
        .footer {
            background-color: #3c3c65;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .sort-filter-container {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php
    include ("connection.php");
    error_reporting(0);
    $userprofile = $_SESSION['email'];

    if ($userprofile == true) {
    } else {
        header('Location: index.php');
    }
    ?>

    <header class="header">
        <h1>Expense Tracker</h1>
        <nav class="navbar">
            <a class="nav-link" href="expense_form.php">Add Expense</a>
            <a class="nav-link" href="expense_fetch.php">Expenses Summary</a>
            <a class="nav-link" href="chart.php">Graphs</a>
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="logout.php">Logout</a>
        </nav>
    </header>

    <?php
    $query = "SELECT DISTINCT category FROM expense WHERE email='$userprofile'";
    $categories = mysqli_query($con, $query);

    $query_expenses = "SELECT * FROM expense WHERE email='$userprofile'";
    $data = mysqli_query($con, $query_expenses);
    $total = mysqli_num_rows($data);
    ?>

    <div class="sort-filter-container">
        <h2>Displaying all Expenses</h2>
        <select id="categoryFilter" onchange="filterCategory()">
            <option value="all">All Categories</option>
            <?php
            while ($category = mysqli_fetch_assoc($categories)) {
                echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
            }
            ?>
        </select>

        <select id="sortPrice" onchange="sortTable(1, 'expenseTable')">
            <option value="none">Sort by Price</option>
            <option value="asc">Low to High</option>
            <option value="desc">High to Low</option>
        </select>

        <select id="sortDate" onchange="sortTable(3, 'expenseTable')">
            <option value="none">Sort by Date</option>
            <option value="asc">Oldest to Newest</option>
            <option value="desc">Newest to Oldest</option>
        </select>
    </div>

    <?php
    if ($total != 0) {
        ?>
        <div style="text-align: center;">
            <table cellspacing="7" width="50%" id="expenseTable">
                <tr>
                    <th width="20%">Category</th>
                    <th width="15%">Amount</th>
                    <th width="20%">Description</th>
                    <th width="20%">Date</th>
                    <th width="20%">Operations</th>
                </tr>
                <?php
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                            <td>" . $result['category'] . "</td>
                            <td>" . $result['amount'] . "</td>
                            <td>" . $result['descr'] . "</td>
                            <td>" . $result['date'] . "</td>
                            <td><a href='update_design.php?id=" . $result['id'] . "'><input type='submit' value='Update' class='update'></a>
                            <a href='delete.php?id=" . $result['id'] . "'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a></td>
                        </tr>";
                }
                ?>
            </table>
        </div>
        <?php
    } else {
        echo "<p style='text-align: center;'>No record Found</p>";
    }
    ?>
    <footer class="footer">
        <p> Copyright @ Expense Tracker. All Rights Reserved | Contact Us: +9190000 00000</p>
    </footer>

</body>

</html>