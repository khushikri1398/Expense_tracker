function filterCategory() {
    var dropdown = document.getElementById("categoryFilter");
    var table = document.getElementById("categoryTable");
    var rows = table.getElementsByTagName("tr");
    var selectedCategory = dropdown.value;

    for (var i = 1; i < rows.length; i++) {
        var categoryCell = rows[i].getElementsByTagName("td")[0];
        //The first <td> element of the current row is assigned to the variable categoryCell.
        if (categoryCell) {
            var category = categoryCell.textContent;
            if (selectedCategory === "all" || category === selectedCategory) {
                rows[i].style.display = "";
                //An empty string for the display property means that the row will revert to its default display value.
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}
//The loop starts from 1 instead of 0 because 0 is typically the header row.

function sortCategoryTable() {
    sortTable("categoryTable", "sortOrderCategory", 1);
}

function sortMonthlyTable() {
    sortTable("monthlyTable", "sortOrderMonthly", 2);
}

function sortYearlyTable() {
    sortTable("yearlyTable", "sortOrderYearly", 1);
}

function sortdailyallTable() {
    sortTable("dailyallTable", "sortOrderdailyall", 1);
}

function sortTable(tableId, sortOrderId, columnIdx) {
    var table = document.getElementById(tableId);
    var rows = table.getElementsByTagName("tr");
    var sortOrder = document.getElementById(sortOrderId).value;
    //Retrieves the element (usually a dropdown) that contains the sort order.
    //.value: Gets the selected value (either "asc" for ascending or "desc" for descending).

    var sortedRows = Array.prototype.slice.call(rows, 1).sort(function(a, b)//a and b, which represent two rows being compared during the sort operation.
    //Array.prototype.slice is used to convert the rows HTMLCollection into a true array, starting from the second row. 
    {
        var aAmount = parseFloat(a.cells[columnIdx].textContent);
        var bAmount = parseFloat(b.cells[columnIdx].textContent);
        return sortOrder === "asc" ? aAmount - bAmount : bAmount - aAmount;
    });
        //Converts the text content of the cell to a floating-point number, which is necessary for numeric comparison.
        //a and b are two rows being compared.
    for (var i = 0; i < sortedRows.length; i++) {
        table.appendChild(sortedRows[i]);
    }
    //table.appendChild(sortedRows[i]) reattaches each sorted row back to the table, effectively updating the table’s row order.
    // it appends each row from sortedRows back into the table.
}
