<?php
include 'db_connection.php'; // Include the database connection file

// Read (Fetch Items)
$sql = "SELECT * FROM Items";
$result = $conn->query($sql);
$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row; // Store each row in an array
    }
}
?>