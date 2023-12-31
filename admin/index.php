<!-- admin dashboard -->
<!-- start session -->
<?php session_start();?>
<!-- header -->
<?php include"../includes/header.php"?>

<!-- top navigation bar -->
<?php include"../includes/topnav.php"?>

<!-- side nav -->
<?php include"includes/sidenav.php"?>

<!-- pages [navigation]-->
<div class="pages">

    <!-- dashboard page -->
    <div class="dashboard-page" style="display: block">
        <div class="page-title">
            <h1>Dashboard</h1>
        </div>
    </div>

    <!-- map page -->
    <div class="map-page" style="display: none">
        <div class="page-title">
            <h1>Map</h1>
        </div>
    </div>

    <!-- history page -->
    <div class="history-page" style="display: none">
        <div class="page-title">
            <h1>History</h1>
        </div>
    </div>

    <!-- profile page -->
    <div class="profile-page" style="display: none">
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
<?php include"../includes/footer.php"?>