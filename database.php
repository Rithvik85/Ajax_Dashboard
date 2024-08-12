<?php

class connection{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    function connect(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->dbname="teacher_portal";

        $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if($conn->connect_error){
            echo $conn->connect_error;

        }else{
            return $conn;
        }
    }
}
