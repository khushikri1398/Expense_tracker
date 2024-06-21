<head>
    <title>Expense</title>
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/style_main.css">
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);
$userprofile=$_SESSION['email'];

if($userprofile == true) {

} else {
    header('Location: index.php');
}
?>
<div class="container">
    <div class="dashboard-links">
        <a href="expense_form.php" class="lnk">Add_Expense</a>
        <a href="expense_fetch.php" class="lnk">Expenses Summary</a>
        <a href="chart.php" class="lnk">Graphs </a>
        <a href="dashboard.php" class="lnk">Dashboard</a>
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
<footer class="footer">
    <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
</footer>
</html>
