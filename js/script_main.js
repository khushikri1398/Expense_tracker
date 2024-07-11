function checkdelete() {
    return confirm('Are you sure you want to delete this expense?');
}
document.addEventListener("DOMContentLoaded", function() {
    filterCategory();
    sortCards('date', 'desc');
});

function filterCategory() {
    var category = document.getElementById("categoryFilter").value;
    var cards = document.getElementsByClassName("expense-card");

    for (var i = 0; i < cards.length; i++) {
        if (category === "all" || cards[i].getAttribute("data-category") === category) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}

function sortCards(criteria, order) {
    var container = document.querySelector(".cards-container");
    var cards = Array.from(container.getElementsByClassName("expense-card"));

    cards.sort(function(a, b) {
        var aValue, bValue;

        if (criteria === "price") {
            aValue = parseFloat(a.getAttribute("data-amount"));
            bValue = parseFloat(b.getAttribute("data-amount"));
        } else if (criteria === "date") {
            aValue = new Date(a.getAttribute("data-date"));
            bValue = new Date(b.getAttribute("data-date"));
        }

        if (order === "asc") {
            return aValue - bValue;
        } else if (order === "desc") {
            return bValue - aValue;
        } else {
            return 0;
        }
    });

    cards.forEach(function(card) {
        container.appendChild(card);
    });
}
