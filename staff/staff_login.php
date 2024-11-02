<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch staff details
    $stmt = $conn->prepare("SELECT * FROM staff_accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();
    $stmt->close();

    // Verify password
    if ($staff && password_verify($password, $staff['password'])) {
        // Set session variables
        $_SESSION['staff_id'] = $staff['staff_id'];
        $_SESSION['staff_name'] = $staff['staff_name'];
        $_SESSION['staff_logged_in'] = true; // New session flag to check if staff is logged in

        header('Location: staff_dashboard.php'); // Redirect to staff dashboard
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

<!-- HTML form for staff login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="../staff/assets/css/staff_login.css">
</head>
<body>
    <h2>Staff Login</h2>
    <form action="staff_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
