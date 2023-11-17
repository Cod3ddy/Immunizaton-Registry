<?php

// sign up controller
class LoginContr extends Login{

    private $pwd;
    private $email;

    public function __construct($email,  $pwd)
    {
        $this -> pwd = $pwd;
        $this -> email = $email;
    }

    // handle errors
    public function loginUser(){
        // instantiate encryption class
        $crypt = new Encyption();
        $errorMessage = "";

        if($this -> emptyInput() == false){
            // echo 'emptyInput'
            $errorMessage =  $crypt -> encrypt("emptyinput", $crypt -> key);
            header("location: ../test.php?response=$errorMessage");
            exit();
        }
        
        // if not error was found
        $this -> getUser($this -> email, $this -> pwd);
    }

    private function emptyInput(){
        $result = true;

        if(empty($this -> pwd)  || empty($this -> email)){
            $result = false;
        }
        else{
            $result = true;
        }

        return $result;
    }

 
}