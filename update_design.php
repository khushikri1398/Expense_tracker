<?php 
include("connection.php");
$id = $_GET['id'];
$query = "SELECT * FROM expense WHERE id='$id' ";
$data = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="tailwind.js"></script>
    <title>Update Expenses</title>
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
    <div class="flex justify-center items-center flex-grow">
    <div class="w-full max-w-md p-6 bg-white shadow-md rounded-md">
            <form name="expenseForm" action="#" method="POST">
                <div class="text-2xl font-semibold font-sans text-red-600 mb-4 text-center">Update Expenses</div>
                <div class="grid gap-6">
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select class="mt-1 block w-full p-2 border border-gray-300 rounded-md" name="category" required>
                            <option value="" disabled selected hidden>Select</option>
                            <option value="Shopping" <?php if($result['category'] == 'Shopping') echo 'selected'; ?>>Shopping</option>
                            <option value="Food" <?php if($result['category'] == 'Food') echo 'selected'; ?>>Food</option>
                            <option value="Education" <?php if($result['category'] == 'Education') echo 'selected'; ?>>Education</option>
                            <option value="Travel" <?php if($result['category'] == 'Travel') echo 'selected'; ?>>Travel</option>
                            <option value="Others" <?php if($result['category'] == 'Others') echo 'selected'; ?>>Others</option>
                        </select>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Amount</label>
                        <input type="number" value="<?php echo $result['amount'];?>" class="mt-1  w-full p-2 border border-gray-300 rounded-md" name="amount" required>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" value="<?php echo $result['descr'];?>" class="mt-1  w-full p-2 border border-gray-300 rounded-md" name="descr" required>
                    </div>
                    <div class="input_field">
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" value="<?php echo $result['date'];?>" class="mt-1  w-full p-2 border border-gray-300 rounded-md" name="date" required>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Update Expense" class="mt-2 w-full bg-blue-600 text-white p-2 rounded-md cursor-pointer hover:bg-blue-700" name="update">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="bg-blue-600 text-white mt-auto p-4">
        <p class="my-0 text-center">&copy; 2024 Expense Tracker. All rights reserved. | Contact Us: +9190000 00000</p>
    </footer>
</body>
</html>

<?php

$userprofile=$_SESSION['email'];

if($userprofile== true)
{

}
else
{
    header('Location: index.php');
}
?>
<?php
if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $amt= $_POST['amount'];
    $desc = $_POST['descr'];
    $date= $_POST['date'];

    if ($category!= "" && $amt != ""  && $desc!="" && $date!=="") {
        $query="UPDATE expense set category='$category', amount='$amt', descr='$desc', date='$date' WHERE id='$id'";
        $data = mysqli_query($con, $query);

        if ($data) {
            echo "<script>alert('Expense updated');</script>";
            header('Location: expense.php');
        } else {
            echo "<script>alert('Failed to update data');</script>";
        }
    }
}
?>
