<?php
include ('database.php');

class query{
    function getdata(){
        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "SELECT * from `student` ORDER BY `id` DESC";
        $respond = $mysql->query($sql);
        $result = [];
        while($row = $respond->fetch_object()){
            $result[] = $row;
        }
        return $result;       


    }

    function adddata($name,$subject,$marks,$language){
        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "INSERT INTO `student`(name,subject,marks,language)VALUES('$name','$subject','$marks','$language')";
        $respond = $mysql->query($sql);
        return $respond;
        
        
    }

    function deletedata($id){
        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "DELETE FROM `student` WHERE `id`= '$id'";
        $respond = $mysql->query($sql);
        return $respond;
        
        
    }

    


    function getUpdateData($id){
        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "SELECT * FROM `student` WHERE `id`= '$id'";
        $respond = $mysql->query($sql);
        $result = [];
        while($row = $respond->fetch_object()){
            $result[] = $row;
        }
        return $result;       


    }

    function updateData($id,$name,$subject,$marks,$language){
        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "UPDATE `student` SET `name`='$name',`subject`='$subject',`marks`='$marks',`language`='$language' WHERE `id`= '$id'";
        $respond = $mysql->query($sql);
        return $respond;
        
        
    }
    function searchData($search){

        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "SELECT * from `student` WHERE `name` LIKE '%$search%'";
        $respond = $mysql->query($sql);
        $result = [];
        while($row = $respond->fetch_object()){
            $result[] = $row;
        }
        return $result;    
       
        
        
    }

    function getCountryData(){

        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "SELECT * from `country`";
        $respond = $mysql->query($sql);
        $result = [];
        while($row = $respond->fetch_object()){
            $result[] = $row;
        }
        return $result;    
       
        
        
    }

    function getStateData($id){

        $obj = new connection();
        $mysql = $obj->connect();

        $sql = "SELECT * from `state` WHERE `cid` = '$id'";
        $respond = $mysql->query($sql);
        $result = [];
        while($row = $respond->fetch_object()){
            $result[] = $row;
        }
        return $result;    
       
        
        
    }
}