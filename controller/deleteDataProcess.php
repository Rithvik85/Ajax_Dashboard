<?php

include ('../function.php');
$student_id = $_POST['id'];

$obj = new query();
$value = $obj->deletedata($student_id );

if($value){
    echo 1;
}else{
    echo 0;
}