<?php
// Start session (add your authentication logic here)
session_start();
$username = "Lucy"; // Replace with dynamic username from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCCS Inventory Borrow System</title>
    <link rel="stylesheet" href="User_Request.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="header">
            <div class="logo">
                <h1>UCGS Inventory  </h1>
            </div>
            
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            
            <div class="user-info">
                <span>Welcome, <?php echo $username; ?>!</span>
                <a href="#" class="logout">Log Out</a>
            </div>
        </header>

        <!-- Navigation Sidebar -->
        <nav class="sidebar">
            <ul>
                <li><a href="User_Dashboard.php">Dashboard</a></li>
                <li><a href="User_Inventory.php" >Inventory</a></li>
                <li><a href="User_Request.php" class="active">Request Item</a></li>
                <li><a href="User_Transaction.php">Transsaction</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <h2>Borrow Request Form</h2>
            
            <form class="borrow-form" action="submit_request.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="item_name">Name of item</label>
                        <input type="text" id="item_name" name="item_name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="item_type">Consumable</label>
                        <select id="item_type" name="item_type">
                            <option value="consumable">Consumable</option>
                            <option value="non-consumable">Non-Consumable</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date_needed">Date needed</label>
                        <input type="date" id="date_needed" name="date_needed" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="return_date">Date of Return</label>
                        <input type="date" id="return_date" name="return_date" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                </div>

                <div class="form-group">
                    <label for="purpose">Enter the Purpose of Borrowing</label>
                    <textarea id="purpose" name="purpose" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes" rows="2"></textarea>
                </div>

                <button type="submit" class="borrow-button">BORROW</button>
            </form>
        </main>
    </div>
</body>
</html>