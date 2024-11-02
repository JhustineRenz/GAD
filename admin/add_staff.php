<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_name = $_POST['staff_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO staff_accounts (staff_name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $staff_name, $username, $password);
    $stmt->execute();
    $stmt->close();

    header('Location: admin_dashboard.php'); // Redirect after creating the account
}
?>

<!-- HTML form for admin to create staff account -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link rel="stylesheet" href="../admin/assets/css/add_staff.css">
</head>
<body>
    <h2>Add Staff Account</h2>
    <form action="add_staff.php" method="POST">
        <label for="staff_name">Staff Name:</label>
        <input type="text" id="staff_name" name="staff_name" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Create Account">
    </form>
</body>
</html>
