<!-- Navigation Bar -->
<nav class="user-navigation-bar">
    <!-- Logo Section -->
    <div class="user-nav-logo">
        <img src="./assets/images/BSU.png" alt="BSU Logo" class="user-logo">
        <img src="./assets/images/GAD.png" alt="GAD Logo" class="user-logo">
        <div class="user-nav-titles">
            <span class="user-nav-title main-title">BATANGAS STATE UNIVERSITY - THE NATIONAL ENGINEERING
                UNIVERSITY</span>
            <span class="user-nav-title sub-title">Gender and Development Unit</span>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="user-nav-menu">
        <li><a href="Home.php">Home</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Program.php">Program</a></li>
        <li><a href="AdvocacyCampaign.php">Advocacy Campaign</a></li>
        <li><a href="Certificate.php">Certificate</a></li>
        <li><a href="ConnectWithUs.php">Connect With Us</a></li>
    </ul>

    <!-- Profile Icon -->
    <div class="user-profile-icon" onclick="togglePopup()">
        <img src="./assets/images/icon.png" alt="Profile" class="user-profile">
    </div>

    <!-- Profile Popup -->
    <div id="profile-popup" class="profile-popup" style="display: none;">
        <div class="popup-content">
            <h2 class="popup-title">WELCOME!</h2>
            <p class="popup-text">Sign in to your account now.</p>
            <button class="popup-btn signin-btn">SIGN IN</button>
            <div class="separator">
                <span>OR</span>
            </div>
            <button class="popup-btn signup-btn">SIGN UP</button>
        </div>
    </div>
        
    <script>

        // Profile Popup Toggle
        function togglePopup() {
            const popup = document.getElementById('profile-popup');
            popup.style.display = (popup.style.display === "none" || popup.style.display === "") ? "block" : "none";
        }

        // Close Popup
        function closePopup() {
            document.getElementById('profile-popup').style.display = "none";
        }

        // Redirect to the login page on Sign In button click
        document.querySelector('.signin-btn').addEventListener('click', function() {
            window.location.href = 'login.php';  // Redirect to the login page
        });

        document.querySelector('.signup-btn').addEventListener('click', function() {
            window.location.href = 'sign-up.php';  // Redirect to the login page
        });
    </script>
</nav>