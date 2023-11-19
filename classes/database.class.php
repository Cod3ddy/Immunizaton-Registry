<?php

class Database{
    // connect to the database
    public function connect(){
        // try connecting to the db or show error(ex)
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=immunization-registry', $username, $password);
            return $dbh;
        }catch(PDOException $e){
            // print error message
            print "Error!: " . $e -> getMessage(). "<br/>"; 
            die();
        }
    }
}