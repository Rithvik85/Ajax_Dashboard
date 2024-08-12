<?php
include ('../function.php');
$type = $_POST['type'];
$id = $_POST['id'];
if($type == ""){
$obj = new query();
$value = $obj->getCountryData();
foreach($value as $row){
    $data_type = $row->name;
    $data_id = $row->country_id;

    echo "<option value='$data_id'>$data_type</option>";

}
}else if($type == "stateCountry"){ 
    $obj = new query();

    $value = $obj->getStateData($id);
    foreach($value as $row){
        $data_type = $row->name;
        $data_id = $row->state_id;
    
        echo "<option value='$data_id'>$data_type</option>";
    
    }

}

