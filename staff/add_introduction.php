<?php
include '../config.php';
session_start();

// Check if staff is logged in
if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;
$referrer = $_GET['ref'] ?? 'manage_programs.php'; // Default to manage_programs.php if ref is not set

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $section_content = $_POST['section_content'];

    // Check if introduction already exists
    $query = "SELECT course_id FROM course_sections WHERE course_id = ? AND section_name = 'Introduction'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update introduction
        $update_query = "UPDATE course_sections SET section_content = ? WHERE course_id = ? AND section_name = 'Introduction'";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("si", $section_content, $course_id);
    } else {
        // Insert new introduction
        $insert_query = "INSERT INTO course_sections (course_id, section_name, section_content) VALUES (?, 'Introduction', ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("is", $course_id, $section_content);
    }

    if ($stmt->execute()) {
        $success_message = "Introduction updated successfully!";
    } else {
        $error_message = "Failed to update the introduction.";
    }
} elseif (isset($_POST['back'])) {
    // Redirect to the referrer page
    header("Location: $referrer");
    exit();
}

// Fetch the current introduction content
$intro_query = "SELECT section_content FROM course_sections WHERE course_id = ? AND section_name = 'Introduction'";
$stmt = $conn->prepare($intro_query);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();
$current_intro = $result->fetch_assoc()['section_content'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Introduction</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css?v=1.0">
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1>EDIT COURSE INTRODUCTION</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <textarea name="section_content" rows="10" cols="100"><?php echo htmlspecialchars($current_intro); ?></textarea><br>
        <div class="button-container">
            <button type="submit" name="save">Save Introduction</button>
            <button type="submit" name="back">Back</button>
        </div>
        <!-- Hidden input to pass the referrer value with POST -->
        <input type="hidden" name="referrer" value="<?php echo htmlspecialchars($referrer); ?>">
    </form>
</body>
</html>
