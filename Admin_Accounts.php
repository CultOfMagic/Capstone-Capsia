<?php
include 'Account_CRUD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
    <link rel="stylesheet" href="./assets/css/Admin_Accounts.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logosec">
            <img src="./assets/img/Logo.png" class="icn menuicn" id="menuicn" alt="Menu Icon">
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
                    <?php echo renderNavOption('Reports', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png', 'report-icon', 'Admin_Report_InventorySummary.php'); ?>
                    <?php echo renderNavOption('Accounts', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png', 'accounts-icon', 'Accounts.php'); ?>
                    <?php echo renderNavOption('Logout', 'https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png', 'logout-icon', 'logout.php'); ?>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Filter and Search Section -->
            <div class="container">
                <div class="custom-select">
                    <form id="sortForm" method="GET" action="Account_CRUD.php">
                        <select name="sortBy" onchange="this.form.submit()">
                            <option value="userId" <?php echo ($sortBy == 'userId') ? 'selected' : ''; ?>>Sort By User ID</option>
                            <option value="accountName" <?php echo ($sortBy == 'accountName') ? 'selected' : ''; ?>>Sort By Name</option>
                            <option value="email" <?php echo ($sortBy == 'email') ? 'selected' : ''; ?>>Sort By Email</option>
                            <option value="role" <?php echo ($sortBy == 'role') ? 'selected' : ''; ?>>Sort By Role</option>
                            <option value="ministry" <?php echo ($sortBy == 'ministry') ? 'selected' : ''; ?>>Sort By Ministry</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="search-container">
                <form id="searchForm" method="GET" action="Accounts.php">
                    <input type="text" name="search" placeholder="Search" value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button type="submit" class="icon">🔍</button>
                </form>
            </div>
            <button class="add-btn" onclick="openAddModal()">Add Account</button>

            <!-- Accounts Table -->
            <table>
                <thead>
                    <tr class="header-row">
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Ministry</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($accounts)): ?>
                        <?php foreach ($accounts as $account): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($account['userId']); ?></td>
                                <td><?php echo htmlspecialchars($account['accountName']); ?></td>
                                <td><?php echo htmlspecialchars($account['email']); ?></td>
                                <td><?php echo htmlspecialchars($account['ministry']); ?></td>
                                <td><?php echo htmlspecialchars($account['role']); ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <button onclick="openEditModal(<?php echo $account['userId']; ?>)">Edit</button>
                                    <!-- Delete Button -->
                                    <button onclick="openDeleteModal(<?php echo $account['userId']; ?>)">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No accounts found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Modals -->
        <!-- Add Account Modal -->
        <div id="addModal" class="modal">
            <div class="modal-content">
                <form id="addForm" method="POST" action="Account_CRUD.php">
                    <div class="form-group">
                        <label for="accountName">Account Name:</label>
                        <input type="text" id="accountName" name="accountName" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div style="position: relative;">
                            <input type="password" id="password" name="password" required>
                            <button type="button" onclick="togglePasswordVisibility()" class="password-toggle">👁️</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ministry">Ministry:</label>
                        <select id="ministry" name="ministry" required>
                            <option value="youth">Youth</option>
                            <option value="choir">Choir</option>
                            <option value="women">CWA</option>
                            <option value="men">UCM</option>
                            <option value="pwt">Praise & Worship</option>
                        </select>
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" name="add_account" value="1">Add</button>
                        <button type="button" onclick="closeAddModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Account Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    <input type="hidden" id="editUserId" name="userId">
                    <div class="form-group">
                        <label for="editAccountName">Account Name:</label>
                        <input type="text" id="editAccountName" name="accountName" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email Address:</label>
                        <input type="email" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editRole">Role:</label>
                        <select id="editRole" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editMinistry">Ministry:</label>
                        <select id="editMinistry" name="ministry" required>
                            <option value="youth">Youth</option>
                            <option value="choir">Choir</option>
                            <option value="women">CWA</option>
                            <option value="men">UCM</option>
                            <option value="pwt">Praise & Worship</option>
                        </select>
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" name="edit_account">Confirm</button>
                        <button type="button" onclick="closeEditModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <form id="deleteForm" method="POST">
                    <input type="hidden" id="deleteUserId" name="userId">
                    <p>Are you sure you want to delete this account?</p>
                    <div class="modal-buttons">
                        <button type="submit" name="delete_account">Delete</button>
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