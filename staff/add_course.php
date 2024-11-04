<?php
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $program_id = $_POST['program_id'];
    $course_name = $_POST['course_name'];
    $course_desc = $_POST['course_desc'];
    $course_date = $_POST['course_date'];

    $course_img = '';
    if (!empty($_FILES['course_img']['name'])) {
        $target_dir = "../staff/upload/";
        $target_file = $target_dir . basename($_FILES['course_img']['name']);
        if (move_uploaded_file($_FILES['course_img']['tmp_name'], $target_file)) {
            $course_img = $_FILES['course_img']['name'];
        }
    }

    $stmt = $conn->prepare("INSERT INTO courses (program_id, course_name, course_img, course_desc, course_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $program_id, $course_name, $course_img, $course_desc, $course_date);
    $stmt->execute();
    $stmt->close();

    header('Location: staff_dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course.css">
</head>
<body>
    <form action="add_course.php" method="POST" enctype="multipart/form-data">
        <h2>ADD COURSE</h2>

        <label for="program_id">Select Program:</label>
        <select id="program_id" name="program_id" required>
            <?php
            $result = $conn->query("SELECT program_id, program_name FROM programs");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['program_id'] . "'>" . $row['program_name'] . "</option>";
            }
            ?>
        </select>

        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>

        <label for="course_desc">Course Description:</label>
        <textarea id="course_desc" name="course_desc" required></textarea>

        <label for="course_img">Course Image:</label>
        <input type="file" id="course_img" name="course_img">

        <label for="course_date">Course Date:</label>
        <input type="date" id="course_date" name="course_date" required>

        <div class="button-container">
            <input type="submit" value="Add Course">
            <a href="staff_dashboard.php" class="back-button">Back</a>
        </div>
    </form>
</body>
</html>
