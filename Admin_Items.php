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
    <link rel="stylesheet" href="./assets/css/Admin_Accounts.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logosec">
            <img src="./img/logo.png" class="icn menuicn" id="menuicn" alt="Menu Icon">
            <div class="logo">UCGS Inventory</div>
        </div>
        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="Notification Icon">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="Profile Picture">
            </div>
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <?php echo renderNavOption('Dashboard', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png', 'dashboard-icon', 'Admin_Dashboard.php'); ?>
                    <?php echo renderNavOption('Items', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png', 'items-icon', 'Admin_Items.php'); ?>
                    <?php echo renderNavOption('Reports', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png', 'report-icon', './reportPHP/Admin_Report_InventorySummary.php'); ?>
                    <?php echo renderNavOption('Accounts', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png', 'accounts-icon', 'Admin_Accounts.php'); ?>
                    <?php echo renderNavOption('Logout', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png', 'logout-icon', 'logout.php'); ?>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Filter and Search Section -->
            <div class="container">
                <div class="custom-select">
                    <select>
                        <option>Sort By</option>
                        <option value="itemNo">Item No.</option>
                        <option value="itemName">Item Name</option>
                        <option value="quantity">Quantity</option>
                        <option value="status">Status</option>
                    </select>
                </div>
            </div>
            <div class="search-container">
                <input type="text" placeholder="Search">
                <span class="icon">🔍</span>
            </div>
            <button class="add-btn" onclick="openAddModal()">Add Item</button>

            <!-- Items Table -->
            <table>
                <thead>
                    <tr class="header-row">
                        <th>Item No.</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Model No.</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Expiration</th>
                        <th>Brand</th>
                        <th>Supplier</th>
                        <th>Price/Item</th>
                        <th>Actions</th>
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
                                <td><?php echo htmlspecialchars($item['status']); ?></td>
                                <td><?php echo htmlspecialchars($item['modelNo']); ?></td>
                                <td><?php echo htmlspecialchars($item['itemCategory']); ?></td>
                                <td><?php echo htmlspecialchars($item['itemLocation']); ?></td>
                                <td><?php echo htmlspecialchars($item['expiration']); ?></td>
                                <td><?php echo htmlspecialchars($item['brand']); ?></td>
                                <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                                <td><?php echo htmlspecialchars($item['pricePerItem']); ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button onclick="openEditModal(<?php echo $item['itemNo']; ?>)">Edit</button>
                                    <!-- Delete Button -->
                                    <button onclick="openDeleteModal(<?php echo $item['itemNo']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="14">No items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Modals -->
        <!-- Add Item Modal -->
        <div id="addModal" class="modal">
            <div class="modal-content">
                <form id="addForm" method="POST" action="/CRUD/Item_CRUD.php">
                    <div class="form-group">
                        <label for="itemName">Item Name:</label>
                        <input type="text" id="itemName" name="itemName" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit:</label>
                        <input type="text" id="unit" name="unit" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Donated">Donated</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelNo">Model No.:</label>
                        <input type="text" id="modelNo" name="modelNo">
                    </div>
                    <div class="form-group">
                        <label for="itemCategory">Category:</label>
                        <input type="text" id="itemCategory" name="itemCategory">
                    </div>
                    <div class="form-group">
                        <label for="itemLocation">Location:</label>
                        <input type="text" id="itemLocation" name="itemLocation">
                    </div>
                    <div class="form-group">
                        <label for="expiration">Expiration:</label>
                        <input type="date" id="expiration" name="expiration">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand:</label>
                        <input type="text" id="brand" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="supplier">Supplier:</label>
                        <input type="text" id="supplier" name="supplier">
                    </div>
                    <div class="form-group">
                        <label for="pricePerItem">Price/Item (Php):</label>
                        <input type="number" step="0.01" id="pricePerItem" name="pricePerItem">
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" name="add_item" value="1">Add</button>
                        <button type="button" onclick="closeAddModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    <input type="hidden" id="editItemNo" name="itemNo">
                    <div class="form-group">
                        <label for="editItemName">Item Name:</label>
                        <input type="text" id="editItemName" name="itemName" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description:</label>
                        <input type="text" id="editDescription" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" id="editQuantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="editUnit">Unit:</label>
                        <input type="text" id="editUnit" name="unit" required>
                    </div>
                    <div class="form-group">
                        <label for="editStatus">Status:</label>
                        <select id="editStatus" name="status" required>
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                            <option value="Damaged">Damaged</option>
                            <option value="Donated">Donated</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editModelNo">Model No.:</label>
                        <input type="text" id="editModelNo" name="modelNo">
                    </div>
                    <div class="form-group">
                        <label for="editItemCategory">Category:</label>
                        <input type="text" id="editItemCategory" name="itemCategory">
                    </div>
                    <div class="form-group">
                        <label for="editItemLocation">Location:</label>
                        <input type="text" id="editItemLocation" name="itemLocation">
                    </div>
                    <div class="form-group">
                        <label for="editExpiration">Expiration:</label>
                        <input type="date" id="editExpiration" name="expiration">
                    </div>
                    <div class="form-group">
                        <label for="editBrand">Brand:</label>
                        <input type="text" id="editBrand" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="editSupplier">Supplier:</label>
                        <input type="text" id="editSupplier" name="supplier">
                    </div>
                    <div class="form-group">
                        <label for="editPricePerItem">Price/Item (Php):</label>
                        <input type="number" step="0.01" id="editPricePerItem" name="pricePerItem">
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" name="edit_item">Confirm</button>
                        <button type="button" onclick="closeEditModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    <input type="hidden" id="deleteItemNo" name="itemNo">
                    <p>Are you sure you want to delete this item?</p>
                    <div class="modal-buttons">
                        <button type="submit" name="delete_item">Delete</button>
                        <button type="button" onclick="closeDeleteModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/admin_accounts.js"></script>
</body>

</html>

<?php
// Helper function to render navigation options
function renderNavOption($title, $iconUrl, $altText, $link = '#') {
    return "
    <div class='nav-option'>
        <a href='$link'>
            <img src='$iconUrl' class='nav-img' alt='$altText'>
            <h3>$title</h3>
        </a>
    </div>";
}
?>