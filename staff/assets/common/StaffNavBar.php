<?php

// Check if a session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if staff is logged in
if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php'); // Redirect to login page if not logged in
    exit;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../staff/assets/common/css/StaffNavBar.css">
</head>

<body>
    <div class="navbar">
        <!-- Logo / Name of the System -->
        <a href="staff_dashboard.php" class="logo">Staff Dashboard</a>

        <!-- Navigation Links -->
        <div class="nav-links">
            <a href="staff_dashboard.php">Home</a>
            <a href="manage_programs.php">Manage Programs</a>
            <a href="manage_courses.php">Manage Advocacy Campaigns</a>
        </div>

        <!-- Logout Button -->
        <a href="staff_logout.php" class="logout">Logout</a>
    </div>
</body>

</html>