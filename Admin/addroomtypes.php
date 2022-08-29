<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_POST["submit"])) {

    $tname = $_POST['tname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];



    $query = "INSERT INTO roomtype (tname,price,description,image) VALUES('$tname', '$price', '$description', '$image')";
    $res = mysqli_query($connect, $query);

    if ($res) {
        move_uploaded_file($tmp_name, "images/$image");
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Room type added successfully!",
                icon: "success",
                buttons: false,
                timer: 1500,
              }).then(function() {
                window.location = "showroomtype.php";
            });
        });
        </script>';
    } else {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Error!",
                text: "Room type added failed!",
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
                        <h3 class="text-center my-3">Register</h3>
                        <div class="text-center">
                            <img src="images/Room.jpeg" height="100px" width="100px" id="roompic" alt="">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image" onchange="
                                document.getElementById('roompic').src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Room Type</label>
                                <input type="text" name="tname" class="form-control" placeholder="Enter Room Type" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Room Rate</label>
                                <input type="text" name="price" id="rate" class="form-control" placeholder="Enter Room Rate" autocomplete="off">

                            </div>

                            <div class="form-group col-md-6">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Description" autocomplete="off">

                            </div>
                        </div>

                       
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Add">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="showroomtype.php">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    tname: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    price: {
                        required: true
                    },


                    
                },
                messages: {
                    roomtype: 'Please enter room type.',
                    description: 'Please enter description.',
                    
                    rate: {
                        required: 'Please enter rate.',
                        rangelength: 'rate should be 10 digit number.'
                    },
        
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
        $("#rate").ForceNumericOnly();
    </script>
    
</body>

</html>