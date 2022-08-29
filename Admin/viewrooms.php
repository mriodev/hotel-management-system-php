<?php
include('./header.php');
// include('./restrict.php');
include('./connection.php');
include('./links.php');

?>
<?php
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $sql = "delete from room where id='$del_id'";
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
<div class="container body">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <a class="btn dim_button create_new" href="addrooms.php"> <i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
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
                                        <th>Hotel</th>
                                        <th>Room No</th>
                                        <th>Room Type</th>
                                        <th>Room Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                $query = "SELECT room.room_number ,room.id,room.status, roomtype.id as rmt_id ,roomtype.tname, roomtype.price,hotel.location, hotel.hotelcode FROM room JOIN roomtype ON roomtype.id = room.roomtype_id JOIN hotel ON hotel.hotelcode = room.hotel_id";
                                $res = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $hotel = $row['location'];
                                    $room_number = $row['room_number'];
                                    $room = $row['tname'];
                                    $price = $row['price'];

                                    $hotelcode = $row['hotelcode'];
                                    $rmt = $row['rmt_id'];
                                    $status = $row['status'];
                                ?>
                                   
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $hotel ?></td>
                                            <td><?php echo $room_number ?></td>
                                            <td><?php echo $room ?></td>
                                            <td><?php echo $price ?></td>
                                            <td><?php echo $status ?></td>
                                            <td><a href="updaterooms.php?rupid=<?php echo $id; ?>" class="btn btn-primary"><i class="far fa-edit"></i>
                                            </a>
                    
                                                <a href="viewrooms.php?del=<?php echo $id; ?>" onclick="return confirm('Are you sure to delete?')" 
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                </a></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>