<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_GET['rtupid'])) {
    $id = $_GET['rtupid'];
    $query = "SELECT * FROM roomtype WHERE id=$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $tname = $row['tname'];
    $price = $row['price'];
    $image = $row['image'];
    $description = $row['description'];
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
                        <?php if (empty($image)) : ?>
                <img id="roompic" style="width:150px;height:150px; object-fit:cover;border-radius: 15px;" src="images/Room.jpeg">
            <?php else : ?>
                <img id="roompic" style="width:150px;height:150px; object-fit:cover;border-radius: 15px" src="images/<?php echo $image ?>">
            <?php endif ?>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                            <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" accept=".png,.jpg,.jpeg,.gif,.tif" style="border:0px!important;" onchange="document.getElementById('roompic').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Room Type</label>
                                <input type="text" name="tname" class="form-control" placeholder="Enter Room Type" value="<?php echo $tname; ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Room Rate</label>
                                <input type="text" name="price" id="rate" class="form-control" placeholder="Enter Room Rate" value="<?php echo $price; ?>" autocomplete="off">

                            </div>

                            <div class="form-group col-md-6">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Description" value="<?php echo $description; ?>" autocomplete="off">

                            </div>
                        </div>

                       
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">
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

<?php
if (isset($_POST['submit'])) {

    $e_tname = $_POST['tname'];
    $e_price = $_POST['price'];
    $e_description = $_POST['description'];
    $e_image = $_FILES['image']['name'];
    $e_tmp_name = $_FILES['image']['tmp_name'];

    if (empty($e_image)) {
        $e_image = $image;
    }

    $sql = "update roomtype set tname='$e_tname', price='$e_price', description= '$e_description', image='$e_image' WHERE id='$id'";
    $result = mysqli_query($connect, $sql);

    if ($result == true) {
        move_uploaded_file($e_tmp_name, "images/$e_image");
        echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success!",
                    text: "Updated success!",
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
                    text: "Update Failed!",
                    icon: "error",
                  });
            });
            </script>';
    }
}
?>
    
</body>

</html>