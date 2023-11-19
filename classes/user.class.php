<?php
   class User {
    private $firstname;
    private $lastname;
    private $gender;
    private $physicalAddress;
    private $phoneNumber;
    private $emailAddress;
    private $password;
    private $homeDistrict;
    private $dateOfBirth;
    private $profileImage;

    public function __construct($firstname, $lastname, $gender, $physicalAddress, $phoneNumber, $emailAddress, $password, $homeDistrict, $dateOfBirth, $profileImage){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
        $this->physicalAddress = $physicalAddress;
        $this->phoneNumber = $phoneNumber;
        $this->emailAddress = $emailAddress;
        $this->password = $password;
        $this->homeDistrict = $homeDistrict;
        $this->dateOfBirth = $dateOfBirth;
        $this->profileImage = $profileImage;
    }

    
    // Getter and setter methods for all properties

    public function getFirstName(){
        return $this->firstname;
    }

    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function getGender(){
        return $this->gender;
    }

    public function setGender($gender){
        $this->gender = $gender;
    }

    public function getPhysicalAddress(){
        return $this->physicalAddress;
    }

    public function setPhysicalAddress($physicalAddress){
        $this->physicalAddress = $physicalAddress;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmailAddress(){
        return $this->emailAddress;
    }

    public function setEmailAddress($emailAddress){
        $this->emailAddress = $emailAddress;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getHomeDistrict(){
        return $this->homeDistrict;
    }

    public function setHomeDistrict($homeDistrict){
        $this->homeDistrict = $homeDistrict;
    }

    public function getDateOfBirth(){
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth){
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getProfileImage(){
        return $this->profileImage;
    }

    public function setProfileImage($profileImage){
        $this-> profileImage = $profileImage;
    }
}


?>