<?php
    session_start();
?>
<head>
    <title>Expense</title>
    <link rel="stylesheet" href="index-style.css">
    <style>
        body{
            background-color: lavender;
        }
        table{
            background-color: white;
        }
        .Dashboard {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 4px;
        }
        .logout
        {
            text-align: center;
            margin-bottom: 4px;
            margin-top: 4px;
        }
    </style>
</head>

<?php
include("connection.php");
include("header.php");
error_reporting(0);

$userprofile=$_SESSION['username'];

if($userprofile== true)
{

}
else
{
    ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/project/index.php"/>
    <?php
}

$query="SELECT * FROM expense";
$data=mysqli_query($con,$query);

$total=mysqli_num_rows($data);
//echo $total;

if($total!= 0){
    ?>
    <h2 align="center">Displaying all Expenses</h2>
    <div class="Dashboard"><a href="dashboard.php" class="link">Dashboard</a></div>
    <center>
    <table border="3px" cellspacing="7" width="50%">
        <tr>
        <th width="10%">id</th>
        <th width="10%">category</th>
        <th width="20%">amount</th>
        <th width="10%">description</th>
        <th width="30%">date</th>
        </tr>
    <?php

    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
            <td>".$result['id']."</td>
            <td>".$result['category']."</td>
            <td>".$result['amount']."</td>
            <td>".$result['descr']."</td>
            <td>".$result['date']."</td>
        </tr>
        ";
    }
}
else{
    echo "no records found";
}

?>
</table>
</center>
<div>
    <div class="logout"><a href="logout.php" class="link">logout</a></div>
</div>
<?php
include ("footer.php");
?>
</html>