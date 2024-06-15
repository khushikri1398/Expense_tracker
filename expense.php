<head>
    <title>Expense</title>
    <link rel="stylesheet" href="css/index-style.css">
    <style>
        body {
            background-color: lavender;
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
        .dashboard a input:hover{
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
        .dashboard-links{
            display:flex ;
            justify-content: space-around;
            margin: 20px 0;
        }
        .lnk{
            background-color:palevioletred;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 10px;
        }
    </style>
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);
?>
<div class="dashboard"><a href="dashboard.php" class="link"><input type='submit' value='Dashboard'></a></div>
<?php
$userprofile=$_SESSION['email'];

if($userprofile == true) {

} else {
    header('Location: index.php');
}
?>
<div class="container">
    <div class="dashboard-links">
            <a href="expense_fetch.php" class="lnk">Expense Summary</a></div>
    </div>
</div>
<?php
$query = "SELECT * FROM expense WHERE email='$userprofile' ";
$data = mysqli_query($con, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <h2 align="center">Displaying all Expenses</h2>
    <center>
    <table border="3px" cellspacing="7" width="50%">
        <tr>
            <th width="5%">id</th>
            <th width="20%">category</th>
            <th width="15%">amount</th>
            <th width="20%">description</th>
            <th width="20%">date</th>
            <th width="20%">operations</th>
        </tr>
    <?php

    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
            <td>" . $result['id'] . "</td>
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
</center>
<script>
    function checkdelete()
    {
        return confirm('Are you sure you want to delete this expense?');
    }
</script>
    <div class="logout"><a href="logout.php" class="link"><input type='submit' value='Logout'></a></div>
<?php
include("footer.php");
?>
</html>
