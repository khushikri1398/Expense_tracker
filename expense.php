<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
    <script src="js/font.js"></script>
    <script src="tailwind.js"></script>
    <script src="js/script_main.js"></script>
</head>

<body class="bg-gray-100">

    <?php
    include "connection.php";
    include "header.php";
    $userprofile = $_SESSION['email'];

    if ($userprofile == true) {
    } else {
        header('Location: index.php');
    }

    $query = "SELECT DISTINCT category FROM expense WHERE email='$userprofile'";
    $categories = mysqli_query($con, $query);

    $query_expenses = "SELECT * FROM expense WHERE email='$userprofile'";
    $data = mysqli_query($con, $query_expenses);
    $total = mysqli_num_rows($data);
    ?>

    <div class="sort-filter-container text-center my-4">
        <h2 class="text-3xl font-bold mb-4 text-purple-700">Displaying all Expenses</h2>
        <div class="inline-flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0">
            <select id="categoryFilter" onchange="filterCategory()" class="p-2 rounded border border-gray-300">
                <option value="all">All Categories</option>
                <?php
                while ($category = mysqli_fetch_assoc($categories)) {
                    echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
                }
                ?>
            </select>
            
            <select id="sortPrice" onchange="sortCards('price', this.value)" class="p-2 rounded border border-gray-300">
                <option value="none">Sort by Price</option>
                <option value="asc">Low to High</option>
                <option value="desc">High to Low</option>
            </select>
            
            <select id="sortDate" onchange="sortCards('date', this.value)" class="p-2 rounded border border-gray-300">
                <option value="none">Sort by Date</option>
                <option value="asc">Oldest to Newest</option>
                <option value="desc">Newest to Oldest</option>
            </select>
        </div>
    </div>
    
    <?php
    if ($total != 0) {
        echo '<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4 cards-container">';
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<div class='bg-white p-6 rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 expense-card' data-category='" . $result['category'] . "' data-amount='" . $result['amount'] . "' data-date='" . $result['date'] . "'>
                    <h3 class='text-xl font-semibold mb-2 text-blue-600 flex items-center expense-category'><i class='fas fa-tags mr-2'></i>" . $result['category'] . "</h3>
                    <p class='mb-2 text-green-600 flex items-center expense-amount'><i class='fas fa-rupee-sign mr-2'></i>₹" . $result['amount'] . "</p>
                    <p class='mb-4 text-gray-700 flex items-center'><i class='fas fa-file-alt mr-2'></i>" . $result['descr'] . "</p>
                    <p class='mb-4 text-gray-500 flex items-center expense-date'><i class='fas fa-calendar-alt mr-2'></i>" . $result['date'] . "</p>
                    <div class='flex space-x-2'>
                        <a href='update_design.php?id=" . $result['id'] . "' class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center'><i class='fas fa-edit mr-1'></i>Update</a>
                        <a href='delete.php?id=" . $result['id'] . "' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 flex items-center' onclick='return checkdelete()'><i class='fas fa-trash-alt mr-1'></i>Delete</a>
                    </div>
                </div>";
        }
        echo '</div>';
    } else {
        echo "<p class='text-center text-xl font-bold mb-4 text-red-700'>No record Found, Add your Expenses.
        <button class='mt-2 text-white text-base bg-green-500 px-4 mx-2 py-2 rounded-md font-bold hover:bg-green-600 transition duration-300'><a href='expense_form.php'>Add</a></button>
        </p>";
    }
    ?>

</body>

</html>
