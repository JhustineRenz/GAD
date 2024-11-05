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

<div class="sidebar" id="sidebar">
    <!-- Logo / Name of the System -->
    <a href="staff_dashboard.php" class="logo">Staff Dashboard</a>

    <!-- Navigation Links -->
    <ul class="menu">
        <li><a href="staff_dashboard.php" class="menu-item">Home</a></li>
        <li><a href="manage_programs.php" class="menu-item">Manage Programs</a></li>
        <li><a href="manage_advocacy_campaign.php" class="menu-item">Manage Advocacy Campaigns</a></li>
    </ul>

    <!-- Logout Button -->
    <a href="staff_logout.php" class="logout">Logout</a>
</div>

<!-- Sidebar Toggle Button -->
<div class="sidebar-toggle" id="sidebar-toggle"></div>