<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reports";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$db_check = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$result = $conn->query($db_check);

if ($result->num_rows == 0) {
    // Database does not exist, create it
    $create_db = "CREATE DATABASE $dbname";
    if ($conn->query($create_db) === TRUE) {
        echo "Database '$dbname' created successfully.<br>";
    } else {
        echo "Error creating database: " . $conn->error . "<br>";
    }
}

// Select the database
$conn->select_db($dbname);

// Check if the table exists
$table_name = "inventoryItems"; // Specify the table you want to check
$table_check = "SHOW TABLES LIKE '$table_name'";
$table_result = $conn->query($table_check);

if ($table_result->num_rows == 0) {
    // Table does not exist, create it
    $create_table = "
        CREATE TABLE $table_name (
        itemNo INT(100) AUTO_INCREMENT PRIMARY KEY,
        lastUpdated DATE NOT NULL,
        modelNo VARCHAR(100) NOT NULL,
        itemName VARCHAR(100) NOT NULL,
        itemDescription VARCHAR(100) NOT NULL,
        itemCategory VARCHAR(100) NOT NULL,
        itemLocation VARCHAR(100) NOT NULL,
        expiration DATE NOT NULL,
        brand VARCHAR(100) NOT NULL,
        supplier VARCHAR(100) NOT NULL,
        pricePerItem DECIMAL(10,2) NOT NULL,
        qty INT(10) NOT NULL,
        unit VARCHAR(100) NOT NULL,
        status VARCHAR(100) NOT NULL,
        reorderPoint INT(10) NOT NULL
    )";

    if ($conn->query($create_table) === TRUE) {
        echo "Table '$table_name' created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
} else {
    echo "Table '$table_name' already exists.<br>";
}

// Close connection
$conn->close();
?>