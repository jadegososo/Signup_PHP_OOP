<?php

class Signup extends Dbh{
    // Properties
    private $username;
    private $pwd;

    // Methods
    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    private function insertUser(){
        $query = "INSERT INTO users (username, pwd) VALUES (:username, :pwd);";

        $stmt = parent::connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":pwd", $this->pwd);
        $stmt->execute();
    }

    private function isEmptySubmit(){
        if(empty($this->username) || empty($this->pwd)){
            return true;
        }
        else{
            return false;
        }
    }

    public function signupUser(){
        // Error handlers
        if($this->isEmptySubmit()){
            header("Location: ../index.php");
            die();
        }

        // If no errors, signup user
        $this->insertUser();
        header("Location: ../includes/welcome.php");
        exit();
    }
}