<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/css/Admin_Dashboard.css">
    <!-- Include Chart.js for visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logosec">
            <img src="./assets/img/Logo.png" class="icn menuicn" id="menuicn" alt="menu-icon" onclick="toggleSidebar()">
            <div class="logo">UCGS Inventory</div>
        </div>

        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search" oninput="filterTables()">
            <div class="searchbtn">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" 
                     class="icn srchicn" alt="search-icon">
            </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="notification-icon">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" 
                     class="dpicn" alt="profile-picture">
            </div>
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <div class="main-container">
        <div class="navcontainer" id="sidebar">
            <nav class="nav">
                <div class="nav-upper-options">
                    <a href="./Admin_Dashboard.php">
                    <div class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                             class="nav-img" alt="dashboard-icon">
                        <h3>Dashboard</h3>
                    </a>
                    </div>
                    <div class="nav-option">
                        <a href="./Admin_Items.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                             class="nav-img" alt="items-icon">
                        <h3>Items</h3>
                        </a>
                    </div>
                    <div class="nav-option">
                        <a href="">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
                             class="nav-img" alt="requests-icon">
                        <h3>Requests</h3>
                        </a>
                    </div>
                    <div class="nav-option">
                        <a href="./reportPHP/Admin_Report_InventorySummary.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                             class="nav-img" alt="reports-icon">
                        <h3>Reports</h3>
                        </a>
                    </div>
                    <div class="nav-option">
                        <a href="Admin_Accounts.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                             class="nav-img" alt="accounts-icon">
                        <h3>Accounts</h3>
                        </a>
                    </div>
                    <div class="nav-option logout">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                             class="nav-img" alt="logout-icon">
                        <h3>Logout</h3>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Dashboard Content -->
        <div class="main">
            <!-- Statistics Section -->
            <div class="stats-container">
                <div class="stat-box">
                    <h3>Total Items</h3>
                    <p>1,250</p>
                </div>
                <div class="stat-box">
                    <h3>Pending Requests</h3>
                    <p>8</p>
                </div>
                <div class="stat-box">
                    <h3>Approved Requests</h3>
                    <p>312</p>
                </div>
                <div class="stat-box">
                    <h3>Users</h3>
                    <p>47</p>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>

            <!-- Recent Items Added -->
<div class="report-container">
    <h3>Recent Items</h3>
    <table id="recentItemsTable">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Description</th>
                <th>Model No.</th>
                <th>Expiration</th>
                <th>Brand</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Item Name">Printer Ink</td>
                <td data-label="Description">Black Ink Cartridge</td>
                <td data-label="Model No.">HP123</td>
                <td data-label="Expiration">N/A</td>
                <td data-label="Brand">HP</td>
                <td data-label="Quantity">20</td>
            </tr>
            <tr>
                <td data-label="Item Name">Office Chair</td>
                <td data-label="Description">Ergonomic Chair</td>
                <td data-label="Model No.">CH-45</td>
                <td data-label="Expiration">N/A</td>
                <td data-label="Brand">IKEA</td>
                <td data-label="Quantity">5</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Pending Requests -->
<div class="report-container">
    <h3>Pending Requests</h3>
    <table id="pendingRequestsTable">
        <thead>
            <tr>
                <th>Request ID</th>
                <th>Item</th>
                <th>Requested By</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Request ID">REQ-1023</td>
                <td data-label="Item">Whiteboard Markers</td>
                <td data-label="Requested By">John Doe</td>
                <td data-label="Date">2024-02-12</td>
                <td data-label="Status">Pending</td>
            </tr>
            <tr>
                <td data-label="Request ID">REQ-1024</td>
                <td data-label="Item">Conference Table</td>
                <td data-label="Requested By">Jane Smith</td>
                <td data-label="Date">2024-02-11</td>
                <td data-label="Status">Pending</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Recent Transactions -->
<div class="report-container">
    <h3>Recent Transactions</h3>
    <table id="recentTransactionsTable">
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Item</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Transaction ID">TXN-3051</td>
                <td data-label="Item">HDMI Cables</td>
                <td data-label="Type">Issued</td>
                <td data-label="Quantity">10</td>
                <td data-label="Date">2024-02-10</td>
            </tr>
            <tr>
                <td data-label="Transaction ID">TXN-3052</td>
                <td data-label="Item">Paper Reams</td>
                <td data-label="Type">Received</td>
                <td data-label="Quantity">50</td>
                <td data-label="Date">2024-02-09</td>
            </tr>
        </tbody>
    </table>
</div>

    <script src="./assets/js/admin_dashboard.js"></script>
</body>
</html>