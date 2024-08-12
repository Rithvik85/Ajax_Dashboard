<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoadData</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error {
            background-color: pink;
            color: red;
            position: absolute;
            right: 20px;
            top: 20px;
            display: none;

        }

        .success {
            background-color: darkolivegreen;
            color: skyblue;
            position: absolute;
            right: 20px;
            top: 20px;
            display: none;


        }

        #save {
            cursor: pointer;
        }

        .modal1 {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            display: none;

        }

        .form-modal {
            background-color: white;
            position: absolute;
            inset: 0;
            margin: auto;
            border-radius: 10px;
            width: 30%;
            height: 55%;


        }

        .form-modal h2 {
            border-bottom: 1px solid black;
        }

        .close-icon {
            position: absolute;
            right: 7px;
            top: -15px;
            cursor: pointer;
            color: red;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="modal1">
        <div class="form-modal shadow-sm">

            <h2 class="text-center">Edit Profile</h2>
            <div class="close-icon">&times;</div>
            <div class="content px-3"></div>
        </div>
    </div>
    <div class="error"></div>
    <div class="success"></div>



    <!-- <button id="loadData">Load Data</button> -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-12">
                

                <div class="search-container d-flex justify-content-between align-items-center bg-light p-2">
                <div class="select-container d-flex ">
                    <div class="country-box me-2">
                        <select name="country" id="country" class="form-control form-select">
                            <option value="">Select Country</option>
                        </select>
                    </div>
                    <div class="state-box">
                        <select name="state" id="state" class="form-control form-select">
                            <option value="">Select State</option>
                        </select>
                    </div>

                </div>
                <div>
                <label for="search">Search:</label>
                <input type="text" name="search" id="search" placeholder="search" autocomplete="off">

                </div>
                    
                </div>
                <div class="data-content shadow">
                    <div id="alldata" class=""></div>

                </div>


            </div>
            <div class=" col-sm-12 col-md-4 col-lg-4 col-12 border shadow-sm">
                <div class="heading border-bottom text-center">
                    <h2>Add Student</h2>
                </div>
                <div class="add-content p-3">

                    <form id="formdata">

                        <div class="mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">

                        </div>
                        <div class="mt-2">
                            <label for="name">subject</label>
                            <input type="text" name="subject" id="subject" class="form-control">

                        </div>

                        <div class="mt-2">
                            <label for="name">marks</label>
                            <input type="text" name="marks" id="marks" class="form-control">

                        </div>
                        <div class="mt-2">
                            <label for="name">Languages :</label><br>
                            <input type="checkbox" name="language" class="lang" value="python">&nbsp;Python
                            <input type="checkbox" name="language" class="lang" value="javascript">&nbsp;JavaScript
                            <input type="checkbox" name="language" class="lang" value="java">&nbsp;Java
                            <input type="checkbox" name="language" class="lang" value="jquery">&nbsp;Jquery

                        </div>
                        <div>
                            <input type="submit" name="submit" id="save" value="Add"
                                class="btn btn-primary form-control mt-3">

                        </div>




                    </form>

                </div>


            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        //loadData from ajax
        $(document).ready(function () {
            function loadData() {
                $.ajax({
                    url: "./controller/loadDataProccess.php",
                    type: "POST",
                    success: function (data) {
                        $('#alldata').html(data);

                    }
                })

            }

            loadData()
            // insert data using ajax

            $('#save').on("click", function (e) {
                e.preventDefault();
                let name = $('#name').val();
                let subject = $('#subject').val();
                let marks = $('#marks').val();
                let languages = [];
                $('.lang').each(function(){
                    if($(this).is(":checked")){
                        languages.push($(this).val())
                    }
                })
                languages = languages.toString()
                

                if (name == "" ||subject == "" || marks == "" || languages.length == 0) {
                    $('.error').html('All fields Required.').slideDown();
                    $('.success').slideUp();


                } else {
                    $.ajax({
                        url: './controller/addProccess.php',
                        type: 'POST',
                        data: { user_name: name, user_subject: subject, user_marks: marks ,lang:languages},
                        success: function (data) {
                            if (data == 1) {
                                loadData()
                                $('#formdata').trigger('reset')
                                $('.success').html('Data Inserted Successfully.').slideDown();
                                $('.error').slideUp();


                            } else {

                                $('.error').html("Can't Save the data").slideDown();
                                $('.success').slideUp();

                            }


                        }
                    })

                }


            })

            //delete record using ajax


            $(document).on("click", '.delete-btn', function () {
                if (confirm("Are you sure ?")) {
                    const studentId = $(this).data('id');
                    const element = this;


                    $.ajax({
                        url: './controller/deleteDataProcess.php',
                        type: 'POST',
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest('tr').fadeOut();
                                $('.success').html('Data Deleted Successfully.').slideDown();
                                $('.error').slideUp();

                            } else {
                                $('.error').html('Not deleted').slideDown();
                                $('.success').slideUp();

                            }

                        }
                    })

                }

            })


            // model open

            $(document).on("click", ".edit-btn", function () {
                $('.modal1').show();
                const st_id = $(this).data('eid');
                $.ajax({
                    url: './controller/load-update-form.php',
                    type: 'POST',
                    data: { id: st_id },
                    success: function (data) {
                        $('.content').html(data);

                    }
                })
            })

            // close model

            $('.close-icon').on("click", function () {
                $('.modal1').hide();

            })

            // update form
            $(document).on("click", '#update-btn', function () {
                const student_id = $('#st_id').val();
                const student_name = $('#st_name').val();
                const student_subject = $('#st_subject').val();
                const student_marks = $('#st_marks').val();
                let languages = [];
                $('.lang').each(function(){
                    if($(this).is(":checked")){
                        languages.push($(this).val())
                    }
                })
                languages = languages.toString()

                $.ajax({
                    url: './controller/updateProcess.php',
                    type: 'POST',
                    data: { id: student_id, name: student_name, subject: student_subject, marks: student_marks,lang:languages  },
                    success: function (data) {
                        if (data == 1) {
                            $('.modal1').hide();
                            alert('Data Updated Successfully')
                            loadData()

                        } else {
                            alert('Data Updated Failed')

                        }


                    }

                })


            })

            //search 
            $('#search').on("input", function () {
                const searchPara = $(this).val();
                $.ajax({
                    url: './controller/searchData.php',
                    type: 'POST',
                    data: { value: searchPara },
                    success: function (data) {
                        $('#alldata').html(data);


                    }
                })
            })

            //load-country

            function CountryStateData(type, category_id) {

                $.ajax({
                    url: "./controller/load-country-state.php",
                    type: "POST",
                    data: { type: type, id: category_id },
                    success: function (data) {
                        
                        if(type  == "stateCountry"){
                            $('#state').html(data);
                        }else{
                            $('#country').append(data);

                        }


                        

                    }
                })

            }
            CountryStateData()



            $('#country').on("change", function () {

                const countryValue = $('#country').val();
                CountryStateData("stateCountry", countryValue)


            });



        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>