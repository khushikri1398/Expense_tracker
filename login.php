<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Login</title>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
<nav class="bg-violet-500 text-white flex justify-between">
        <img src="images/logo2.png" class="w-20 py-1 px-2 rounded-3xl" alt="Logo">
        <ul class="px-20 py-4 flex space-x-11 justify-end text-xl">
            <li class="cursor-pointer text-lg"><a href="index.php">Home</a></li>
            <li class="cursor-pointer text-lg"><a href="signup.php">Signup</a></li>
            <li class="cursor-pointer text-lg"><a href="login.php">Login</a></li>
            <li class="cursor-pointer text-lg"><a href="about.php">Contact us</a></li>
        </ul>
    </nav>

    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold mb-4 text-center text-green-600">Login</h1>
            <form action="#" method="POST">
                <div class="space-y-4">
                    <input type="text" name="username" class="w-full px-4 py-2 border-2 border-violet-300 rounded-md" placeholder="Enter your Email Address">
                    <input type="password" name="password" class="w-full px-4 py-2 border-2 border-violet-300 rounded-md" placeholder="Password">
                    <div class="text-right">
                        <a href="#" class="text-sm text-blue-500 hover:underline" onclick="message()">Forget Password?</a>
                    </div>
                    <input type="submit" name="login" value="Login" class="w-full bg-green-500 text-white text-md px-4 py-2 rounded-md cursor-pointer hover:bg-green-600">
                </div>
            </form>
            <div class="mt-4 text-center">
                <span class="text-gray-600">New Member?</span>
                <a href="signup.php" class="text-blue-500 hover:underline">Signup Here</a>
            </div>
        </div>
    </main>

    <footer class="bg-violet-500 text-white py-3 text-center">
        <p class="my-0">&copy; 2024 Expense Tracer. All Rights Reserved | Contact Us: +9190000 00000</p>
    </footer>

    <script>
        function message() {
            alert("Remember your password at least.");
        }
    </script>
</body>

</html>

<?php
include("connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM signup WHERE email='$username' AND pass='$pwd'";
    $data = mysqli_query($con, $query);

    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $_SESSION['email'] = $username;
        echo "<script>alert('Login success.');</script>";
        header('Location: expense.php');
    } else {
        echo "<script>alert('Login failed.');</script>";
    }
}
?>
