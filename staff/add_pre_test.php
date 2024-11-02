<?php
include '../config.php';
session_start();

if (!isset($_SESSION['staff_logged_in'])) {
    header('Location: staff_login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $correct_option = $_POST['correct_option'];

    $query = "INSERT INTO pre_test_questions (course_id, question_text, option_a, option_b, option_c, correct_option) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssss", $course_id, $question_text, $option_a, $option_b, $option_c, $correct_option);

    if ($stmt->execute()) {
        $success_message = "Pre-Test question added successfully!";
    } else {
        $error_message = "Failed to add Pre-Test question.";
    }
}

// Fetch existing questions
$query = "SELECT * FROM pre_test_questions WHERE course_id = ?";
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
    <title>Add Pre-Test Questions</title>
    <link rel="stylesheet" href="../staff/assets/css/add_course_section.css">
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1>Add Pre-Test Questions</h1>

    <?php if (isset($success_message)): ?>
        <p class="success-message"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="question_text">Question:</label>
        <input type="text" name="question_text" required><br>

        <label for="option_a">Option A:</label>
        <input type="text" name="option_a" required><br>

        <label for="option_b">Option B:</label>
        <input type="text" name="option_b" required><br>

        <label for="option_c">Option C:</label>
        <input type="text" name="option_c" required><br>

        <label for="correct_option">Correct Option (a/b/c):</label>
        <input type="text" name="correct_option" maxlength="1" required><br>

        <button type="submit">Add Question</button>
    </form>

    <h2>Existing Pre-Test Questions:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?php echo $row['question_text']; ?> (Correct Answer: <?php echo strtoupper($row['correct_option']); ?>)
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>