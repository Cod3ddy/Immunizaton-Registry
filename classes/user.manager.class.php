<?php

include "database.class.php";

class UserManager {
    private $db;

    public function __construct(){
        // instantiate database class
        $database = new Database();
        $this ->db =$database->connect();     
    }

    // get user details
    public function getUserDetails($userId,$tableName, $userIdColumn){
        $userTable = $tableName;
        try {
            $query = "SELECT  * FROM $userTable WHERE $userIdColumn= ?";
            $stmt = $this->db->prepare($query);
            $stmt -> execute([$userId]);
            $user = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (Exception $e) {
            echo "Error creating Database object: " . $e->getMessage();
        }
        // // fetch user query
        // $query = "SELECT  * FROM $userTable WHERE $userIdColumn = ?";
        // $stmt = $this->db->prepare($query);
        // // execute the query and fetch the data
        // $stmt->execute([$userId]);
        // $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // // return user details 
        // return $userDetails;
    }
}

?>