<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$db = new mysqli('localhost', 'root', '', 'inventory');

$id = $_GET['id'];
$query = "UPDATE borrow_requests SET status = 'Approved' WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

header('Location: index.php');
?>