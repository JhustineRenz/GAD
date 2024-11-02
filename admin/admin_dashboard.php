<?php
session_start();
require_once '../config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch all staff accounts
$staff_accounts_query = $conn->query("SELECT * FROM staff_accounts");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../admin/assets/css/admin_dashboard.css">
</head>
<body>
    <!-- Navigation bar -->
    <?php include '../admin/assets/common/AdminNavBar.php'; ?>

    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>

        <!-- Add Staff Section -->
        <div class="add-staff-section">
            <h2>Manage Staff Accounts</h2>
            <a href="add_staff.php" class="button add-staff">Add New Staff</a>

            <!-- Display existing staff accounts -->
            <div class="staff-list">
                <table>
                    <thead>
                        <tr>
                            <th>Staff Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($staff = $staff_accounts_query->fetch_array()) { ?>
                        <tr>
                            <td><?php echo $staff['staff_name']; ?></td>
                            <td><?php echo $staff['username']; ?></td>
                            <td>
                                <a href="edit_staff.php?staff_id=<?php echo $staff['staff_id']; ?>" class="button edit">Edit</a>
                                <a href="delete_staff.php?staff_id=<?php echo $staff['staff_id']; ?>" class="button delete">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
