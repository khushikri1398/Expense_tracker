<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Index</title>
</head>

<body>
    <div class="container">
        <header class="bg-blue-600 text-white p-4 px-6 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-xl font-bold mb-4 md:mb-0">Expense Tracker</h1>
            <nav class="inline-flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
                <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
                <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
                <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
            </nav>
        </header>
        <div class="slider flex flex-col-reverse md:flex-row bg-[#f2f2f2] h-[613px]">
            <div class="left flex flex-col justify-center items-center md:items-baseline py-12 relative w-full md:w-1/2">
                <p class="w-3/4 mx-6 text-center text-xl md:text-left relative z-10">This web-based application helps individuals and
                    businesses manage their finances by tracking and summarizing expenses. Users can log their expenses,
                    update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.
                </p>
                <button class="text-white bg-green-500 px-4 py-2 my-6 rounded-md font-bold mx-7 relative z-10"><a href="login.php">Start
                        Now </a></button>
            </div>
            <div class="right w-full md:w-1/2 flex justify-center items-center">
                <img src="images/intro2.png" alt="Introduction Image" class="max-h-96 w-auto">
            </div>
        </div>
    </div>
    <?php
    include"footer.php";
    ?>
</body>

</html>
