<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'ucgs_inventory';
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username = $_SESSION['username']; // Replace with dynamic username from session
$item_name = $_POST['item_name'];
$item_type = $_POST['item_type'];
$date_needed = $_POST['date_needed'];
$return_date = $_POST['return_date'];
$quantity = $_POST['quantity'];
$purpose = $_POST['purpose'];
$notes = $_POST['notes'];

// Insert data into the database
$sql = "INSERT INTO borrow_requests (username, item_name, item_type, date_needed, return_date, quantity, purpose, notes)
        VALUES ('$username', '$item_name', '$item_type', '$date_needed', '$return_date', $quantity, '$purpose', '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "Request submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: User_Transaction.php"); // Redirect to the transactions page
exit();
?>
