<?php

include ('../function.php');
$id = $_POST['id'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];
$language = $_POST['lang'];

$obj = new query();
$value = $obj->updateData($id,$name,$subject,$marks,$language);
if($value){
    echo 1;

}else{
    echo 0;
}