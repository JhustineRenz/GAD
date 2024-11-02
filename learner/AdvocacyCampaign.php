<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocacy Campaign</title>
    <link rel="stylesheet" href="../learner/assets/common/css/LearnerNavBar.css">
    <link rel="stylesheet" href="../learner/assets/css/AdvocacyCampaign.css">
</head>

<body>
    <?php include '../learner/assets/common/LearnerNavBar.php'; ?>

    <!-- Advocacy Campaign Section -->
    <div class="advocacy-campaign-container">
        <div class="content">
            <div class="title-search">
                <h1>ADVOCACY CAMPAIGN</h1>
                <div class="search-bar">
                    <input type="text" placeholder="Search" id="searchTerm">
                    <button onclick="search()">🔍</button>
                </div>
            </div>

            <!-- Image Gallery Section -->
            <div class="image-gallery">

                <!-- Advocacy 1-->
                <div class="image-card">
                    <a href="AdvocacyCampaignRedirection.php">
                        <img src="./assets/images/20.png" alt="Webinar on Laws on Gender-Based Violence"></a>
                    <a class="image-title">Webinar on Laws on Gender-Based Violence</a>
                </div>
                
                <!-- Advocacy 2-->
                <div class="image-card">
                    <a href="AdvocacyCampaignRedirection.php">
                        <img src="./assets/images/21.png" alt="Pride Month 2022"></a>
                    <a class="image-title">PRIDE: A Celebration of Self</a>
                </div>
                
                <!-- Advocacy 3-->
                <div class="image-card">
                    <a href="AdvocacyCampaignRedirection.php">
                        <img src="./assets/images/22.png" alt="Filipina Lakas"></a>
                    <a class="image-title">Filipina Lakas: Zero Tolerance on Violence Against Women</a>
                </div>
                
                <!-- Advocacy 4-->
                <div class="image-card">
                    <a href="AdvocacyCampaignRedirection.php">
                        <img src="./assets/images/23.png" alt="National Disaster Resilience Month 2022"></a>
                    <a class="image-title">National Disaster Resilience Month 2022</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>