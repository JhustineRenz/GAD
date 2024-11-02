<?php
include '../config.php';
session_start();

if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video_file'])) {
    $file = $_FILES['video_file'];
    $target_dir = "../staff/upload/videos/";
    $target_file = $target_dir . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $query = "INSERT INTO videos (course_id, video_path) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("is", $course_id, $target_file);

        if ($stmt->execute()) {
            $success_message = "Video uploaded successfully!";
        } else {
            $error_message = "Failed to upload video.";
        }
    } else {
        $error_message = "Failed to upload file.";
    }
}

// Fetch existing videos
$query = "SELECT * FROM videos WHERE course_id = ?";
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
    <title>Upload Videos</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css">
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1>Upload Course Videos</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="video_file" accept="video/*" required><br>
        <button type="submit">Upload Video</button>
    </form>

    <h2>Existing Videos:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><video width="300" controls>
                    <source src="<?php echo $row['video_path']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video></li>
        <?php endwhile; ?>
    </ul>
</body>

</html>