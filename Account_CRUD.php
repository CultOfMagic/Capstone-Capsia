<?php
include 'db_connection.php'; // Include the database connection file

// Initialize variables for filtering and sorting
$sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'userId'; // Default sort by User ID
$searchQuery = isset($_GET['search']) ? $_GET['search'] : ''; // Search query

// Build the base SQL query
$sql = "SELECT * FROM accounts";

// Add search filter if a search query is provided
if (!empty($searchQuery)) {
    $searchQuery = $conn->real_escape_string($searchQuery);
    $sql .= " WHERE accountName LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR ministry LIKE '%$searchQuery%' OR role LIKE '%$searchQuery%'";
}

// Add sorting
$sql .= " ORDER BY $sortBy";

// Fetch accounts from the database
$result = $conn->query($sql);
$accounts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row; // Store each row in an array
    }
}

// Handle CRUD operations (Create, Update, Delete)
// Create (Add Account)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_account'])) {
    $accountName = $conn->real_escape_string($_POST['accountName']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash the password
    $role = $conn->real_escape_string($_POST['role']);
    $ministry = $conn->real_escape_string($_POST['ministry']);

    $sql = "INSERT INTO accounts (accountName, email, password, role, ministry) 
            VALUES ('$accountName', '$email', '$password', '$role', '$ministry')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Accounts.php"); // Redirect to the accounts page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update (Edit Account)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_account'])) {
    $userId = $conn->real_escape_string($_POST['userId']);
    $accountName = $conn->real_escape_string($_POST['accountName']);
    $email = $conn->real_escape_string($_POST['email']);
    $role = $conn->real_escape_string($_POST['role']);
    $ministry = $conn->real_escape_string($_POST['ministry']);

    $sql = "UPDATE accounts SET 
            accountName = '$accountName', 
            email = '$email', 
            role = '$role', 
            ministry = '$ministry' 
            WHERE userId = $userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: Admin_Accounts.php"); // Redirect to the accounts page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete (Delete Account)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_account'])) {
    $userId = $conn->real_escape_string($_POST['userId']);

    $sql = "DELETE FROM accounts WHERE userId = $userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: Admin_Accounts.php"); // Redirect to the accounts page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>