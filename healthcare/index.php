<!-- healthcare dashboard -->
<!-- start sessio -->
<?php
    session_start();
?>
<!-- header -->
<?php include"includes/header.php"?>

<!-- top navigation bar -->
<?php include"../includes/topnav.php"?>

<!-- side nav -->
<?php include"includes/sidenav.php"?>

<!-- pages [navigation]-->
<div class="pages">
    <!-- dashboard page -->
    <div class="h-dash-page" style="display: block">
        <div class="page-title">
            <h1>Dashboard</h1>
        </div>
    </div>

    <!-- patient page -->
    <div class="h-patient-page" style="display: none">
        <div class="page-title">
            <h1>Patients</h1>
        </div>
        <section class="patient-section">
            <!-- patient registration form -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register patient</h5>
                    <!-- User Registration Form -->
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputGender" class="form-label">Gender</label>
                            <select id="inputGender" class="form-select">
                                <option selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">Last Name</label>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Physical Address</label>
                            <input type="text" class="form-control" id="inputAddress"
                                placeholder="Hiltop Mzuzu, M1 Streat">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="inputPhoneNumber">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                        <div class="col-md-6">
                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="inputConfirmPassword">
                        </div>
                        <div class="col-md-6">
                            <label for="inputHomeDistrict" class="form-label">Home District</label>
                            <input type="text" class="form-control" id="inputHomeDistrict">
                        </div>
                        <div class="col-md-6">
                            <label for="inputDateOfBirth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="inputDateOfBirth">
                        </div>
                        <div class="h-form-btn">
                            <button type="submit" class="btn btn-primary submit">Register</button>
                            <button type="reset" class="btn btn-secondary reset">Clear</button>
                        </div>
                    </form><!-- End User Registration Form -->
                </div>
            </div>


            <!--
            <div class="patient-registry-form">
                <h2>Patient Registration Form</h2>

                <form id="patientForm" action="process_registration.php" method="post">
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <div class="patient-form-item">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname">
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div> -->

            <!-- search patient -->
            <div class="view-patient-information">
            </div>
        </section>
    </div>

    <!-- history page -->
    <div class="h-hist-page" style="display: none">
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
<?php include"includes/footer.php"?>