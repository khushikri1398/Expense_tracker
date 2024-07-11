<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Contact Us - Expense Tracker</title>
</head>

<body class="flex flex-col min-h-screen">
<header class="bg-blue-600 text-white p-4 px-6 flex flex-col md:flex-row justify-between items-center">
    <h1 class="text-xl font-bold mb-4 md:mb-0">Expense Tracker</h1>
    <nav class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
        <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
        <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
        <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
        <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
    </nav>
</header>
    <main class="bg-gray-100 flex-grow flex items-center justify-center">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>
            <form action="#" method="post">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2 text-center">Name:</label>
                    <input type="text" id="name" name="name"
                        class="shadow appearance-none rounded border-2 border-violet-300 w-full py-2 px-3 text-gray-700"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2 text-center">Email:</label>
                    <input type="email" id="email" name="email"
                        class="shadow appearance-none border-2 border-violet-300 rounded w-full py-2 px-3 text-gray-700"
                        required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-bold mb-2 text-center">Message:</label>
                    <textarea id="message" name="message" rows="4"
                        class="shadow appearance-none border-2 border-violet-300 rounded w-full py-2 px-3 text-gray-700"
                        required></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <input type="submit" value="Submit"
                        class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full active:bg-slate-700"
                        name="register" >
                </div>
            </form>
        </div>
    </main>
    <?php
include "footer.php";
?>
</body>

</html>
<?php
include ("connection.php");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if ($name != "" && $email != "" && $message != "") {
        $query = "INSERT INTO contact(name,email,message) VALUES ('$name','$email','$message')";
        $data = mysqli_query($con, $query);
        if ($data) {
            echo "<script>alert('We will reach you shortly');</script>";
        } else {
            echo "<script>alert('Failed');</script>";
        }
    }
}
?>
