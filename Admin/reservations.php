<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>
<?php
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $sql = "delete from reservation where res_id='$del_id'";
    $res = mysqli_query($connect, $sql);
    if ($res == true) {
        echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success!",
                    text: "Deleted success!",
                    icon: "success",
                    buttons: false,
                    timer: 1500,
                  });
            });
            </script>';
    } else {
        echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Error!",
                    text: "Failed!",
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
    <title>Users</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <a class="btn dim_button create_new" href="addreservations.php"> <i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                        </div>
                        <div class="col-sm-8 add_flex">
                            <div class="form-group searchInput">
                                <label for="search">Search:</label>
                                <input type="search" name="search" class="form-control" id="filterbox" placeholder=" ">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x">

                        <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                            <thead>
                            <tr>
                                
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>NIC / Passport No</th>
                                        <th>Mobile</th>
                                        <th>Room Type</th>
                                        <th>No. Of Rooms</th>
                                        <th>Check In</th>
                                        <th>Check Out </th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT reservation.res_id,guest.fname,guest.nic,guest.mobile,roomtype.tname ,reservation.noofrooms,reservation.status, reservation.checkindate ,reservation.checkoutdate FROM reservation JOIN guest ON reservation.cus_id = guest.guestid LEFT JOIN roomtype ON reservation.roomtype_id = roomtype.id";
                                $res = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['res_id'];
                                    $guest = $row['fname'];
                                    $nic = $row['nic'];
                                    $mobile = $row['mobile'];
                                    $room_type = $row['tname'];

                                    $no_of_rooms = $row['noofrooms'];
                                    $checkindate = $row['checkindate'];
                                    $checkoutdate = $row['checkoutdate'];
                                    $status = $row['status'];
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $guest ?></td>
                                        <td><?php echo $nic ?></td>
                                        <td><?php echo $mobile ?></td>
                                        <td><?php echo $room_type ?></td>
                                        <td><?php echo $no_of_rooms ?></td>
                                        <td><?php echo $checkindate ?></td>
                                        <td><?php echo $checkoutdate ?></td>
                                        <td><?php echo $status ?></td>
                                        <td>
                                            <a href="accept_reservation.php?accept=<?php echo $id; ?>" class="btn btn-success">
                                            <i class="fas fa-check"></i>
                                            </a>
                                            <a href="user_reserved.php?cancel=<?php echo $id; ?>" onclick="return confirm('Are you sure to cancel?')" 
                                            class="btn btn-danger"><i class="fas fa-times"></i>
                                            </a>


                                            <a href="updatereservations.php?resupid=<?php echo $id; ?>" class="btn btn-primary"><i class="far fa-edit"></i>
                                            </a>
                                            <a href="reservations.php?del=<?php echo $id; ?>" onclick="return confirm('Are you sure to delete?')" 
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        var dataTable = $('#filtertable').DataTable({
            "pageLength": 6,
            aoColumnDefs: [{
                "aTargets": [7],
                "bSortable": false
            }],
            "dom": '<"top">ct<"top"p><"clear">'
        });
        $("#filterbox").keyup(function() {
            dataTable.search(this.value).draw();
        });
    });
</script>

</html>
