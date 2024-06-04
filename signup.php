<?php include ("connection.php");
include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="index-style.css">
    <title>Sign Up</title>
    <script>
        function validateForm() {
            var pwd = document.forms["signupForm"]["password"].value;
            var cpwd = document.forms["signupForm"]["conpassword"].value;
            if (pwd != cpwd) {
                alert("password and confirm password both should be same.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <form name="signupForm" action="#" method="POST" onsubmit="return validateForm()">
            <div class="title">
                Sign Up
            </div>
            <div class="Title">
                <h6>create a new account</h6>
            </div>
            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" placeholder="First Name" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" placeholder="Last Name" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" placeholder="Password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpassword" placeholder="Confirm Password" required>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" placeholder="abc@gmail.com" required>
                </div>
                <div class="input_field">
                    <label>Phone No</label>
                    <input type="text" class="input" name="phone" placeholder="+910000000000" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Sign Up" class="btn" name="register">
                </div>
                <div class="signup">Already have an account? <a href="login.php" class="link">Login Here</a></div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['conpassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if ($pwd != $cpwd) {
        echo "<script>alert('password and confirm password both should be same');</script>";
    } else {
        if ($fname != "" && $lname != "" && $pwd != "" && $cpwd!="" && $email != "" && $phone != "") {
            $query = "INSERT INTO signup (fname, lname, pass,conpassword, email, phone) VALUES ('$fname', '$lname', '$pwd', '$cpwd','$email', '$phone')";
            $data = mysqli_query($con, $query);

            if ($data) {
                echo "<script>alert('Signup Success, please login');</script>";
            } else {
                echo "<script>alert('Failed to insert data');</script>";
            }
        }
    }
}
include ("footer.php");
?>
