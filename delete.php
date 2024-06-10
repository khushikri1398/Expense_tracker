<?php
include("connection.php");
$id= $_GET['id'];
$query= "DELETE FROM expense WHERE id='$id' ";
$data=mysqli_query($con,$query);
if($data)
{
    echo "<script>alert('expense deleted');</script>";
    header('Location: expense.php');
}
else
{

    echo "<script>alert('Failed to delete');</script>";
}
?>
