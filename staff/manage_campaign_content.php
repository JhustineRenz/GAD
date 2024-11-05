<?php
session_start();
require_once '../config.php';

// Ensure the campaign_id is provided
$campaign_id = $_GET['campaign_id'] ?? null;
if (!$campaign_id) {
    echo "No campaign ID provided.";
    exit;
}

// Fetch campaign details
$campaign = $conn->query("SELECT * FROM advocacy_campaigns WHERE campaign_id = $campaign_id")->fetch_assoc();
if (!$campaign) {
    echo "Campaign not found.";
    exit;
}

// Handle form submission for adding new content
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_content'])) {
    $content_type = $_POST['content_type'];
    $content_text = $_POST['content_text'];
    $content_url = null;

    // Handle video URL or file upload based on content type
    if ($content_type == 'video' && !empty($_POST['content_url'])) {
        if (filter_var($_POST['content_url'], FILTER_VALIDATE_URL)) {
            $content_url = $_POST['content_url'];
        } else {
            echo "<p class='error'>Invalid URL format.</p>";
        }
    } elseif (isset($_FILES['content_file']) && $_FILES['content_file']['error'] == 0) {
        $upload_dir = '../staff/upload/';
        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        if (!in_array($_FILES['content_file']['type'], $allowed_types)) {
            echo "<p class='error'>Invalid file type. Only JPEG, PNG, and PDF files are allowed.</p>";
        } else {
            $file_extension = pathinfo($_FILES['content_file']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid('content_', true) . '.' . $file_extension;
            $content_url = $upload_dir . $file_name;

            if (!move_uploaded_file($_FILES['content_file']['tmp_name'], $content_url)) {
                echo "<p class='error'>Failed to upload file.</p>";
            }
        }
    }

    // Insert content into the database if URL or text content is set
    if ($content_url || $content_text) {
        $stmt = $conn->prepare("INSERT INTO campaign_content (campaign_id, content_type, content_url, content_text) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $campaign_id, $content_type, $content_url, $content_text);
        if ($stmt->execute()) {
            echo "<p class='success'>Content added successfully.</p>";
        } else {
            echo "<p class='error'>Failed to add content: " . $stmt->error . "</p>";
        }
    }
}

// Handle content deletion
if (isset($_GET['delete_content_id'])) {
    $content_id = $_GET['delete_content_id'];
    $stmt = $conn->prepare("DELETE FROM campaign_content WHERE content_id = ?");
    $stmt->bind_param("i", $content_id);
    if ($stmt->execute()) {
        echo "<p class='success'>Content deleted successfully.</p>";
    } else {
        echo "<p class='error'>Failed to delete content: " . $stmt->error . "</p>";
    }
}

// Fetch existing content for this campaign
$content = $conn->query("SELECT * FROM campaign_content WHERE campaign_id = $campaign_id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Campaign Content</title>
    <link rel="stylesheet" href="../staff/assets/css/manage_campaign_content.css">
    <script>
        // JavaScript to show/hide form fields based on content type selection
        function updateFormFields() {
            const contentType = document.getElementById('content_type').value;
            document.getElementById('file_input').style.display = (contentType === 'image' || contentType === 'infographic' || contentType === 'material') ? 'block' : 'none';
            document.getElementById('url_input').style.display = (contentType === 'video') ? 'block' : 'none';
            document.getElementById('text_input').style.display = (contentType === 'description' || contentType === 'activity') ? 'block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', updateFormFields);
    </script>
</head>

<body>
    <h1>Manage Content for Campaign: <?php echo htmlspecialchars($campaign['campaign_name']); ?></h1>

    <!-- Form to Add New Content -->
    <form action="manage_campaign_content.php?campaign_id=<?php echo $campaign_id; ?>" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="add_content" value="1">

        <label>Content Type:</label>
        <select name="content_type" id="content_type" onchange="updateFormFields()" required>
            <option value="description">Description</option>
            <option value="activity">Activity</option>
            <option value="image">Image</option>
            <option value="infographic">Infographic</option>
            <option value="video">Video</option>
            <option value="material">Material</option>
        </select>

        <!-- Conditional fields based on content type selection -->
        <div id="file_input" style="display: none;">
            <label>Upload File (for images, infographics, or materials):</label>
            <input type="file" name="content_file" accept="image/*,application/pdf">
        </div>

        <div id="url_input" style="display: none;">
            <label>Paste URL (for video content):</label>
            <input type="url" name="content_url" placeholder="URL for videos only">
        </div>

        <div id="text_input" style="display: none;">
            <label>Content Text (for description or activities):</label>
            <textarea name="content_text"></textarea>
        </div>

        <button type="submit">Add Content</button>
    </form>

    <!-- Display Existing Content -->
    <h2>Existing Content</h2>
    <div class="content-list">
        <?php while ($row = $content->fetch_assoc()) { ?>
            <div class="content-item">
                <p><strong>Type:</strong> <?php echo ucfirst($row['content_type']); ?></p>
                <?php if ($row['content_type'] == 'video') { ?>
                    <a href="<?php echo htmlspecialchars($row['content_url']); ?>" target="_blank">View Video</a>
                <?php } elseif (in_array($row['content_type'], ['image', 'infographic'])) { ?>
                    <img src="<?php echo htmlspecialchars($row['content_url']); ?>" width="150">
                <?php } else { ?>
                    <p><?php echo htmlspecialchars($row['content_text']); ?></p>
                <?php } ?>
                <a href="manage_campaign_content.php?campaign_id=<?php echo $campaign_id; ?>&delete_content_id=<?php echo $row['content_id']; ?>"
                    class="delete-link">Delete</a>
            </div>
        <?php } ?>
    </div>
</body>

</html>