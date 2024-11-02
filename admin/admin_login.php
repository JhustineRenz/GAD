<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch admin details from the database
    $stmt = $conn->prepare("SELECT * FROM admin_accounts WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    // Verify the password
    if ($admin && password_verify($password, $admin['password'])) {
        // Set session variables for admin
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_name'] = $admin['admin_name'];

        // Redirect to admin dashboard
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!-- HTML form for admin login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../admin/assets/css/admin_login.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Display error message if login fails -->
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
