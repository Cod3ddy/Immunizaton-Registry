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
                            <label for="inputLastName" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="fileInput" aria-describedby="fileHelp"
                                onchange="previewFile()">
                            <div id="fileHelp" class="form-text">Please choose a photo to upload.</div>
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
                    </form>
                </div>
            </div>

            <!-- search patient -->
            <div class="view-patient-information">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search patients"
                                        aria-label="Search" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Available Patients</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Patient Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Pamela Kaenda</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Shadow Mbowani</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Kelly Mengamenga</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
            <!-- check user type -->
            <?php
            if(isset($_SESSION['userType'])){
                // get usermanager class and user class
                include "../classes/user.manager.class.php";
                include "../classes/user.class.php";
                // include "../classes/database.class.php";

    // instantiate usermanager class
    $userManager = new UserManager();

    // get the id and userType
    $userType =  $_SESSION["userType"];
    $userId = $_SESSION["userid"];

    // table names
    $hcProviderTB = "health_care_provider";
    $adminTB = "hospital_admin";
    $patientTB = "patient";
    
    if($userType === "provider"){
        try {
            $db = new Database();
            $query = "SELECT  * FROM $hcProviderTB WHERE hc_providerID= ?";
            $stmt = $db -> connect() ->prepare($query);
            $stmt -> execute([$userId]);
            $userDetails = $stmt -> fetch(PDO::FETCH_ASSOC);
            ?>
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
                <!-- <div class="underline"></div> -->
                <div class="content-box">
                    <div class="overview-box" style="display: flex">
                        <p>overview</p>
                    </div>
                    <div class="edit-profile-box" style="display: none">
                        <p>edit profile tab</p>
                    </div>

                    <div class="change-password-box" style="display: none">
                        <p>change password tab</p>
                    </div>
                </div>
            </div>
            <!-- end healthcare -->
            <?php
            } catch (Exception $e) {
            echo "Error creating Database object: " . $e->getMessage();
            }
        }
    }
    ?>
            <!-- <div class="profile-image">
                <img src="assets/imgs/cat.jpg" alt="" />
                <a href="">Edit <i class="bi bi-pencil"></i></a>
            </div> -->
            <!-- <div class="profile-content">
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
            </div> -->
        </section>
    </div>
</div>

<!-- footer -->
<?php include"includes/footer.php"?>