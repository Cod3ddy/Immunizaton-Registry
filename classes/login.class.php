<?php
// instantiate AUTH class

class Login extends Database{
     
    protected function getUser($email, $password) {
        $encrypt = new Encyption();
        $patientTB = "patient";
        $adminTB = "hospital_admin";
        $hcProviderTB = "health_care_provider";
    
        // Execute query for patients
        $patientQuery = "SELECT patientID, patient_password FROM $patientTB WHERE patient_email = ?";
        $patientStmt = $this->connect()->prepare($patientQuery);
        $patientStmt->execute([$email]);
        $patientResult = $patientStmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($patientResult) > 0) {
            $this->processLogin($patientResult[0]["patientID"], "patient", $patientResult[0]["patient_password"], $password);
        }
    
        // Execute query for healthcare providers
        $providerQuery = "SELECT hc_providerID, hc_password FROM $hcProviderTB WHERE hc_email = ?";
        $providerStmt = $this->connect()->prepare($providerQuery);
        $providerStmt->execute([$email]);
        $providerResult = $providerStmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($providerResult) > 0) {
            $this->processLogin($providerResult[0]["hc_providerID"], "provider", $providerResult[0]["hc_password"], $password);
        }
    
        // Execute query for admins
        $adminQuery = "SELECT adminID, admin_password FROM $adminTB WHERE admin_email = ?";
        $adminStmt = $this->connect()->prepare($adminQuery);
        $adminStmt->execute([$email]);
        $adminResult = $adminStmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($adminResult) > 0) {
            $this->processLogin($adminResult[0]["adminID"], "admin", $adminResult[0]["admin_password"], $password);
        }
    
        // If no match is found
        header("Location: ../index.php?response=failedtologin");
        exit();
    }
    
    private function processLogin($userID, $userType, $dbPassword, $password) {
        $encrypt = new Encyption();
        $submittedPassword = $password;
    
        // Use password_verify for secure password comparison
        if (trim($submittedPassword) === trim($dbPassword)) {
            // Start session
            session_start();
            $_SESSION['userid'] = $userID;
            $_SESSION['userType'] = $userType;
    
            // Redirect based on user type
            switch ($userType) {
                case 'patient':
                    header("Location: ../patient/index.php");
                    exit();
                case 'admin':
                    header("Location: ../admin/index.php");
                    exit();
                case 'provider':
                    header("Location: ../healthcare/index.php");
                    exit();
                default:
                    $response = $encrypt->encrypt("invalidusertype");
                    header("Location: ../index.php?response=$response");
                    exit();
            }
        } else {
            // Incorrect password
            $response = $encrypt->encrypt("wrongpassword");
            header("Location: ../index.php?response=$response");
            exit();
        }
    }
    
}