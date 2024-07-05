<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
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
    $query = "SELECT * FROM expense WHERE email='$userprofile'";
    $data = mysqli_query($con, $query);

    $total = mysqli_num_rows($data);

    if ($total != 0) {
        ?>
        <h2 style="text-align:center">Displaying all Expenses</h2>
            <table cellspacing="7" width="50%">
                <tr>
                    <th width="20%">category</th>
                    <th width="15%">amount</th>
                    <th width="20%">description</th>
                    <th width="20%">date</th>
                    <th width="20%">operations</th>
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
    } else {
        //echo "<script>alert('No record Found');</script>";
    }
    ?>
        </table>
    </>
    <script>
        function checkdelete() {
            return confirm('Are you sure you want to delete this expense?');
        }
    </script>

    <footer class="footer">
        <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
    </footer>

</body>

</html>