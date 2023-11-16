<?php

// sign up controller
class SignUpContr extends SignUp{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this -> uid = $uid;
        $this -> pwd = $pwd;
        $this -> pwdRepeat = $pwdRepeat;
        $this -> email = $email;
    }

    // handle errors
    public function signUpUser(){
        // instantiate encryption class
        $crypt = new Encyption();
        $errorMessage = "";

        if($this -> invalidEmail() == false){
            // echo 'Invalid Email'
            $errorMessage =  $crypt -> encrypt("invalidemail", $crypt -> key);
            header("location: ../test.php?response=$errorMessage");
            exit();
        }

        if($this  -> InvalidUid() == false){
            // echo 'Invalid username'
            $errorMessage =  $crypt -> encrypt("invalidusername", $crypt -> key);
            header("location: ../test.php?response=$errorMessage");
            exit();
        }

        if($this  -> userExist() == false){
            // echo 'user already exist'
            $errorMessage =  $crypt -> encrypt("useralreadyexist", $crypt -> key);
            header("location: ../test.php?response=$errorMessage");
            exit();
        }

        if($this -> pwdMatch() == false){
            // echo passwords do not match
            $errorMessage =  $crypt -> encrypt("passwordsdonotmatch", $crypt -> key);
            header("location: ../test.php?response=$errorMessage");
            exit();
        }
        // if not error was found
        $this -> setUser($this -> uid, $this -> pwd, $this -> email);
    }

    // check if fullname is valid or not
    private function InvalidUid(){
        $result = true;
        if(!preg_match("/^[a-zA-Z]*$/", $this->uid)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function emptyInput(){
        $result = true;

        if(empty($this ->uid) || empty($this -> pwd) || empty($this-> pwdRepeat) || empty($this -> email)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

    // is email valid or not

    private function invalidEmail(){
        $result = true;

        if(!filter_var($this-> email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }


    // if passwords match or not

    private function pwdMatch(){
        $result = true;

        if($this -> pwd !== $this -> pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        
        return $result;
    }

    // if a user exist or not

    private function userExist(){
        $result = true;

        if(!$this -> checkUser($this -> uid , $this -> email) ){
            $result = false;
        }else{
            $result = true;
        }
        
        return $result;
    }

}