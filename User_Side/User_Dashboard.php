<?php
session_start();
$username = "Lucy"; // Replace with dynamic username from session

// Dummy request data
$requests = [
    [
        'id' => 1001,
        'item' => 'Projector',
        'date' => '2024-03-15',
        'status' => 'Pending',
        'quantity' => 2,
        'purpose' => 'Class presentation'
    ],
    [
        'id' => 1002,
        'item' => 'Laptop',
        'date' => '2024-03-16',
        'status' => 'Approved',
        'quantity' => 1,
        'purpose' => 'Research work'
    ],
    [
        'id' => 1003,
        'item' => 'Lab Equipment',
        'date' => '2024-03-17',
        'status' => 'Rejected',
        'quantity' => 5,
        'purpose' => 'Experiment setup'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Dashboard - UCCS Inventory</title>
    <link rel="stylesheet" href="User_Dashboard.css">
</head>
<body>
    <div class="container">
       
        <header class="header">
        <div class="logosec">
            <img src="./img/logo.png" class="icn menuicn" id="menuicn" alt="Menu Icon">
            <div class="logo">UCGS Inventory</div>
        </div>
        <div class="user-info">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="Notification Icon">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="Profile Picture">
            </div>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </header>        
        <nav class="sidebar">
            <ul>
                <li><a href="User_Dashboard.php" class="active">User Dashboard</a></li>
                <li><a href="User_Inventory.php">Inventory</a></li>
                <li><a href="User_Request.php">Request</a></li>
                <li><a href="User_Transaction.php">Transaction</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <div class="dashboard-header">
                <h2>Request Management</h2>
                <div class="request-stats">
                    <div class="stat-card">
                        <h3>Pending Requests</h3>
                        <p class="stat-value">3</p>
                    </div>
                    <div class="stat-card">
                        <h3>Approved This Month</h3>
                        <p class="stat-value">12</p>
                    </div>
                    <div class="stat-card">
                        <h3>Total Requests</h3>
                        <p class="stat-value">45</p>
                    </div>
                </div>
            </div>

            <div class="request-overview">
                <div class="chart-container">
                    <h3>Request Status Distribution</h3>
                    <div class="status-chart">
                        <!-- Add chart here (e.g., Chart.js) -->
                        <div class="chart-placeholder"></div>
                    </div>
                </div>
                
                <div class="quick-actions">
                    <h3>Quick Actions</h3>
                    <a href="User_Request.php" class="new-request-btn">+ New Request</a>
                </div>
            </div>

            <div class="recent-requests">
                <h3>Recent Requests</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($requests as $request): ?>
                        <tr>
                            <td><?= $request['item'] ?></td>
                            <td><?= $request['date'] ?></td>
                            <td><?= $request['quantity'] ?></td>
                            <td><?= $request['purpose'] ?></td>
                            <td>
                                <span class="status-badge <?= strtolower($request['status']) ?>">
                                    <?= $request['status'] ?>
                                </span>
                            </td>
                            <td>
                                <button class="view-btn">View</button>
                                <button class="cancel-btn">Cancel</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>