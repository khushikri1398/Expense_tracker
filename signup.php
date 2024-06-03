<?php include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>sign_up</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div  class="title">
            Sign up
        </div>
        <div  class="Title">
            Create a new account
        </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" required>
            </div>

            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>

            <div class="input_field">
                <label>Confirm password</label>
                <input type="password" class="input" name="conpassword" required>
            </div>


            <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email">
            </div>
            <div class="input_field">
                <label>Phone no</label>
                <input type="text" class="input" name="phone" required>
            </div>

        
            <div class="input_field">
                <input type="submit" value="Signup" class="btn" name="register">
            </div>

            <div class="signup">Already have an account?<a href="login.php" class="link"> login Here</a></div>
        </div>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['register']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $pwd=$_POST['password'];
        $cpwd=$_POST['conpassword'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        if($fname!="" && $lname!="" && $pwd!="" && $cpwd!="" && $email!="" && $phone!= "");
        {
        $query="INSERT INTO signup VALUES('$fname','$lname','$pwd','$cpwd','$email','$phone')";
        $data=mysqli_query($con,$query);

            if($data)
            {
                echo "<script> alert ('data inserted into database')</script>";
            }
            else
            {
                echo "failed";
            }
        }
    }
?> 
 
