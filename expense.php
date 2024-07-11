<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
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

    <div class="sort-filter-container text-center my-4 ">
        <h2 class="text-2xl font-semibold mb-4">Displaying all Expenses</h2>
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
            echo "<div class='bg-white p-4 rounded-lg shadow-md expense-card' data-category='" . $result['category'] . "' data-amount='" . $result['amount'] . "' data-date='" . $result['date'] . "'>
                    <h3 class='text-lg font-semibold mb-2 expense-category'>" . $result['category'] . "</h3>
                    <p class='mb-2 expense-amount'>Amount:₹" . $result['amount'] . "</p>
                    <p class='mb-2'>Description:" . $result['descr'] . "</p>
                    <p class='mb-2 expense-date'>Date: " . $result['date'] . "</p>
                    <div class='flex space-x-2'>
                        <a href='update_design.php?id=" . $result['id'] . "' class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600'>Update</a>
                        <a href='delete.php?id=" . $result['id'] . "' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600' onclick='return checkdelete()'>Delete</a>
                    </div>
                </div>";
        }
        echo '</div>';
    } else {
        echo "<p class='text-center'>No record Found</p>";
    }
    ?>

    <?php
    include "footer.php";
    ?>

</body>

</html>