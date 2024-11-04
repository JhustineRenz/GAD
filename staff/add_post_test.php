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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $correct_option = $_POST['correct_option'];

    $query = "INSERT INTO post_test_questions (course_id, question_text, option_a, option_b, option_c, correct_option) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssss", $course_id, $question_text, $option_a, $option_b, $option_c, $correct_option);

    if ($stmt->execute()) {
        $success_message = "Post-Test question added successfully!";
    } else {
        $error_message = "Failed to add Post-Test question.";
    }
}

// Fetch existing questions
$query = "SELECT * FROM post_test_questions WHERE course_id = ?";
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
    <title>Post-Test Questions</title>
    <link rel="stylesheet" href="../staff/assets/css/add_post_test.css">
    <script>
        // JavaScript to hide the notification after 3 seconds
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.querySelector(".post-test-message.success");
            const errorMessage = document.querySelector(".post-test-message.error");
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = "none";
                }, 3000);
            }
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.display = "none";
                }, 3000);
            }
        });
    </script>
</head>

<body>
    <?php include '../staff/assets/common/StaffNavBar.php'; ?>

    <h1 class="post-test-page-title">POST-TEST QUESTIONS</h1>

    <?php if ($success_message): ?>
        <p class="post-test-message success"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if ($error_message): ?>
        <p class="post-test-message error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <div class="post-test-question-container">
        <div class="post-test-question-form">
            <h2 class="post-test-section-title">ADD POST-TEST QUESTION</h2>
            <form method="POST">
                <label for="question_text">Question:</label>
                <input type="text" name="question_text" class="post-test-input-field" required>

                <label for="option_a">Option A:</label>
                <input type="text" name="option_a" class="post-test-input-field" required>

                <label for="option_b">Option B:</label>
                <input type="text" name="option_b" class="post-test-input-field" required>

                <label for="option_c">Option C:</label>
                <input type="text" name="option_c" class="post-test-input-field" required>

                <label for="correct_option">Correct Option (a/b/c):</label>
                <input type="text" name="correct_option" class="post-test-input-field" maxlength="1" required>

                <!-- Align button to the right with green color -->
                <div class="post-test-button-container">
                    <button type="submit" class="post-test-submit-button">Add Question</button>
                </div>
            </form>
        </div>

        <div class="post-test-existing-questions">
            <h2 class="post-test-section-title">EXISTING POST-TEST QUESTIONS</h2>
            <ul class="post-test-question-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="post-test-question-item">
                        <span class="post-test-question-text"><?php echo htmlspecialchars($row['question_text']); ?></span>
                        <span class="post-test-correct-answer">Correct Answer: <?php echo strtoupper(htmlspecialchars($row['correct_option'])); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>

</html>
