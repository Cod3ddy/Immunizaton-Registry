<?php

session_start();
$db = new Database();
if(isset($_SESSION['userType'])){
    // get usermanager class and user class
    include "../classes/user.manager.class.php";
    include "../classes/user.class.php";

    // instantiate usermanager class
    $userManager = new UserManager();

    // get the id and userType
    $userType =  $_SESSION["userType"];
    $userId = $_SESSION["userid"];

    // table names
    $hcProviderTB = "health_care_provider";
    $adminTB = "hospital_admin";
    $patientTB = "patient";

    $userDetails = null;
    if($userType === "provider"){
        $userDetails = $userManager->getUserDetails($userId, $hcProviderTB, "hc_providerID");
        // instantiate new [HEALTHCARE PROVIDER] user
        $healthcare = new User(
            $userDetails["hc_firstname"],
            $userDetails["hc_lastname"],
            $userDetails["hc_gender"],
            $userDetails["hc_physical_address"],
            $userDetails["hc_phone_number"],
            $userDetails["hc_email"],
            $userDetails["hc_password"],
            $userDetails["hc_home_district"],
            $userDetails["hc_date_of_birth"],
            $userDetails["hc_profile_image"],
        );
        ?>

<!-- healthcare provider profile -->
<div class="profile-image">
    <img src=<? $healthcare->getProfileImage(); ?> alt="" />
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
            <div class="overview-content">
                <div class="overview-items">
                    <p>Full Name</p>
                    <p>
                        <? $healthcare->getFirstName() . " " . $healthcare ->getLastName(); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="edit-profile-box" style="display: none">
            <p>edit profile tab</p>
        </div>

        <div class="change-password-box" style="display: none">
            <p>change password tab</p>
        </div>
    </div>
</div>
<!-- end healthcare provider profile -->

<?php
    }else if ($userType === "patient"){
        $userDetails = $userManager->getUserDetails($userId, $userType, $patientTB, "patientID");
        // instantiate new [PATIENT] user
        $patient = new User(
            $userDetails[0]["patient_firstname"],
            $userDetails[0]["patient_lastname"],
            $userDetails[0]["patient_gender"],
            $userDetails[0]["patient_physical_address"],
            $userDetails[0]["patient_phone_number"],
            $userDetails[0]["patient_email"],
            $userDetails[0]["patient_password"],
            $userDetails[0]["patient_home_district"],
            $userDetails[0]["patient_date_of_birth"],
            $userDetails[0]["patient_profile_image"],
        );
    }else if ($userType === "admin"){
        $userDetails = $userManager->getUserDetails($userId, $userType, $adminTB, "adminID");
         // instantiate new [ADMIN] user
         $admin = new User(
            $userDetails[0]["admin_firstname"],
            $userDetails[0]["admin_lastname"],
            $userDetails[0]["admin_gender"],
            $userDetails[0]["admin_physical_address"],
            $userDetails[0]["admin_phone_number"],
            $userDetails[0]["admin_email"],
            $userDetails[0]["admin_password"],
            $userDetails[0]["admin_home_district"],
            $userDetails[0]["admin_date_of_birth"],
            $userDetails[0]["admin_profile_image"],
        );
    }
}