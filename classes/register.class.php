<?php


class Register extends Database{

    protected function setUser($hospitalID, $firstname, $lastname, $gender, $physical_address, $phone_number, $emailAddress, $home_district, $date_of_birth, $profile_image, $userType){
        // 
        $encrypt = new Encyption();

        $patientTB = "patient";
        $hcProviderTB = "health_care_provider";

        // check user type
        if(trim($userType) === trim("patient")){
            $patQuery = "INSERT INTO $patientTB (hospitalID, patient_firstname, patient_lastname, patient_gender, patient_physical_address, patient_phone_number, patient_email, patient_password, patient_home_district, patient_date_of_birth, patient_profile_image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ? ?, ?, ?);";
            $patStmt = $this -> connect() -> prepare($patQuery);

            if(!$patStmt -> execute(array($hospitalID, $firstname, $lastname, $gender, $physical_address, $phone_number, $emailAddress, $home_district, $date_of_birth, $profile_image))){
            $patStmt = null;
            header("location: ../test.php?error=stmtfailed");
            exit();
            }
        }
        // check if user is healthcare provider
        else if (trim($userType) === trim("provider")){
            $hcQuery =  "INSERT INTO $hcProviderTB (hospitalID, hc_firstname, hc_lastname, hc_gender, hc_physical_address, hc_phone_number, hc_email, hc_password, hc_home_district, hc_date_of_birth, hc_profile_image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ? ?, ?, ?);";
            $hcStmt = $this -> connect() -> prepare($hcQuery);

            if(!$hcStmt->execute(array($hospitalID, $firstname, $lastname, $gender, $physical_address, $phone_number, $emailAddress, $home_district, $date_of_birth, $profile_image))){
                header("location: ../test.php?error=stmtfailed");
                exit();
            }
        }
       
        
        

        
        // check if stmt failed to execute
        // if(!$patStmt -> execute(array($uid, $hashedpwd, $email))){
        //     $patStmt = null;
        //     header("location: ../test.php?error=stmtfailed");
        //     exit();
        // }
         
        $stmt = null;
    }
    
    // check if user exist 
    protected function checkUser($uid, $email){
        $query = "SELECT useremail FROM users WHERE username = ? OR useremail = ?";

        $stmt = $this -> connect()  -> prepare($query);

        // check if stmt failed to execute
        if(!$stmt -> execute(array($uid, $email))){
            $stmt = null;
            header("location: ../test.php?error=stmtfailed");
            exit();
        }
        
        //check if any row were returned
        $resultCheck = false;
      
        if($stmt -> rowCount() > 0){
            $resultCheck = false;
        }

        else{
            $resultCheck = true;
        }

        return $resultCheck;
    }
}