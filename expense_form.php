<?php 
include("connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Expense Form</title>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Expense Tracker</h1>
        <nav class="flex space-x-4">
            <a class="text-white hover:text-gray-200" href="expense_form.php">Add Expenses</a>
            <a class="text-white hover:text-gray-200" href="expense.php">Expenses</a>
            <a class="text-white hover:text-gray-200" href="expense_fetch.php">Expenses Summary</a>
            <a class="text-white hover:text-gray-200" href="chart.php">Graphs</a>
            <a class="text-white hover:text-gray-200" href="logout.php">Logout</a>
        </nav>
    </header>
    <div class="flex justify-center items-center flex-grow m-4">
        <div class="w-full max-w-md p-6 bg-white shadow-md rounded-md">
            <form name="expenseForm" action="#" method="POST">
                <div class="text-2xl font-semibold mb-4">Add Expenses</div>
                <div class="grid gap-6">
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="category" required>
                            <option value="" disabled selected hidden>Select</option>
                            <option value="Shopping">Shopping</option>
                            <option value="Food">Food</option>
                            <option value="Education">Education</option>
                            <option value="Travel">Travel</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="amount" required>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="descr" required>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="date" required>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Add Expense" class="mt-2 w-full bg-blue-600 text-white p-2 rounded-md cursor-pointer hover:bg-blue-700" name="register">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-blue-600 text-white mt-auto p-4">
        <p class="my-0 text-center">&copy; 2024 Expense Tracker. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
error_reporting(0);

$userprofile=$_SESSION['email'];
if($userprofile == true)
{

}
else
{
    header('Location: index.php');
}
?>
<?php
if (isset($_POST['register'])) {
    $category = $_POST['category'];
    $amt= $_POST['amount'];
    $desc = $_POST['descr'];
    $date= $_POST['date'];

    if ($category!= "" && $amt != ""  && $desc!="" && $date!=="") {
        $query = "INSERT INTO expense (email,category,amount,descr,date) VALUES ('$userprofile','$category', '$amt', '$desc', '$date')";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('expense added');</script>";
            header('Location: expense.php');
        } else {
            echo "<script>alert('Failed to insert data');</script>";
        }
    }
}
?>
