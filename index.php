<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Home</title>
    <style>
        body {
            margin-bottom: 0;
        }
    </style>
</head>
<body class="m-0">
    <nav class="bg-violet-500 text-white flex justify-between">
        <img src="images/logo2.png" class="w-20 py-1 px-2 rounded-3xl" alt="Logo">
        <ul class="px-20 py-4 flex space-x-11 justify-end text-xl">
            <li class="cursor-pointer text-lg"><a href="index.php">Home</a></li>
            <li class="cursor-pointer text-lg"><a href="signup.php">Signup</a></li>
            <li class="cursor-pointer text-lg"><a href="login.php">Login</a></li>
            <li class="cursor-pointer text-lg"><a href="about.php">Contact us</a></li>
        </ul>
    </nav>
    <main class="bg-gray-200-100 flex justify-between items-center py-28 px-14">
        <div class="main">
            <div class="text-5xl font-bold mb-6 text-red-400">
                Welcome to Expense Tracker
            </div>
            <div>
                <p class="py-3 max-w-lg text-lg">
                    This web-based application helps individuals and businesses manage their finances by tracking and summarizing expenses. Users can log their expenses, update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.
                </p>
            </div>
        </div>
        <div class="flex items-center">
            <img src="images/intro.jpg" class="max-h-96 w-auto rounded-3xl" alt="Front Image">
        </div>
    </main>
    <footer class="bg-violet-500 text-white py-3">
        <p class="my-0 text-center">&copy; 2024 Expense Tracker. All rights reserved.</p>
    </footer>
</body>
</html>
