<?php
session_start();
// Add database connection here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History - UCCS Inventory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="User_Transaction.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logosec">
                <img src="./img/logo.png" class="icn menuicn" id="menuicn" alt="Menu Icon">
                <div class="logo">UCGS Inventory</div>
            </div>
            <div class="user-info">
                <div class="message">
                    <div class="circle"></div>
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="Notification Icon">
                </div>
                <div class="dp">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="Profile Picture">
                </div>
                <a href="logout.php" class="logout">Logout</a>
            </div>
        </header>

        <nav class="sidebar">
            <ul>
                <li>
                    <a href="User_Dashboard.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" alt="dashboard-icon">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="User_Inventory.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" alt="items-icon">
                        <span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="User_Request.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" alt="report-icon">
                        <span>Requests</span>
                    </a>
                </li>
                <li>
                    <a href="User_Transaction.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png" alt="accounts-icon">
                        <span>Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" alt="logout-icon">
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <main class="main-content">
            <div class="history-header">
                <h2>Transaction History</h2>
                <div class="history-controls">
                    <div class="search-box">
                        <input type="text" placeholder="Search transactions..." id="searchInput">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="filter-group">
                        <button class="filter-btn active">All</button>
                        <button class="filter-btn">Completed</button>
                        <button class="filter-btn">Pending</button>
                        <button class="filter-btn">Overdue</button>
                    </div>
                    <div class="date-filter">
                        <input type="date" id="startDate">
                        <span>to</span>
                        <input type="date" id="endDate">
                        <button class="apply-btn">Apply</button>
                    </div>
                </div>
            </div>

            <div class="transaction-table">
                <table>
                    <thead>
                        <tr>
                            <th data-sort="id">ID <i class="fas fa-sort"></i></th>
                            <th data-sort="item">Item <i class="fas fa-sort"></i></th>
                            <th data-sort="date">Date <i class="fas fa-sort"></i></th>
                            <th data-sort="type">Type <i class="fas fa-sort"></i></th>
                            <th>Quantity</th>
                            <th data-sort="return">Return Date <i class="fas fa-sort"></i></th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row -->
                        <tr data-status="completed">
                            <td>#1001</td>
                            <td>Projector</td>
                            <td>2024-03-15</td>
                            <td>Borrow</td>
                            <td>2</td>
                            <td>2024-03-20</td>
                            <td>
                                <span class="status-badge completed">
                                    <i class="fas fa-check-circle"></i> Completed
                                </span>
                            </td>
                            <td>
                                <button class="action-btn view-btn">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn print-btn">
                                    <i class="fas fa-print"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows with different statuses -->
                    </tbody>
                </table>

                <div class="table-footer">
                    <div class="entries-info">
                        Showing 1 to 10 of 50 entries
                    </div>
                    <div class="pagination">
                        <button class="page-btn prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <button class="page-btn next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>
