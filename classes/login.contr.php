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

    }

    // check for empty fields
    private function emptyInput(){
        $result = true;

        if(empty($this -> pwd) || empty($this -> email)){
            $result =false;
        }
        else{
            $result = true;
        }

        return $result;
    }
}