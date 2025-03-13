<?php
include 'Item_CRUD.php'; // Include the PHP CRUD logic
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Management</title>
    <link rel="stylesheet" href="User_Inventory.css">
</head>

<body>
    <!-- Header -->
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

    <!-- Sidebar Navigation -->
    <div class="container">
        <div class="sidebar">
            <ul>
                <?php echo renderNavOption('Dashboard', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png', 'dashboard-icon', 'User_Dashboard.php'); ?>
                <?php echo renderNavOption('Inventory', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png', 'items-icon', 'User_Inventory.php'); ?>
                <?php echo renderNavOption('Request', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png', 'report-icon', 'User_Request.php'); ?>
                <?php echo renderNavOption('Transaction', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png', 'report-icon', 'User_Transaction.php'); ?>
                <?php echo renderNavOption('Logout', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png', 'logout-icon', 'logout.php'); ?>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h2>Item Management</h2>
            <!-- Filter and Search Section -->
            <div class="search-container">
                <input type="text" placeholder="Search">
                <span class="icon">🔍</span>
            </div>
            <div class="custom-select">
                <select>
                    <option>Sort By</option>
                    <option value="itemNo">Item No.</option>
                    <option value="itemName">Item Name</option>
                    <option value="quantity">Quantity</option>
                </select>
            </div>

            <!-- Items Table -->
            <table>
                <thead>
                    <tr class="header-row">
                        <th>Item No.</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Model No.</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Expiration</th>
                        <th>Brand</th>
                        <th>Supplier</th>
                        <th>Price/Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($items)): ?>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['itemNo']); ?></td>
                                <td><?php echo htmlspecialchars($item['itemName']); ?></td>
                                <td><?php echo htmlspecialchars($item['description']); ?></td>
                                <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($item['unit']); ?></td>
                                <td><?php echo htmlspecialchars($item['modelNo']); ?></td>
                                <td><?php echo htmlspecialchars($item['itemCategory']); ?></td>
                                <td><?php echo htmlspecialchars($item['itemLocation']); ?></td>
                                <td><?php echo htmlspecialchars($item['expiration']); ?></td>
                                <td><?php echo htmlspecialchars($item['brand']); ?></td>
                                <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                                <td><?php echo htmlspecialchars($item['pricePerItem']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12">No items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="./assets/js/admin_accounts.js"></script>
</body>
</html>

<?php
// Helper function to render navigation options
function renderNavOption($title, $iconUrl, $altText, $link) {
    return "
    <li>
        <a href='$link'>
            <img src='$iconUrl' alt='$altText'>
            <span>$title</span>
        </a>
    </li>";
}
?>
