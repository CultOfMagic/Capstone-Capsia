<?php
header("Content-Type: application/json"); // Set response type to JSON

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "church_inventory"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all requests
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !isset($_GET['action'])) {
    $sql = "SELECT id, userName, type, timestamp, status FROM requests";
    $result = $conn->query($sql);

    $requests = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
    }

    echo json_encode($requests);
}

// Handle approve/reject actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    $action = $_GET['action'];
    $requestId = $_POST['requestId'];

    if ($action === 'approve' || $action === 'reject') {
        $status = $action === 'approve' ? 'approved' : 'rejected';
        $stmt = $conn->prepare("UPDATE requests SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $requestId);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Request $action successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to $action request."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid action."]);
    }
}

// Fetch request details
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'view') {
    $requestId = $_GET['requestId'];

    $stmt = $conn->prepare("SELECT * FROM requests WHERE id = ?");
    $stmt->bind_param("i", $requestId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $requestDetails = $result->fetch_assoc();
        echo json_encode($requestDetails);
    } else {
        echo json_encode(["success" => false, "message" => "Request not found."]);
    }

    $stmt->close();
}

$conn->close();
?>