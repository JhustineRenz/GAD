<?php
include '../config.php';
session_start();

if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['learning_file'])) {
    $file = $_FILES['learning_file'];
    $target_dir = "../staff/upload/learning_materials/";
    $target_file = $target_dir . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $query = "INSERT INTO learning_materials (course_id, file_path) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("is", $course_id, $target_file);

        if ($stmt->execute()) {
            $success_message = "Learning material uploaded successfully!";
        } else {
            $error_message = "Failed to upload learning material.";
        }
    } else {
        $error_message = "Failed to upload file.";
    }
}

// Fetch existing learning materials
$query = "SELECT * FROM learning_materials WHERE course_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Learning Materials</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css">
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1>Upload Learning Materials</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="learning_file" required><br>
        <button type="submit">Upload Material</button>
    </form>

    <h2>Existing Learning Materials:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><a href="<?php echo $row['file_path']; ?>" target="_blank"><?php echo basename($row['file_path']); ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>