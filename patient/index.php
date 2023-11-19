<!-- patient dashboard -->
<!-- start session -->
<?php session_start();?>
<!-- header -->
<?php include"includes/header.php"?>

<!-- top navigation bar -->
<?php include"../includes/topnav.php"?>

<!-- side nav -->
<?php include"includes/sidenav.php"?>

<!-- pages [navigation]-->
<div class="pages">

    <!-- dashboard page -->
    <div class="patient-dashboard-page" style="display: block">
        <div class="page-title">
            <h1>Dashboard</h1>
        </div>
    </div>

    <!-- map page -->
    <div class="patient-map-page" style="display: none">
        <div class="page-title">
            <h1>Map</h1>
        </div>
        <div class="map-content">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d820.8243268187298!2d33.80809312023771!3d-13.87603264829564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19202ab81217079f%3A0x4ab780455ed1883d!2sDaeyang%20Luke%20Hospital!5e1!3m2!1sen!2smw!4v1700039785767!5m2!1sen!2smw"
                width="100%" height="70%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- history page -->
    <div class="patient-history-page" style="display: none">
        <div class="page-title">
            <h1>History</h1>
        </div>
    </div>

    <!-- profile page -->
    <div class="patient-profile-page" style="display: none">
        <div class="page-title">
            <h1>Profile</h1>
        </div>
        <section class="profile-section">
            <div class="profile-image">
                <img src="assets/imgs/cat.jpg" alt="" />
                <a href="">Edit <i class="bi bi-pencil"></i></a>
            </div>
            <div class="profile-content">
                <div class="nav-tab">
                    <ul>
                        <li class="overview">Overview</li>
                        <li class="edit-profile">Edit Profile</li>
                        <li class="change-password">Change Password</li>
                    </ul>
                </div>
                <div class="underline"></div>
                <div class="content-box">
                    <div class="overview-box" style="display: flex">
                        <p>overview tab</p>
                    </div>
                    <div class="edit-profile-box" style="display: none">
                        <p>edit profile tab</p>
                    </div>

                    <div class="change-password-box" style="display: none">
                        <p>change password tab</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- footer -->
<?php include"includes/footer.php"?>