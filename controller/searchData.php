<?php

include ('../function.php');
$search = $_POST['value'];

$obj = new query();
$value = $obj->searchData($search);
$total = count($value);
$i = 1;

if($total >0){

    echo '<table border="1px" width="100%" class=" table table-striped" >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Languages</th>
                <th>Action</th>
                <!-- Add other table headers as needed -->
            </tr>';

            foreach($value as $row){
                $id = $row->id;
                $name = $row->name;
                $subject = $row->subject;
                $marks = $row->marks;
                $language = $row->language;
                

                echo'

                <tr>
                <td>'.$i++.'</td>
                <td>'.$name.'</td>
                <td>'.$subject.'</td>
                <td>'.$marks.'</td>
                <td>'.$language.'</td>

                <td><button class="btn btn-danger delete-btn" data-id='.$id.'>Delete</button>&nbsp;
                <button class="btn btn-success edit-btn" data-eid='.$id.'>Edit</button></td>
                
                </tr>
                
                ';
            }

}else{
    echo '<h1 class="text-danger">Data Not Found !</h1>';
}