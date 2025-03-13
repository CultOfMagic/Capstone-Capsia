<?php
include 'db_connection.php'; // Include the database connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the username exists
    $sql = "SELECT * FROM accounts WHERE accountName = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['accountName'] = $row['accountName'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['ministry'] = $row['ministry'];

            // Redirect based on role
            if ($row['role'] == 'Admin') {
                header('Location: admin_dashboard.php'); // Replace with the actual admin dashboard page
            } else {
                header('Location: user_dashboard.php'); // Replace with the actual user dashboard page
            }
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username or email.";
    }
}
?>
