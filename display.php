<html>
<head>
    <title>Display</title>
    <style>
        body{
            background-color: lavender;
        }
        table{
            background-color: white;
        }
    </style>
</head>

<?php
include("connection.php");
error_reporting(0);

$query="SELECT * FROM signup";
$data=mysqli_query($con,$query);

$total=mysqli_num_rows($data);


//echo $total;

if($total!= 0){
    ?>
    <h2 align="center">Displaying all records</h2>
    <center>
    <table border="3px" cellspacing="7" width="50%">
        <tr>
        <th width="10%">first name</th>
        <th width="10%">last name</th>
        <th width="20%">email</th>
        <th width="10%">phone</th>
        </tr>
    <?php

    while($result=mysqli_fetch_assoc($data))
    {
        echo "<tr>
            <td>".$result['fname']."</td>
            <td>".$result['lname']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone']."</td>
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
</html>
