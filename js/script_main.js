function checkdelete() {
    return confirm('Are you sure you want to delete this expense?');
}

function filterCategory() {
    var dropdown = document.getElementById("categoryFilter");
    var table = document.getElementById("expenseTable");
    var rows = table.getElementsByTagName("tr");
    var selectedCategory = dropdown.value;

    for (var i = 1; i < rows.length; i++) {
        var categoryCell = rows[i].getElementsByTagName("td")[0];
        if (categoryCell) {
            var category = categoryCell.textContent;
            if (selectedCategory === "all" || category === selectedCategory) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}

function sortTable(columnIdx, tableId) {
    var table = document.getElementById(tableId);
    var rows = table.getElementsByTagName("tr");
    var sortOrder;

    if (columnIdx === 1) {
        sortOrder = document.getElementById("sortPrice").value;
    } else if (columnIdx === 3) {
        sortOrder = document.getElementById("sortDate").value;
    }

    if (sortOrder === "none") {
        return;
    }

    var sortedRows = Array.prototype.slice.call(rows, 1).sort(function(a, b) {
        var aVal = a.cells[columnIdx].textContent;
        var bVal = b.cells[columnIdx].textContent;

        if (columnIdx === 1) {
            aVal = parseFloat(aVal);
            bVal = parseFloat(bVal);
        } else if (columnIdx === 3) {
            aVal = new Date(aVal);
            bVal = new Date(bVal);
        }

        if (sortOrder === "asc") {
            return aVal - bVal;
        } else {
            return bVal - aVal;
        }
    });

    for (var i = 0; i < sortedRows.length; i++) {
        table.appendChild(sortedRows[i]);
    }
}

