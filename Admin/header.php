<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="title icon" href="~/images/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/bootstrap/dist/css/bootstrap.min.css">
</head>
<?php

    include('./restrict.php');

include('./connection.php');    
?>
<?php

$url_array =  explode('/', $_SERVER['REQUEST_URI']);
$url = end($url_array);
?>
<?php
if(isset($_SESSION['aduser']) || isset($_SESSION['manuser']) || isset($_SESSION['cluser']))
{
    $set_id=$_SESSION['id'];
    $sql = "select * from user where id='$set_id'";
    $res = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($res);
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $profile = $row['profile'];
    $role = $row['role'];
}
?>



<body>
    <!--wrapper start-->
    <div class="wrapper">
        <!--header satrt-->
        <div class="header">
            <div class="header-menu">
                <div class="title">Queensbury <span>Hotels</span></div>
                <div class="sidebar-btn">
                </div>
                <ul>
                    <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header end-->

        <!--sidebar start-->
        <div class="sidebar">
            <ul class="sidebar-menu">
            <li class="text-center profile">
                    <?php if ($profile) : ?>
                        <img src="images/<?php echo $profile ?>">
                    <?php else : ?>
                        <img src="images/admin.png">
                    <?php endif ?>
                    <div class="text-muted">
                        <?php echo $fname; ?>
                    </div>
                    <div class="text-primary" style="user-select:none;">(<?php echo $role ?>)</div>
                </li>
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>           
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'dashboard.php') {
                                            echo "current";
                                        } ?>" href="dashboard.php"><i class="fas fa-home mar"></i><span>Dashboard</span></a>
                </li>
                <?php }?>
                
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'showcustomer.php' || $url == 'addguests.php' || isset($_GET['updateid'])) {
                                            echo "current";
                                        } ?>" href="showcustomer.php"><i class="fas fa-user mar"></i> <span>Guests</span></a>
                </li>
                <?php }?>
                
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'showuser.php' || $url == 'userregister.php' || isset($_GET['updateid'])) {
                                            echo "current";
                                        } ?>" href="showuser.php"><i class="fas fa-user-tie mar"></i> <span>Users</span></a>
                </li>
                <?php }?>
                 
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'travelpartners.php' || $url == 'addtravelpartner.php' || isset($_GET['updateid'])) {
                                            echo "current";
                                        } ?>" href="travelpartners.php"> <i class="fas fa-location-arrow mar"></i> <span>Travel Partners</span></a>
                </li>
                <?php }?>
                

                <!-- <li class="item">
                    <a class="menu-btn <?php if ($url == 'payment.php' || isset($_GET['dbid']) || isset($_GET['ubid'])) {
                                            echo "current";
                                        } ?>" href="payment.php"><i class="fas fa-file-invoice-dollar mar"></i><span>Payments</span></a>
                </li> -->
                
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'viewhotels.php' || isset($_GET['dbid']) || isset($_GET['upid']) || $url == 'addhotels.php') {
                                            echo "current";
                                        } ?>" href="viewhotels.php"><i class="fas fa-regular fa-hotel mar"></i><span>Hotels</span></a>
                </li>
                <?php }?>
                
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>                       
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'viewrooms.php' || isset($_GET['dbid']) || isset($_GET['ubid']) || $url == 'addrooms.php') {
                                            echo "current";
                                        } ?>" href="viewrooms.php"><i class="fas fa-key mar"></i><span>Rooms</span></a>
                </li>
                <?php }?>
                
                <?php 
                if(isset($_SESSION['aduser'])){
                ?>  
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'showroomtype.php' || $url == 'addroomtypes.php' || isset($_GET['updateid'])) {
                                            echo "current";
                                        } ?>" href="showroomtype.php"><i class="fas fa-bed mar"></i> <span>Room Facilities</span></a>
                </li>
                <?php }?>
                 
                <?php 
                if(!isset($_SESSION['manuser'])){
                ?>  
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'reservations.php' || $url == 'addreservations.php' || isset($_GET['updateid'])) {
                                            echo "current";
                                        } ?>" href="reservations.php"><i class="fas fa-file-invoice mar"></i> <span>Reservation</span></a>
                </li>
                <?php }?>


                <?php 
                if(!isset($_SESSION['cluser'])){
                ?>                        
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'report.php' || $url == '' || isset($_GET[''])) {
                                            echo "current";
                                        } ?>" href="report.php"><i class="fas fa-file-invoice mar"></i> <span>Reservation Report</span></a>
                </li>
                <?php }?>


                <?php 
                if(!isset($_SESSION['cluser'])){
                ?>                        
                <li class="item">
                    <a class="menu-btn <?php if ($url == 'paymentreport.php' || $url == '' || isset($_GET[''])) {
                                            echo "current";
                                        } ?>" href="paymentreport.php"><i class="fas fa-file-invoice mar"></i> <span>Payment Reports</span></a>
                </li>   
                <?php }?>



                


                <li class="item" style="padding-bottom: 50px">
                    <a href="settings.php" class="menu-btn <?php if ($url == 'settings.php') {
                                                                echo "current";
                                                            } ?>"><i class="fas fa-cog  mar"></i><span>Settings</span></a>
                </li>
            </ul>
        </div>
        <!--sidebar end-->

    </div>
</body>

</html>