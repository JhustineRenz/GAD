<?php
session_start();
require_once '../config.php';

// Check if staff is logged in
if (!isset($_SESSION['staff_logged_in']) || $_SESSION['staff_logged_in'] !== true) {
    header('Location: staff_login.php'); // Redirect to login page if not logged in
    exit;
}

// Fetch all programs
$programs_query = $conn->query("SELECT * FROM programs");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="../staff/assets/css/staff_dashboard.css">
</head>

<body>
    <!-- Navigation bar -->
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <div class="dashboard-container">
        <h1>Staff Dashboard - Summary View</h1>

        <!-- Programs Summary Section -->
        <div class="programs-summary">
            <h2>Programs Overview</h2>

            <!-- Display existing programs and their courses -->
            <div class="program-summary-list">
                <?php while ($program = $programs_query->fetch_array()) { ?>
                    <div class="program-summary-card">
                        <h3><?php echo $program['program_name']; ?></h3>
                        <!-- Courses under each program -->
                        <div class="courses-summary">
                            <h4>Courses:</h4>
                            <ul>
                                <?php
                                $courses_query = $conn->query("SELECT * FROM courses WHERE program_id = " . $program['program_id']);
                                if ($courses_query->num_rows > 0) {
                                    while ($course = $courses_query->fetch_array()) { ?>
                                        <li>
                                            <?php echo $course['course_name']; ?>
                                            <span>(<?php echo $course['course_date']; ?>)</span>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li>No courses available for this program.</li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>