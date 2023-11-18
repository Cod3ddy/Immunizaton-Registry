<?php

class LoginContr extends Login{
    private $password;
    private $emailAddress;

    public function __construct($emailAddress, $password)
    {
        $this -> emailAddress = $emailAddress;
        $this -> password = $password;
    }

    public function loginUser(){
        $encrypt = new Encyption();
        // if($this -> emptyInput()== false){
        //     $response = $encrypt -> encrypt("emptyfields", $encrypt -> key);
        //     header("Location: ../index.php?response= $response");
        //     exit();
        // }

        // if no error was found
        $this -> getUser($this -> emailAddress, $this -> password);
    }

    // check for empty fields
    private function emptyInput(){
        $result = true;

        if(empty($this -> password) || empty($this -> emailAddress)){
            $result =false;
        }
        else{
            $result = true;
        }

        return $result;
    }
}