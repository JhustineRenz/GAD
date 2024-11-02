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
    <title>Manage Programs and Courses</title>
    <link rel="stylesheet" href="../staff/assets/css/manage_programs.css">
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css"> <!-- Include add_course_section styles -->
</head>

<body>
    <!-- Navigation bar -->
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <div class="manage-program-container">
        <h1>Manage Programs and Courses</h1>

        <!-- Programs Section -->
        <div class="programs-section">
            <h2>Programs List</h2>
            <a href="add_program.php" class="button add-program">Add New Program</a>

            <!-- Display existing programs and their courses -->
            <div class="program-list">
                <?php while ($program = $programs_query->fetch_array()) { ?>
                    <div class="program-card">
                        <h3><?php echo $program['program_name']; ?></h3>
                        <p><?php echo $program['program_desc']; ?></p>

                        <!-- Program Management Actions -->
                        <div class="actions">
                            <a href="edit_program.php?program_id=<?php echo $program['program_id']; ?>"
                                class="button edit">Edit</a>
                            <a href="delete_program.php?program_id=<?php echo $program['program_id']; ?>"
                                class="button delete">Delete</a>
                        </div>

                        <!-- Courses within each program -->
                        <div class="courses">
                            <h4>Courses under this program:</h4>
                            <ul>
                                <?php
                                $courses_query = $conn->query("SELECT * FROM courses WHERE program_id = " . $program['program_id']);
                                if ($courses_query->num_rows > 0) {
                                    while ($course = $courses_query->fetch_array()) { ?>
                                        <li>
                                            <a
                                                href="edit_course.php?course_id=<?php echo $course['course_id']; ?>"><?php echo $course['course_name']; ?></a>
                                            <span>(<?php echo $course['course_date']; ?>)</span>
                                            <div class="course-actions">
                                                <a href="edit_course.php?course_id=<?php echo $course['course_id']; ?>"
                                                    class="button edit">Edit</a>
                                                <a href="delete_course.php?course_id=<?php echo $course['course_id']; ?>"
                                                    class="button delete">Delete</a>
                                            </div>

                                            <!-- Manage Course Sections -->
                                            <div class="section-links">
                                                <a
                                                    href="add_introduction.php?course_id=<?php echo $course['course_id']; ?>">Introduction</a>
                                                <a
                                                    href="add_pre_test.php?course_id=<?php echo $course['course_id']; ?>">Pre-Test</a>
                                                <a href="add_learning_materials.php?course_id=<?php echo $course['course_id']; ?>">Learning
                                                    Materials</a>
                                                <a href="add_videos.php?course_id=<?php echo $course['course_id']; ?>">Videos</a>
                                                <a
                                                    href="add_post_test.php?course_id=<?php echo $course['course_id']; ?>">Post-Test</a>
                                                <a href="add_seminar.php?course_id=<?php echo $course['course_id']; ?>">Seminar</a>
                                            </div>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li>No courses available for this program.</li>
                                <?php } ?>
                            </ul>
                            <a href="add_course.php?program_id=<?php echo $program['program_id']; ?>"
                                class="button add-course">Add New Course</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>