<?php


class SignUp extends Dbh{

    
    
    protected function setUser($uid, $pwd, $email){
        $query = "INSERT INTO users (username, userpassword, useremail) VALUES(?,?,?);";
        $stmt = $this -> connect() -> prepare($query);

        $hashedpwd  = password_hash($pwd, PASSWORD_DEFAULT);
        echo"<script> alert( ' ". $uid . "'); </script>";
        // check if stmt failed to execute
        if(!$stmt -> execute(array($uid, $hashedpwd, $email))){
            $stmt = null;
            header("location: ../test.php?error=stmtfailed");
            exit();
        }
        
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