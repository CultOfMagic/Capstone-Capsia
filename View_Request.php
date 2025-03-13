<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$db = new mysqli('localhost', 'root', '', 'inventory');

$id = $_GET['id'];
$query = "SELECT * FROM borrow_requests WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$request = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
</head>
<body>
    <h1>Request Details</h1>
    <p>User: <?= $request['username'] ?></p>
    <p>Item: <?= $request['item_name'] ?></p>
    <p>Quantity: <?= $request['quantity'] ?></p>
    <p>Purpose: <?= $request['purpose'] ?></p>
    <p>Status: <?= $request['status'] ?></p>
    <a href="index.php">Back to Dashboard</a>
</body>
</html>