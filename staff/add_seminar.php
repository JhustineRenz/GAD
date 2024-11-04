<?php
include '../config.php';
session_start();

if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['seminar_poster'])) {
    $seminar_title = $_POST['seminar_title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];

    $file = $_FILES['seminar_poster'];
    $target_dir = "../staff/upload/seminars/";

    // Check if the directory exists; if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

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
    <title>Add Seminar Details</title>
    <link rel="stylesheet" href="../staff/assets/css/add_seminar.css">
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1 class="header-title">SEMINAR DETAILS</h1>

    <div class="notification-container">
        <?php if ($success_message): ?>
            <p class="success-message"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>

    <div class="wrapper-container">
        <!-- Form Container -->
        <form method="POST" enctype="multipart/form-data" class="form-container">
            <h2 class="form-title">ADD SEMINAR DETAILS</h2>
            <label for="seminar_title">Seminar Title:</label>
            <input type="text" name="seminar_title" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <div class="form-row">
                <div>
                    <label for="date">Date:</label>
                    <input type="date" name="date" required>
                </div>

                <div>
                    <label for="time">Time:</label>
                    <input type="time" name="time" required>
                </div>

                <div>
                    <label for="venue">Venue:</label>
                    <input type="text" name="venue" required>
                </div>

                <div>
                    <label for="seminar_poster">Poster:</label>
                    <input type="file" name="seminar_poster" required>
                </div>
            </div>

            <button type="submit" class="submit-button">Add Seminar</button>
        </form>

        <!-- Existing Seminar Container -->
        <div class="existing-seminar-container">
            <h2 class="existing-title">EXISTING SEMINAR DETAILS</h2>
            <ul class="details-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="details-item">
                        <strong><?php echo $row['seminar_title']; ?></strong><br>
                        <?php echo $row['description']; ?><br>
                        <em><?php echo $row['date']; ?>, <?php echo $row['time']; ?></em> at <?php echo $row['venue']; ?><br>
                        <img src="<?php echo $row['poster_path']; ?>" class="poster-image">
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <script>
        // Automatically hide the message after 3 seconds
        setTimeout(function() {
            const successMessage = document.querySelector('.success-message');
            const errorMessage = document.querySelector('.error-message');
            if (successMessage) successMessage.style.display = 'none';
            if (errorMessage) errorMessage.style.display = 'none';
        }, 3000);
    </script>
</body>
</html>
