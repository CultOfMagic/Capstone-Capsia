document.addEventListener("DOMContentLoaded", function () {
    // Sidebar Toggle
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
    }
    
    document.getElementById("menuicn").addEventListener("click", toggleSidebar);

    // Search Filter Function
    function filterTables() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let tables = document.querySelectorAll("table tbody");
        
        tables.forEach(tbody => {
            let rows = tbody.getElementsByTagName("tr");
            for (let row of rows) {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            }
        });
    }
    
    document.getElementById("searchInput").addEventListener("input", filterTables);

    // Chart Initialization
    const ctx = document.getElementById("myChart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Total Items", "Pending Requests", "Approved Requests", "Users"],
            datasets: [{
                label: "Statistics",
                data: [1250, 8, 312, 47],
                backgroundColor: ["#4CAF50", "#FF9800", "#2196F3", "#9C27B0"],
                borderColor: ["#388E3C", "#F57C00", "#1976D2", "#7B1FA2"],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
