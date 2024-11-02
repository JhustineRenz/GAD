<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../learner/assets/common/css/LearnerNavBar.css">
    <link rel="stylesheet" href="../learner/assets/css/AboutUs.css">
</head>

<body>
    <?php include '../learner/assets/common/LearnerNavBar.php'; ?>

    <!-- Header Image Section -->
    <div class="header-image-container">
        <img src="./assets/images/Gender.jpg" alt="Header" class="header-image full-width-header">
    </div>

    <!-- Content Section -->
    <div class="content-container">

        <!-- Sidebar Section -->
        <div class="sidebar">
            <div class="sidebar-header">
                ABOUT US
            </div>
            <ul>
                <li onclick="showSection('goals')">Goals</li>
                <li onclick="showSection('organization-profile')">Organization Profile</li>
                <li onclick="showSection('privacy-notice')">Privacy Notice</li>
                <li onclick="showSection('laws-and-policies')">Laws and Policies</li>
            </ul>
        </div>

        <!-- Main Content Section -->
        <div class="main-content">
            <div id="goals" class="section-container">
                <h2>GOALS</h2>
                <p>The Gender and Development Unit at Batangas State University aims to promote gender equality through
                    policies, programs, and initiatives that empower women and men alike.</p>
            </div>

            <div id="organization-profile" class="section-container" style="display: none;">
                <h2>About Gender and Development</h2>
                <p>The Gender and Development (GAD) Unit seeks to address the various needs and issues related to gender
                    equality, creating an inclusive environment for everyone at Batangas State University.</p>
                <p>Our goal is to mainstream gender issues and promote gender-responsive governance through active
                    collaboration with different university units and external partners.</p>

                <h2>GAD Plan and Budget</h2>
                <p>Our GAD Plan and Budget includes strategic initiatives to address gender issues through sustainable
                    projects and capacity-building activities.</p>

                <h2>GAD Focal Person System</h2>
                <p>The GAD Focal Person System is established to coordinate and implement gender programs within various
                    university departments.</p>

                <h2>Project, Activity, and Program</h2>
                <p>A variety of projects, activities, and programs are organized to address gender issues and advocate
                    for equality within the campus and community.</p>
            </div>

            <div id="privacy-notice" class="section-container" style="display: none;">
                <h2>PRIVACY NOTICE</h2>
                <p>Our privacy notice outlines the information we collect, how it is used, and the steps we take to
                    ensure the protection of your data.</p>
            </div>

            <div id="laws-and-policies" class="section-container" style="display: none;">
                <h2>LAWS AND POLICIES</h2>
                <p>Learn more about the national laws and institutional policies supporting gender equality and
                    development.</p>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle sections
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section-container');
            sections.forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>

</body>

</html>