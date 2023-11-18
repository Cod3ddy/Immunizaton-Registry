<?php
// instantiate AUTH class
include "../includes/lib/authentication.php";


class Login extends Database{
     
    protected function getUser($email, $password){
        // message reponse
        // encrypt mesasge
       $encrypt = new Encyption();

        $patientTB = "patient";
        $adminTB = "hospital_admin";
        $hcProviderTB = "health_care_provider";

        // checking if user is patient or not [PATIENT AUTH]
        // [query]
        $patQuery = "SELECT patientID, patient_password FROM $patientTB WHERE patientEmail = ?;";
        $patStmt = $this -> connect()->prepare($patQuery);
        
        // check if stmt failed to execute
        if(!$patStmt->execute([$email])){
            $patStmt = null;
            $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // if rows = 0 
        if($patStmt->rowCount() == 0){
            $patStmt = null;
            $response = $encrypt->encrypt("usernotfound", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // decrypt password
        $encryptedPassword = $patStmt -> fetchAll(PDO::FETCH_ASSOC);
        $decryptedPassword = $encrypt->decrypt($encryptedPassword[0]["patient_password"], $encrypt->key);

        if(trim($decryptedPassword) !== trim($password)){
            $patStmt = null;
            $response = $encrypt->encrypt("wrongpassword", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }else if (trim($decryptedPassword) === trim($password)){
            $patQuery = "SELECT patientID, patient_password FROM $patientTB WHERE patientEmail = ?;";
            $patStmt = $this -> connect()->prepare($patQuery);

            // execute the query
            if(!$patStmt->execute([$email, $password])){
                $patStmt = null;
                $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }

            if($patStmt->rowCount() == 0){
                $patStmt = null;
                $response = $encrypt->encrypt("patientnotfound", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }else if ($patStmt->rowCount() > 0){
                $user = $patStmt -> fetchAll(PDO::FETCH_ASSOC);
                $this->processLogin($user[0]["patientID"], "patient");
            }

        }

// 
// 
// 

        // checking if user is healthcare provider[HC_PROVIDER]
        $hcQuery = "SELECT hc_providerID, hc_password FROM $hcProviderTB WHERE hc_email = ?;";
        $hcStmt = $this -> connect()->prepare($hcQuery);
        
        // check if stmt failed to execute
        if(!$hcStmt->execute([$email])){
            $hcStmt = null;
            $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // if rows = 0 
        if($hcStmt->rowCount() == 0){
            $hcStmt = null;
            $response = $encrypt->encrypt("user", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // decrypt password
        $encryptedPassword = $hcStmt -> fetchAll(PDO::FETCH_ASSOC);
        $decryptedPassword = $encrypt->decrypt($encryptedPassword[0]["hc_passowrd"], $encrypt->key);

        if(trim($decryptedPassword) !== trim($password)){
            $hcStmt = null;
            $response = $encrypt->encrypt("wrongpassword", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }else if (trim($decryptedPassword) === trim($password)){
            $hcQuery = "SELECT hc_providerID, hc_password FROM $hcProviderTB WHERE hc_email = ?;";
            $hcStmt = $this -> connect()->prepare($hcQuery);

            // execute the query
            if(!$hcStmt->execute([$email, $password])){
                $hcStmt = null;
                $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }

            if($hcStmt->rowCount() == 0){
                $hcStmt = null;
                $response = $encrypt->encrypt("patientnotfound", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }else if ($hcStmt->rowCount() > 0){
                $user = $hcStmt -> fetchAll(PDO::FETCH_ASSOC);
                $this->processLogin($user[0]["hc_providerID"], "provider");
            } 
        }
          // 

            // 

            // 
            // checking if user is admin [ADMIN AUTH]
        $adminQuery ="SELECT adminID, admin_password FROM $adminTB WHERE admin_email = ?";
        $adminStmt = $this -> connect()->prepare($adminQuery);
        
        // check if stmt failed to execute
        if(!$adminStmt->execute([$email])){
            $adminStmt = null;
            $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // if rows = 0 
        if($adminStmt->rowCount() == 0){
            $adminStmt = null;
            $response = $encrypt->encrypt("usernotfound", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }
        // decrypt password
        $encryptedPassword = $adminStmt -> fetchAll(PDO::FETCH_ASSOC);
        $decryptedPassword = $encrypt->decrypt($encryptedPassword[0]["hc_passowrd"], $encrypt->key);

        if(trim($decryptedPassword) !== trim($password)){
            $adminStmt = null;
            $response = $encrypt->encrypt("wrongpassword", $encrypt->key);
            header("location: ../index.php?response=$response");
            exit();
        }else if (trim($decryptedPassword) === trim($password)){
            $adminQuery ="SELECT adminID, admin_password FROM $adminTB WHERE admin_email = ?";
            $adminStmt = $this -> connect()->prepare($adminQuery);

            // execute the query
            if(!$adminStmt->execute([$email, $password])){
                $adminStmt = null;
                $response = $encrypt->encrypt("stmtfailed", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }

            if($adminStmt->rowCount() == 0){
                $adminStmt = null;
                $response = $encrypt->encrypt("usernotfound", $encrypt->key);
                header("location: ../index.php?response=$response");
                exit();
            }else if ($adminStmt->rowCount() > 0){
                $user = $adminStmt -> fetchAll(PDO::FETCH_ASSOC);
                $this->processLogin($user[0]["hc_providerID"], "admin");
            } 
        }
    }
// processing login detials[GET USER TYPE]
    private function processLogin($userID, $userType){
        $encrypt = new Encyption();
        // login user();
        // start session
        session_start();
        $_SESSION['userid'] = $userID;
        $_SESSION['userType'] = $userType;

        $response = $encrypt -> encrypt("invalidusertype", $encrypt->key);

        switch ($userType) {
            case 'patient':
                header("Location: patient/index.php");
                exit();
            case 'admin':
                header("Location: admin/index.php");
                exit();
                
            case 'provider':
                header("Location: healthcare/index.php");
                exit();

            default:
               header("Location: index.php?response=$response");
        }
    }
}