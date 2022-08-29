<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_POST["submit"])) {

    $location = $_POST['location'];
    $roomtype = $_POST['roomtype'];
    $roomno = $_POST['roomno'];
    $status = $_POST['status'];


    $query = "INSERT INTO room (room_number,status,hotel_id,roomtype_id) VALUES('$roomno', '$status', '$location', '$roomtype')";
    $res = mysqli_query($connect, $query);

    if ($res) {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Room added successfully!",
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
                text: "Room added failed!",
                icon: "error",
              });
        });
        </script>';
    }
}
?>

<?php
function fill_addrooms($connect)
{
    $output = '';
    $query = "SELECT * FROM roomtype";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["tname"] . '</option>';
    }
    return $output;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
<div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 shadow-sm" style="margin-top: 100px;">
                <div class="my-4">
        <h2 class="text-center">Add Rooms</h2>
        <br><br>
        <div class="text-center">
        </div>
        <form id="form" method="post" enctype="multipart/form-data">

            <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Hotel</label>
                        <select class="form-control" id="location" name="location">
                        <option value="" selected disabled>--Select Hotel--</option>
                        <?php
                                    $res = mysqli_query($connect, "SELECT * FROM hotel");
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?php echo $row["hotelcode"]; ?>">
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
                        <option value="" selected disabled>--Select Room Type--</option>
                        <?php echo fill_addrooms($connect   ) ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="roomno" class="form-label">Room No</label>
                        <input type="text" name="roomno" id="roomno" class="form-control" placeholder="Enter Room Number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="roomrate" class="form-label">Room Rate</label>
                        <input type="text" name="roomrate" id="roomrate" class="form-control" placeholder="Room Rate" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Status</label>
                        <select class="form-control" id="status" name="status">
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
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Add</button>
                </div>
                <div class="col-6">
                    <a class="btn btn-success btn-block" href="showbook.php">Back</a>
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