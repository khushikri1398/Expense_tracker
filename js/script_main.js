function checkdelete() {
    return confirm('Are you sure you want to delete this expense?');
}

function filterCategory() {
    var dropdown = document.getElementById("categoryFilter");
    var cards = document.querySelectorAll(".expense-card");
    var selectedCategory = dropdown.value;

    cards.forEach(function(card) {
        var category = card.dataset.category;
        if (selectedCategory === "all" || category === selectedCategory) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });
}

function sortCards(sortBy, order) {
    var container = document.querySelector(".cards-container");
    var cards = Array.prototype.slice.call(container.querySelectorAll(".expense-card"));

    cards.sort(function(a, b) {
        var aVal, bVal;

        if (sortBy === "price") {
            aVal = parseFloat(a.dataset.amount);
            bVal = parseFloat(b.dataset.amount);
        } else if (sortBy === "date") {
            aVal = new Date(a.dataset.date);
            bVal = new Date(b.dataset.date);
        }

        if (order === "asc") {
            return aVal - bVal;
        } else {
            return bVal - aVal;
        }
    });

    cards.forEach(function(card) {
        container.appendChild(card);
    });
}

document.getElementById("sortPrice").addEventListener("change", function() {
    var sortOrder = this.value;
    if (sortOrder !== "none") {
        sortCards("price", sortOrder);
    }
});

document.getElementById("sortDate").addEventListener("change", function() {
    var sortOrder = this.value;
    if (sortOrder !== "none") {
        sortCards("date", sortOrder);
    }
});
