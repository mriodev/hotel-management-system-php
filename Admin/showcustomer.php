<?php
include('./header.php');
include('./links.php');
// include(isset($_SESSION['aduser']))
include('./connection.php');
//include('./restrict.php');
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
                            <!-- <a class="btn dim_button create_new" href="addguests.php"> <i class="fa fa-plus" aria-hidden="true"></i> Create New</a> -->
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
                                    <th scope="col">Id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Guest Type</th>
                                    <th scope="col">NIC/ Passport</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Company Name</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $query = "SELECT * FROM guest ";
                                $res = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $guestid = $row['guestid'];
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $type = $row['type'];
                                    $nic = $row['nic'];
                                    $mobile = $row['mobile'];
                                    $email = $row['email'];
                                    $companyname = $row['companyname'];
                                    //$promocode = $row['promocode'];
                                ?>
                               
                                    <tr>
                                        <td><?php echo $guestid ?></td>
                                        <td><?php echo $fname ?></td>
                                        <td><?php echo $lname ?></td>
                                        <td><?php echo $type ?></td>
                                        <td><?php echo $nic ?></td>
                                        <td><?php echo $mobile ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $companyname ?></td>
                                        <!-- <td>
                                            <a href="update.php?updateid=<?php echo $id; ?>" class="btn btn-primary"><i class="far fa-edit"></i>
                                            </a>
                                            
                                                <a href="sowuser.php?del=<?php echo $id; ?>" onclick="return confirm('Are you sure to delete?')" 
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                </a>
                                        </td> -->
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