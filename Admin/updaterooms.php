<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_GET['rupid'])) {
    $id = $_GET['rupid'];
    $query = "SELECT * FROM room WHERE id=$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $location = $row['hotel_id'];
    $roomtype = $row['roomtype_id'];
    $roomno = $row['room_number'];
    $status = $row['status'];

    $query1 = "SELECT roomtype.price FROM room JOIN roomtype ON roomtype.id = room.roomtype_id WHERE room.id = $id";
    $res1 = mysqli_query($connect, $query1);
    $row1 = mysqli_fetch_assoc($res1);
    $price = $row1['price'];
}
?>

<?php
if (isset($_POST['submit'])) {

    $e_location = $_POST['location'];
    $e_roomtype = $_POST['roomtype'];
    $e_roomno = $_POST['roomno'];
    $e_status = $_POST['status'];

    $sql = "update room set hotel_id='$e_location', roomtype_id='$e_roomtype', room_number= '$e_roomno', status='$e_status' WHERE id='$id'";
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
                    window.location = "viewrooms.php";
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Update Rooms</title>
</head>

<body>
<div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 shadow-sm" style="margin-top: 100px;">
                <div class="my-4">
        <h2 class="text-center">Update Rooms</h2>
        <br><br>
        <div class="text-center">
        </div>
        <form id="form" method="post" enctype="multipart/form-data">

            <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Hotel</label>
                        <select class="form-control" id="location" name="location">
                        <option value="<?php echo $location; ?>" selected disabled>--Select Hotel--</option>


                        <?php
                                    $res = mysqli_query($connect, "SELECT * FROM hotel");
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo $row["hotelcode"]; ?>" <?php if ($row["hotelcode"] == $location) echo "selected" ?>>
                                            <?php echo $row["location"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                    
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Room Type</label>
                        <select class="form-control" id="roomtype" name="roomtype">
                        <option value="<?php echo $roomtype; ?>" selected disabled>--Select Room Type--</option>

                        <?php
                                    $res = mysqli_query($connect, "SELECT * FROM roomtype");
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>" <?php if ($row["id"] == $roomtype) echo "selected" ?>>
                                            <?php echo $row["tname"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>

                        
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="roomno" class="form-label">Room No</label>
                        <input type="text" name="roomno" id="roomno" class="form-control" value="<?php echo $roomno; ?>" placeholder="Enter year">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="roomrate" class="form-label">Room Rate</label>
                        <input type="text" name="roomrate" id="roomrate" class="form-control" value="<?php echo $price; ?>"  placeholder="Room Rate" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Status</label>
                        <select class="form-control" id="status" name="status">
                        <option> <?php echo $status; ?> </option>
                            <option value="Available">Available</option>
                            <option value="UnAvailable">UnAvailable</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-block" href="viewrooms.php">Back</a>
                </div>
            </div>
            <br><br>
        </form>
    </div>
    </div>
    </div>
    </div>

    </div>

</body>

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
                roomtype: {
                    required: true
                },
                roomno: {
                    required: true
                },
                
                status: {
                    required: true,
                },
            },
            messages: {
                location: 'Please select hotel location.',
                roomtype: 'Please select room type.',
                roomno: 'Please enter valid room number',
                status: 'Please select status'
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#roomtype').select2();
    });
</script>
<style>
    .error {
        color: red;
    }
</style>

<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                roomtype: {
                    required: true
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    $('#roomtype').change(function() {
        var id = $(this).find(":selected").val();
        var dataString = 'lid=' + id;
        $.ajax({
            url: "load.php",
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(data) {
                var roomrate = $('#roomrate').val(data.price);

                $("#roomtype").blur();
            }
        });
    });
    $('#roomtype').blur(function() {
        var roomrate = $('#roomrate').val();

    });
</script>




</html>