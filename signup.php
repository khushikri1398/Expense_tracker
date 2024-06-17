<?php
include("connection.php");
include("header.php");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['conpassword'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if ($pwd != $cpwd) {
        echo "<script>alert('Password and confirm password both should be same');</script>";
    } else if (strlen($phone) != 10) {
        echo "<script>alert('Phone number must be exactly 10 digits');</script>";
    } else {
        if ($fname != "" && $lname != "" && $pwd != "" && $email != "" && $phone != "") {
            $emailCheckQuery = "SELECT * FROM signup WHERE email = ?";
            $stmt = $con->prepare($emailCheckQuery);
            $stmt->bind_param("s", $email); // Bind the email parameter
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script>alert('Email already exists, please use a different email');</script>";
            } else {
                $insertQuery = "INSERT INTO signup (fname, lname, pass, conpassword, email, phone) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($insertQuery);
                $stmt->bind_param("ssssss", $fname, $lname, $pwd, $cpwd, $email, $phone);

                if ($stmt->execute()) {
                    echo "<script>alert('Signup Success, please login');</script>";
                    header('Location: login.php');
                    exit();
                } else {
                    echo "<script>alert('Failed to insert data: " . $stmt->error . "');</script>";
                }

                $stmt->close();
            }
        } else {
            echo "<script>alert('All fields are required');</script>";
        }
    }
}
/*
? is a placeholder for the email parameter to be safely inserted.
"s" indicates that the parameter is a string.
bind_param method securely binds the user-provided email to the query, preventing SQL injection.
"ssssss" indicates that all six parameters are strings.
Securely binds the user-provided data to the query.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/index-style.css">
    <title>Sign Up</title>
    <script>
        function validateForm() {
            var pwd = document.forms["signupForm"]["password"].value;
            var cpwd = document.forms["signupForm"]["conpassword"].value;
            var phone = document.forms["signupForm"]["phone"].value;

            if (pwd != cpwd) {
                alert("Password and confirm password both should be same.");
                return false;
            }

            if (phone.length != 10) {
                alert("Phone number must be exactly 10 digits.");
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
                <h5>Create a new account</h5>
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
                    <label>Phone No</label>
                    <input type="text" class="input" name="phone" placeholder="1234567890" required>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" placeholder="abc@gmail.com" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" placeholder="Enter your password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpassword" placeholder="Confirm your password" required>
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
include("footer.php");
?>
