<?php

class Dbh {
    // Properties
    private $host = "localhost";
    private $dbname = "myfirstdatabase";
    private $dbusername = "root";
    private $dbpassword = "";

    // Methods
    protected function connect(){
        try{
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Return the pdo
            return $pdo;
        }
        catch(PDOException $e){
            die("Connection Failed: " . $e->getMessage());
        }
    }
}