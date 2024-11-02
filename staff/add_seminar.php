<?php
include '../config.php';
session_start();

if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['seminar_poster'])) {
    $seminar_title = $_POST['seminar_title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];

    $file = $_FILES['seminar_poster'];
    $target_dir = "../staff/upload/seminars/";
    $target_file = $target_dir . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $query = "INSERT INTO seminars (course_id, seminar_title, description, date, time, venue, poster_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issssss", $course_id, $seminar_title, $description, $date, $time, $venue, $target_file);

        if ($stmt->execute()) {
            $success_message = "Seminar details added successfully!";
        } else {
            $error_message = "Failed to add seminar details.";
        }
    } else {
        $error_message = "Failed to upload seminar poster.";
    }
}

// Fetch existing seminar details
$query = "SELECT * FROM seminars WHERE course_id = ?";
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
    <title>Add Seminar Details</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css">
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1>Add Seminar Details</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label for="seminar_title">Seminar Title:</label>
        <input type="text" name="seminar_title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <label for="date">Date:</label>
        <input type="date" name="date" required><br>

        <label for="time">Time:</label>
        <input type="time" name="time" required><br>

        <label for="venue">Venue:</label>
        <input type="text" name="venue" required><br>

        <label for="seminar_poster">Seminar Poster:</label>
        <input type="file" name="seminar_poster" required><br>

        <button type="submit">Add Seminar</button>
    </form>

    <h2>Existing Seminar Details:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo $row['seminar_title']; ?></strong><br>
                <?php echo $row['description']; ?><br>
                <em><?php echo $row['date']; ?>, <?php echo $row['time']; ?></em> at <?php echo $row['venue']; ?><br>
                <img src="<?php echo $row['poster_path']; ?>" width="200px">
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>