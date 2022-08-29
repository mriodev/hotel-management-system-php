<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_GET['tpupid'])) {
    $id = $_GET['tpupid'];
    $query = "SELECT * FROM travelpartner WHERE id=$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $discount = $row['discount'];
    $promocode = $row['promocode'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 shadow-sm" style="margin-top: 100px;">
                    <form id="form" action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center my-3">Update Travel Partner</h3>
                        
                        <div class="row">
                        <div class="form-group col-md-6">
                                <label>Partner Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Travel Partner Name" value="<?php echo $name; ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Discount</label>
                                <input type="text" name="discount" id="discount" class="form-control" placeholder="Enter Discount Percentage" value="<?php echo $discount; ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                                <label for="promocode" class="form-label">Promo Code</label>
                                <input type="text" name="promocode" id="promocode" class="form-control" value="<?php echo $promocode; ?>" readonly>
                            </div>
                        </div>


                       

                       
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="travelpartners.php">Back</a>
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
                     name: {
                        required: true
                    },
                    discount: {
                        required: true
                    },
                    
                },
                messages: {
                    name: 'Please enter partner name.',

                    discount: {
                        required: 'Please enter discount percentage.',
                        rangelength: 'discount percentage should be 2 digit number.'
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
        $("#discount").ForceNumericOnly();
    </script>



<?php
if (isset($_POST['submit'])) {

    $e_name = $_POST['name'];
    $e_discount = $_POST['discount'];
    $e_promocode = $_POST['promocode'];

    

    $sql = "update travelpartner set name='$e_name', discount='$e_discount', promocode='$e_promocode' WHERE id='$id'";
    $result = mysqli_query($connect, $sql);

    if ($result == true) {
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
                    window.location = "travelpartners.php";
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

</html>