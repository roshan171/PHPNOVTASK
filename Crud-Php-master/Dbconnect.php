<?php

class Dbconnect{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "product_man"; 
    protected $conn;                    // $conn has only been declared -- i.e has no value 

    public function __construct(){
 
        if(!isset($this->conn)){     // Here, if $conn has no value , it will enter the __construct()

            // setting the connection to the database!!
            $this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
        }

        return $this->conn;
    }

    // protected $conn = mysqli_connect("localhost","root","","dbconnect");
}



?>