<?php

include ('../function.php');

$name = $_POST['user_name'];
$subject = $_POST['user_subject'];
$marks = $_POST['user_marks'];
$language= $_POST['lang'];

$obj = new query();
$value = $obj->adddata($name,$subject,$marks,$language);

if($value){
    echo "1";
}else{
    echo "0";
}