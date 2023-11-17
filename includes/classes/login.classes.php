<?php

class Login extends Dbh{

    protected function getUser($email, $pwd){
        $query = "SELECT userpassword FROM users WHERE username = ? OR useremail = ?";
        $stmt = $this -> connect() -> prepare($query);

        
        // check if stmt failed to execute
        if(!$stmt -> execute(array($email, $pwd))){
            $stmt = null;
            header("location: ../test.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount () == 0){
            $stmt = null;
            header("location: ../test.php?response=usernotfound");
            exit();
        }
        
        $pwdHashed = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //check password
        $checkPwd = password_verify($pwd, $pwdHashed[0]["userpassword"]);

        // check if password is wrong or not
        if($checkPwd == false){
            $stmt = null;
            header("location: ../test.php?response=wrongpassword");
            exit();
        }else if ($checkPwd == true){
            $query = "SELECT userpassword FROM users WHERE username = ? OR useremail = ?";
            $stmt = $this -> connect() -> prepare($query);

            // execute the query 
            if (!$stmt -> execute(array($email, $email, $pwd))){
                $stmt = null;
                header("location: ../test.php?error=stmtfailed");
                exit();
            }

            // check row count
            if(!$stmt->rowCount () == 0){
                $stmt = null;
                header("location: ../test.php?response=usernotfound");
                exit();
            }

            // login the user

            $user = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            // start session
            session_start();
            $_SESSION["userid"] = $user[0]["userID"];
            $_SESSION["username"] = $user[0]["username"];
            $stmt = null;
        }
    }
}