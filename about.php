<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="CSS/style_update.css">
</head>

<body>
    <header class="header">
        <h1>Expense Tracker</h1>
    </header>
    <nav class="navbar">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="about.php">About</a>
        <a class="nav-link" href="signup.php">Sign Up</a>
        <a class="nav-link" href="login.php">Login</a>
    </nav>
    <main class="main">
        <section class="content">
            <div class="about">
                <h1 style="color:#4a5917">About Expense Tracker</h1>
                <h3>
                    This web-based application helps individuals and businesses manage their finances by tracking and summarizing expenses. Users can log their expenses, update, delete, categorize them, and view detailed summaries and charts to analyze spending habits. The application offers user authentication, data security, and a responsive interface for an efficient and user-friendly experience.
                </h3>
                <h3>
                    With these comprehensive features, Expense Tracker ensures efficient expense management and insightful financial analysis.
                </h3>
            </div>
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form action="#" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    
                    <div class="input_field">
                    <input type="submit" value="Submit" class="btn" name="register">
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
<?php
include("connection.php");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register'])) 
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    if($name!="" && $email!= ""&& $message!= "")
    {
        $query = "INSERT INTO contact(name,email,message) VALUES ('$name','$email','$message')";
        $data= mysqli_query($con,$query);
        if ($data) {
            echo "<script>alert('We will reach you shortly');</script>";
        } else {
            echo "<script>alert('Failed');</script>";
        }
    }
}
?>
<footer class="footer">
        <p> Copyright @ Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
</footer>

