<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocacy Campaign - Details</title>
    <link rel="stylesheet" href="../learner/assets/common/css/LearnerNavBar.css">
    <link rel="stylesheet" href="../learner/assets/css/AdvocacyCampaignRedirection.css">
</head>

<body>
    <?php include '../learner/assets/common/LearnerNavBar.php'; ?>
    <!-- Spacing between Nav Bar and Banner -->
    <div class="nav-spacing"></div>

    <!-- Banner Section -->
    <div class="banner">
        <img src="./assets/images/20.png" alt="Campaign Banner">
    </div>

    <!-- Campaign Details Section -->
    <div class="campaign-details">
        <h1>WOMEN’S MONTH CELEBRATION</h1>

        <div class="activities">
            <h2>ACTIVITIES</h2>
            <ul>
                <li>1. Seminar</li>
                <li>2. Poster Making</li>
                <li>3. Photo Contest</li>
            </ul>
        </div>

        <div class="button-grid">
            <a href="#" class="button">
                <img src="./assets/images/images.png" alt="Images">
                <span>IMAGES</span>
            </a>
            <a href="#" class="button">
                <img src="./assets/images/infographics.png" alt="Infographics">
                <span>INFOGRAPHICS</span>
            </a>
            <a href="#" class="button">
                <img src="./assets/images/videos.png" alt="Videos">
                <span>VIDEOS</span>
            </a>
            <a href="#" class="button">
                <img src="./assets/images/materials.png" alt="Materials">
                <span>MATERIALS</span>
            </a>
        </div>

        <div class="content-description">
            <p>
                Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
                Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa.
            </p>
        </div>
    </div>

    <script>
        function togglePopup() {
            const popup = document.getElementById('profile-popup');
            popup.style.display = (popup.style.display === "none" || popup.style.display === "") ? "block" : "none";
        }
    </script>
</body>

</html>