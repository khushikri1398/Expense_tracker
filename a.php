<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Expense Tracker</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold text-blue-500">Expense Tracker</a>
            <nav class="space-x-4">
                <a href="index.php" class="text-gray-600 hover:text-blue-500">Home</a>
                <a href="features.php" class="text-gray-600 hover:text-blue-500">Features</a>
                <a href="contact.php" class="text-gray-600 hover:text-blue-500">Contact</a>
            </nav>
        </div>
    </header>
    <main class="flex flex-col items-center justify-center min-h-screen py-10">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-red-500 mb-4">Welcome to Expense Tracker</h2>
            <p class="text-green-500 mb-6">Track your expenses effortlessly and manage your finances better.</p>
            <div class="flex space-x-4">
                <a href="signup.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">Sign Up</a>
                <a href="login.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">Login</a>
                <a href="about.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 transition">About</a>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
