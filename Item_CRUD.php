<?php
include 'db_connection.php'; // Include the database connection file

// Create (Add Item)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_item'])) {
    // Get and escape the input data
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $description = $conn->real_escape_string($_POST['description']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $unit = $conn->real_escape_string($_POST['unit']);
    $status = $conn->real_escape_string($_POST['status']);
    $modelNo = $conn->real_escape_string($_POST['modelNo']);
    $itemCategory = $conn->real_escape_string($_POST['itemCategory']);
    $itemLocation = $conn->real_escape_string($_POST['itemLocation']);
    $expiration = !empty($_POST['expiration']) ? "'" . $conn->real_escape_string($_POST['expiration']) . "'" : "NULL"; // Handle NULL for expiration
    $brand = $conn->real_escape_string($_POST['brand']);
    $supplier = $conn->real_escape_string($_POST['supplier']);
    $pricePerItem = $conn->real_escape_string($_POST['pricePerItem']);

    // Insert the new item into the database
    $sql = "INSERT INTO Items (itemName, description, quantity, unit, status, modelNo, itemCategory, itemLocation, expiration, brand, supplier, pricePerItem) 
            VALUES ('$itemName', '$description', '$quantity', '$unit', '$status', '$modelNo', '$itemCategory', '$itemLocation', $expiration, '$brand', '$supplier', '$pricePerItem')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        header("Location: Admin_Items.php"); // Redirect to the items page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read (Fetch Items)
$sql = "SELECT * FROM Items";
$result = $conn->query($sql);
$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row; // Store each row in an array
    }
}

// Update (Edit Item)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_item'])) {
    $itemNo = $conn->real_escape_string($_POST['itemNo']);
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $description = $conn->real_escape_string($_POST['description']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $unit = $conn->real_escape_string($_POST['unit']);
    $status = $conn->real_escape_string($_POST['status']);
    $modelNo = $conn->real_escape_string($_POST['modelNo']);
    $itemCategory = $conn->real_escape_string($_POST['itemCategory']);
    $itemLocation = $conn->real_escape_string($_POST['itemLocation']);
    $expiration = !empty($_POST['expiration']) ? "'" . $conn->real_escape_string($_POST['expiration']) . "'" : "NULL"; // Handle NULL for expiration
    $brand = $conn->real_escape_string($_POST['brand']);
    $supplier = $conn->real_escape_string($_POST['supplier']);
    $pricePerItem = $conn->real_escape_string($_POST['pricePerItem']);

    // Build the UPDATE query
    $sql = "UPDATE Items SET 
            itemName = '$itemName', 
            description = '$description', 
            quantity = '$quantity', 
            unit = '$unit', 
            status = '$status', 
            modelNo = '$modelNo', 
            itemCategory = '$itemCategory', 
            itemLocation = '$itemLocation', 
            expiration = $expiration, 
            brand = '$brand', 
            supplier = '$supplier', 
            pricePerItem = '$pricePerItem' 
            WHERE itemNo = $itemNo";

    // Debugging: Print the query to check for syntax errors
    echo "Query: " . $sql . "<br>";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("Location: Admin_Items.php"); // Redirect to the items page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete (Delete Item)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_item'])) {
    $itemNo = $conn->real_escape_string($_POST['itemNo']);

    $sql = "DELETE FROM Items WHERE itemNo = $itemNo";

    if ($conn->query($sql) === TRUE) {
        header("Location: Admin_Items.php"); // Redirect to the items page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>