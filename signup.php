<?php
include ("connection.php");

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
    <script src="tailwind.js"></script>
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
<header class="bg-blue-600 text-white p-4 px-6 flex flex-col md:flex-row justify-between items-center">
    <h1 class="text-xl font-bold mb-4 md:mb-0">Expense Tracker</h1>
    <nav class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
        <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
        <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
        <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
        <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
    </nav>
</header>
    <main class="bg-gray-100 flex items-center justify-center py-5">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-8 border-3 border-blue-400">
        <form name="signupForm" action="#" method="POST" onsubmit="return validateForm()">
        <h2 class="text-2xl font-bold mb-2 text-center text-green-600 font-serif">Sign up</h2>
            <div class="text-xl font-bold mb-2 text-center font-sans text-red-400">
                <h5>Create a new account</h5>
            </div>
            <div class="space-y-4">
                <div class="input_field">
                    <input type="text" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="fname" placeholder="Enter your first Name" required>
                </div>
                <div class="input_field">
                <input type="text" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="lname" placeholder="Enter your last Name" required>
                </div>
                <div class="input_field">
                <input type="text" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="phone" placeholder="Enter phone no" required>
                </div>
                <div class="input_field">
                <input type="email" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="email" placeholder="Enter your email id" required>
                </div>
                <div class="input_field">
                <input type="password" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="password" placeholder="Enter your password" required>
                </div>
                <div class="input_field">
                <input type="password" class="input w-full px-4 py-2 rounded-md border-2 border-violet-300" name="conpassword" placeholder="Confirm your password" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Sign Up" class=" w-full btn mx-30 bg-cyan-500 text-white text-lg px-4 py-2 rounded-md cursor-pointer hover:bg-blue-600" name="register">
                </div>
                <div class="signup text-center font-serif mt-4 text-purple-600">Already have an account? <a href="login.php" class="text-green-500 hover:underline">Login Here</a></div>
            </div>
        </form>
    </div>
    </main>
    <?php
include "footer.php";
?>
</body>

</html>
