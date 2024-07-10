<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Contact Us - Expense Tracker</title>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="bg-violet-500 text-white flex justify-between">
        <img src="images/logo2.png" class="w-20 py-1 px-2 rounded-3xl" alt="Logo">
        <ul class="px-20 py-4 flex space-x-11 justify-end text-xl">
            <li class="cursor-pointer"><a href="index.php">Home</a></li>
            <li class="cursor-pointer"><a href="signup.php">Signup</a></li>
            <li class="cursor-pointer"><a href="login.php">Login</a></li>
            <li class="cursor-pointer"><a href="about.php">Contact us</a></li>
        </ul>
    </nav>
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
    <footer class="bg-violet-500 text-white py-3">
            <p class="my-0 text-center">&copy; 2024 Expense Tracker. All rights reserved.</p>
    </footer>
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
