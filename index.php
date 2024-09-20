<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="tailwind.js"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-200">

    <div class="flex-grow flex flex-col">

        <header class="bg-blue-600 text-white p-4 px-6 flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-xl font-bold mb-4 md:mb-0">Expense Tracker</h1>
            <nav class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                <a class="nav-link text-white hover:text-gray-200" href="index.php">Home</a>
                <a class="nav-link text-white hover:text-gray-200" href="signup.php">Signup</a>
                <a class="nav-link text-white hover:text-gray-200" href="login.php">Login</a>
                <a class="nav-link text-white hover:text-gray-200" href="about.php">Contact us</a>
            </nav>
        </header>

        <!-- New Welcome Section -->
        <div class="welcome relative bg-cover bg-center h-[70vh] flex items-center justify-center text-white"
            style="background-image: url('images/a.jpg');">
            <div
                class="welcome-overlay bg-black bg-opacity-70 p-6 md:p-8 rounded-lg shadow-lg text-center flex flex-col items-center gap-4 max-w-[90%] md:max-w-[60%]">
                <h2 class="text-3xl font-bold">Welcome to Expense Tracker</h2>
                <div class="text-lg">Discover a seamless way to manage your finances! From tracking daily expenses to
                    gaining insights with detailed summaries and charts.</div>
                <div class="enter mt-4">
                    <a href="login.php"
                        class="text-white bg-green-500 px-4 py-2 rounded-md font-bold hover:bg-green-600 transition duration-300">Start
                        Your Journey</a>
                </div>
            </div>
        </div>


        <div class="slider flex flex-col-reverse md:flex-row flex-grow bg-gray-200">
    <div class="left flex flex-col justify-center items-center md:items-start py-12 px-6 w-full md:w-1/2">
        <h2 class="text-3xl font-bold text-[#21512a] mb-4 w-full md:w-3/4 mx-6 text-center md:text-left">About Expense Tracker</h2>
        <p class="w-full md:w-3/4 mx-6 text-center md:text-left text-xl text-[#21512a] leading-relaxed">
            This web-based application helps individuals and businesses manage their finances by tracking and summarizing expenses. Users can log their expenses, update, delete, categorize them, and view detailed summaries and charts to analyze spending habits.
        </p>
    </div>
    <div class="right w-full md:w-1/2 flex justify-center items-center">
        <img src="images/intro3.png" alt="Introduction Image" class="max-h-96 w-auto rounded-lg shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out">
    </div>
</div>


        

        <div class="container h-44 px-4 mt-2 mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="h-44 bg-[#f0efef] p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/1.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">User Authentication</p>
                <p class="text-md text-gray-600">Users can log in to their account and track their expenses on any
                    device easily.</p>
            </div>
            <div
                class="h-44 bg-[#f0efef] p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/3.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">Simple Money Tracker</p>
                <p class="text-md text-gray-600">It takes seconds to put expenses into clear and visualized categories
                    such as Food, Shopping, Travel, etc.</p>
            </div>
            <div
                class="h-44 bg-[#f0efef] p-4 flex flex-col justify-center items-center rounded-md shadow-md transform transition duration-500 hover:scale-105">
                <img src="images/4.svg" class="h-full object-contain">
                <p class="text-2xl font-semibold text-green-700 mb-2">The Whole Picture in One Place</p>
                <p class="text-md text-gray-600">Get a clear view of spending patterns. Understand where your money goes
                    with easy-to-read graphs.</p>
            </div>
        </div>

    </div>
</body>

</html>
