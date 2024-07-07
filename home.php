<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/tailwind.js"></script>
    <title>Home</title>
</head>
<body>
    <nav class="bg-purple-800 text-white flex justify-between">
        <img src="images/logo2.png" class="w-20 py-1 px-2 rounded-3xl" alt="Logo">
        <ul class="px-24 py-4 flex space-x-11 justify-end">
            <li class="cursor-pointer"><a href="home.php">Home</a></li>
            <li class="cursor-pointer"><a href="signup.php">Signup</a></li>
            <li class="cursor-pointer"><a href="login.php">Login</a></li>
            <li class="cursor-pointer"><a href="about.php">About</a></li>
        </ul>
    </nav>
    <main class="bg-fuchsia-100 flex justify-between items-center py-20 px-10">
        <div class="main">
            <div class="text-5xl font-bold mb-6 text-red-400">
                Welcome to Expense Tracker
            </div>
            <div>
                <p class="py-3 max-w-md text-lg">
                    This web-based application helps individuals and businesses manage their finances by tracking and summarizing expenses. Users can log their expenses, update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.
                </p>
            </div>
        </div>
        <div class="flex items-center">
            <img src="images/intro.jpg" class="max-h-96 w-auto rounded-3xl" alt="Front Image">
        </div>
    </main>
    <footer class="bg-purple-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p class="mb-2">&copy; 2024 Expense Tracker. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
