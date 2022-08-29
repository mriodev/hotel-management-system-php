<?php
include('./header.php');
// include('./restrict.php');
// include('./connection.php');
include('./links.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        .circle-tile {
            margin-bottom: 15px;
            text-align: center;
        }

        .circle-tile-heading {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 100%;
            color: #FFFFFF;
            height: 80px;
            margin: 0 auto -40px;
            position: relative;
            transition: all 0.3s ease-in-out 0s;
            width: 80px;
        }

        .circle-tile-heading .fa {
            line-height: 80px;
        }
        .circle-tile-heading .fas {
            line-height: 80px;
        }

        .circle-tile-content {
            padding-top: 50px;
        }

        .circle-tile-number {
            font-size: 26px;
            font-weight: 700;
            line-height: 1;
            padding: 5px 0 15px;
        }

        .circle-tile-description {
            text-transform: uppercase;
        }

        .circle-tile-footer {
            background-color: rgba(0, 0, 0, 0.1);
            color: rgba(255, 255, 255, 0.5);
            display: block;
            padding: 5px;
            transition: all 0.3s ease-in-out 0s;
        }

        .circle-tile-footer:hover {
            background-color: rgba(0, 0, 0, 0.2);
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }

        .circle-tile-heading.dark-blue:hover {
            background-color: #2E4154;
        }

        .circle-tile-heading.green:hover {
            background-color: #138F77;
        }

        .circle-tile-heading.orange:hover {
            background-color: #DA8C10;
        }

        .circle-tile-heading.blue:hover {
            background-color: #2473A6;
        }

        .circle-tile-heading.red:hover {
            background-color: #CF4435;
        }

        .circle-tile-heading.purple:hover {
            background-color: #7F3D9B;
        }

        .tile-img {
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
        }

        .dark-blue {
            background-color: #34495E;
        }

        .green {
            background-color: #16A085;
        }

        .blue {
            background-color: #2980B9;
        }

        .orange {
            background-color: #F39C12;
        }

        .red {
            background-color: #E74C3C;
        }

        .blue-gray {
            background-color: #408078;
        }

        .yellow-gray {
            background-color: #a5c456;
        }

        .lite-purple {
            background-color: #bf7bd1;
        }

        .purple {
            background-color: #8E44AD;
        }

        .dark-gray {
            background-color: #7F8C8D;
        }

        .gray {
            background-color: #95A5A6;
        }

        .light-gray {
            background-color: #BDC3C7;
        }

        .yellow {
            background-color: #F1C40F;
        }

        .text-dark-blue {
            color: #34495E;
        }

        .text-green {
            color: #16A085;
        }

        .text-blue {
            color: #2980B9;
        }

        .text-orange {
            color: #F39C12;
        }

        .text-red {
            color: #E74C3C;
        }

        .text-purple {
            color: #8E44AD;
        }

        .text-faded {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>

</head>

<body>
    <div class="container body">
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content dark-blue">
                            <div class="circle-tile-description text-faded"> Customers</div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM guest");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="showcustomer.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                
                
                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading green"><i class="fas fa-user-tie fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded"> Users </div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM user");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="Viewhotels.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading lite-purple"><i class="fas fa-regular fa-hotel fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content lite-purple">
                            <div class="circle-tile-description text-faded"> Hotels </div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM hotel");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="showuser.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading red"><i class="fas fa-bed fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded"> Room Types </div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM roomtype");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="showroomtype.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>  
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading blue-gray"><i class="fas fa-key fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content blue-gray">
                            <div class="circle-tile-description text-faded"> Rooms </div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM room");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="viewrooms.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>  
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="circle-tile ">
                        <a>
                            <div class="circle-tile-heading yellow-gray"><i class="fas fa-file-invoice fa-fw fa-3x"></i></div>
                        </a>
                        <div class="circle-tile-content yellow-gray">
                            <div class="circle-tile-description text-faded"> Reserveations </div>
                            <div class="circle-tile-number text-faded ">
                            <?php
                                $result = mysqli_query($connect, "SELECT * FROM reservation");
                                $rows = mysqli_num_rows($result);
                                echo $rows;
                                ?>
                            </div>
                            <a class="circle-tile-footer" href="reservations.php">More Info<i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>  
                </div>

                
            </div>
        </div>
    </div>
</body>

</html>