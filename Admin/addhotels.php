<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_POST["submit"])) {

    $location = $_POST['location'];
    $phone_no = $_POST['phone_no'];


    $query = "INSERT INTO hotel (location,phone_no) VALUES('$location', '$phone_no')";
    $res = mysqli_query($connect, $query);

    if ($res) {
        // move_uploaded_file($tmp_name, "images/$image");
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Hotel added successfully!",
                icon: "success",
                buttons: false,
                timer: 1500,
              }).then(function() {
                window.location = "Viewhotels.php";
            });
        });
        </script>';
    } else {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Error!",
                text: "Hotel added failed!",
                icon: "error",
              });
        });
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 shadow-sm" style="margin-top: 100px;">
                    <form id="form" action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center my-3">Add Hotels</h3>
                        
                        <div class="row">
                        <div class="form-group col-md-6">
                                <label>Hotel Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Enter Hotel Location" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mobile</label>
                                <input type="text" name="phone_no" id="mobile" class="form-control" placeholder="Enter Hotel Mobile No" maxlength = "10" autocomplete="off">
                            </div>
                        </div>

                       

                       
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="Viewhotels.php">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


    <div class="" style="margin-top: 30px;"></div>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                     location: {
                        required: true
                    },
                    phone_no: {
                        required: true
                    },
                    
                },
                messages: {
                    location: 'Please enter location.',

                    phone_no: {
                        required: 'Please enter mobile number.',
                        rangelength: 'Mobile number should be 10 digit number.'
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        jQuery.fn.ForceNumericOnly =
            function() {
                return this.each(function() {
                    $(this).keydown(function(e) {
                        var key = e.charCode || e.keyCode || 0;
                        return (
                            key == 8 ||
                            key == 9 ||
                            key == 13 ||
                            key == 46 ||
                            key == 110 ||
                            key == 190 ||
                            (key >= 35 && key <= 40) ||
                            (key >= 48 && key <= 57) ||
                            (key >= 96 && key <= 105));
                    });
                });
            };
        $("#mobile").ForceNumericOnly();
    </script>
</html>