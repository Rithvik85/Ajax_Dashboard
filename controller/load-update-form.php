<?php

include ('../function.php');

$st_id = $_POST['id'];

$output = "";

$obj = new query();
$value = $obj->getUpdateData($st_id );
// print_r($value); die;
if($value){
    foreach($value as $row){
        $id = $row->id;
        $name = $row->name;
        $subject = $row->subject;
        $marks = $row->marks;
        $language = $row->language;

        echo '<div class="mt-3">
                    <label for="name">Name</label>
                    <input type="text" name="st_name" id="st_name" class="form-control" value="' .$name .'">
                    <input type="hidden" name="st_id" id="st_id" class="form-control" value="' .$id .'">

                </div>
                <div class="mt-3">
                    <label for="subject">Subject</label>
                    <input type="text" name="st_subject" id="st_subject" class="form-control" value="' .$subject .'">

                </div>
                <div class="mt-3">
                    <label for="marks">Marks</label>
                    <input type="text" name="st_marks" id="st_marks" class="form-control" value="' .$marks .'">

                </div>
                 <div class="mt-2">
                            <label for="name">Languages :</label><br>
                            <input type="checkbox" name="language" class="lang" value="'.$language.'">&nbsp;Python
                            <input type="checkbox" name="language" class="lang" value="'.$language.'">&nbsp;JavaScript
                            <input type="checkbox" name="language" class="lang" value="'.$language.'">&nbsp;Java
                            <input type="checkbox" name="language" class="lang" value="'.$language.'">&nbsp;Jquery

                        </div>

                <input type="button" name="save" id="update-btn" value="Update"
                    class="btn btn-success form-control mt-3">';

    }
}