<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="tailwind.js"></script>
</head>

<body>

    <div class="container">

        <header class="bg-blue-600 text-white p-4 px-6 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-xl font-bold mb-4 md:mb-0">Expense Tracker</h1>
            <nav class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
                <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
                <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
                <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
            </nav>
        </header>
        <div class="slider flex flex-col-reverse md:flex-row bg-gray-200">
            <div class="left flex flex-col justify-center items-center md:items-start py-12 w-full md:w-1/2">
                <p class="w-full md:w-3/4 mx-6 text-center md:text-left text-xl">This web-based application helps individuals and businesses manage their finances by tracking and summarizing expenses. Users can log their expenses, update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.</p>
                <button class="mt-6 text-white bg-green-500 px-4 mx-6 py-2 rounded-md font-bold hover:bg-green-600 transition duration-300"><a href="login.php">Start Now</a></button>
            </div>
            <div class="right w-full md:w-1/2 flex justify-center items-center">
                <img src="images/intro3.png" alt="Introduction Image" class="max-h-96 w-auto hover:scale-105 transition duration-300">
            </div>
        </div>

        <div class="promo py-4">
            <div class="container mx-auto">
                <h2 class="text-center text-3xl font-bold text-green-700 mb-6">Features our users love</h2>
            </div>
        </div>

        <div class="container h-44 px-4 mt-2  mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="h-44 bg-green-50 p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/1.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">User Authentication</p>
                <p class="text-md text-gray-600">Users can log in to their account and track their expenses on any device easily.</p>
            </div>
            <div class="h-44 bg-green-50 p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/3.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">Simple Money Tracker</p>
                <p class="text-md text-gray-600">It takes seconds to put expenses into clear and visualized categories such as Food, Shopping, Travel, etc.</p>
            </div>
            <div class="h-44 bg-green-50 p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/4.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">The Whole Picture in One Place</p>
                <p class="text-md text-gray-600">Get a clear view of spending patterns. Understand where your money goes with easy-to-read graphs.</p>
            </div>
        </div>
    
    </div>
</body>

</html>