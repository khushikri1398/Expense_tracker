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
            <h1 class="text-xl font-bold mb-4 md:mb-0 ">Expense Tracker</h1>
            <nav class="inline-flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
                <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
                <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
                <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
            </nav>
        </header>
        <div class="slider flex flex-col-reverse md:flex-row bg-[#f2f2f2] ">
            <div
                class="left flex flex-col justify-center items-center md:items-baseline py-12 relative w-full md:w-1/2">
                <p class="w-3/4 mx-6 text-center text-xl md:text-left relative z-10">This web-based application helps
                    individuals and
                    businesses manage their finances by tracking and summarizing expenses. Users can log their expenses,
                    update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.
                </p>
                <button class="text-white bg-green-500 px-4 py-2 my-6 rounded-md font-bold mx-7 relative z-10"><a
                        href="login.php">Start
                        Now </a></button>
            </div>
            <div class="right w-full md:w-1/2 flex justify-center items-center">
                <img src="images/intro3.png" alt="Introduction Image" class="max-h-96 w-auto">
            </div>
        </div>
        <div class="promo">
            <div class="item flex  my-4 mx-16 items-center justify-center font-serif font-medium text-green-700">
                <p class="text-4xl ">Features our users love </p>
            </div>
        </div>
        <div class="container  px-4 my-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="h-32 bg-white p-4 text-md expense-card">
                <p class="text-2xl py-2 font-semibold">Simple money tracker</p>
                <p class="text-md">It takes seconds to put expenses into clear and visualized categories such : Food,
                    Shopping, Travel etc.</p>
            </div>
            <div class="h-32 bg-white p-4 text-md expense-card">
                <p class="text-2xl py-2 font-semibold">The whole picture in one place</p>
                <p class="text-md">It give clear view on spending patterns. Understand where your money goes with easy-to-read graphs.</p>
            </div>
            <div class="h-32 bg-white p-4 text-md expense-card">
                <p class="text-2xl py-2 font-semibold">User authentication</p>
                <p class="text-md">Users can login into their account and track their expenses in any device easily.</p>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>