<?php
include('./links.php');
include('./connection.php');

// include('./restrict.php');
?>


<?php
if (isset($_POST["submit"])) {

    $location = $_POST['location'];
    $roomtype = $_POST['roomtype'];
    $checkindate = $_POST['checkindate'];
    $checkoutdate = $_POST['checkoutdate'];
    $reservedate = $_POST['reservedate'];
    $noofrooms = $_POST['noofrooms'];
    $noofoccupants = $_POST['noofoccupants'];
    $totalamount = $_POST['roomrates'];
    $status = 'Pending';

    $restaurant = isset($_POST['restaurant'])? $_POST['restaurant'] :'';
    $roomservice = isset($_POST['roomservice'])?$_POST['roomservice']:'';
    $telephone = isset($_POST['telephone'])?$_POST['telephone']:'';
    $laundry = isset($_POST['laundry'])?$_POST['laundry']:'';
    $club = isset($_POST['club'])?$_POST['club']:'';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $type = $_POST['guesttype'];
    $companyname = $_POST['companyname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $promocode = $_POST['promocode'];


    $fetch_id="SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'hotelsun'
    AND   TABLE_NAME   = 'reservation'";
    $res_id = mysqli_query($connect, $fetch_id);
    $rowww=mysqli_fetch_array($res_id);
    $vall=$rowww[0];

    $guest_id="SELECT `AUTO_INCREMENT`
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'hotelsun'
    AND   TABLE_NAME   = 'guest'";
    $res_id1 = mysqli_query($connect, $guest_id);
    $rowww1=mysqli_fetch_array($res_id1);
    $vall1=$rowww1[0];

    /*<?php echo $rowww[0] ?>*/

    $query = "INSERT INTO reservation (cus_id,hotelid,roomtype_id,checkindate,checkoutdate,reservedate,noofrooms,noofoccupants,totalamount,status,clubcharge,laundrycharge,restaurantcharge,roomservice,telephonecharge) VALUES('$vall1', '$location', '$roomtype', '$checkindate', '$checkoutdate', '$reservedate', '$noofrooms', '$noofoccupants', '$totalamount', '$status','$club','$laundry','$restaurant','$roomservice','$telephone')";
    $res = mysqli_query($connect, $query);


    $query1 = "INSERT INTO guest (fname,lname,nic,type,companyname,email,mobile,promocode) VALUES('$fname', '$lname', '$nic', '$type', '$companyname', '$email', '$mobile', '$promocode')";
    $res1 = mysqli_query($connect, $query1);
    
    if ($res) {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Room reserved successfully!",
                icon: "success",
                buttons: false,
                timer: 1500,
                }).then(function() {
                    window.location = "./invoice/index.php?resid='.$vall.'";
                    });
                    });
                    </script>';
                } else {
                    echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Room reservation failed!",
                            icon: "error",
                            });
                            });
                            </script>';
                        }
                    }

                    ?>
                    <script>
    // var x='test'
    // alert("test ")
</script>
<!-- rsv=<?php echo $id; ?> -->

<?php
function fill_Promo($connect)
{
    $outputpr = '';
    $querypr = "SELECT * FROM travelpartner";
    $resultpr = mysqli_query($connect, $querypr);
    while ($rowpr = mysqli_fetch_array($resultpr)) {
        $outputpr .= '<option value="' . $rowpr["promocode"] . '">' . $rowpr["promocode"] . '</option>';
    }
    return $outputpr;
}
?>

<?php

function fill_reservation($connect)
{
    $output = '';
    $query = "SELECT * FROM travelpartner";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<option value="' . $row["id"] . '">' . $row["discount"] . '</option>';
    }
    return $output;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>

    <title>QUEENSBURY HOTELS</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="./css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="./css/chocolat.css" type="text/css" media="screen">
<link href="./css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="./css/jquery-ui.css" />
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="./js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!--//fonts-->

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,
600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
    <!-- <link href="userassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="userassets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
    </head>
    <body>
        <!-- header -->
        <div class="banner-top">
         <div class="social-bnr-agileits">
            <ul class="social-icons3">
                <li><a href="https://www.facebook.com/" class="fa fa-facebook icon-border facebook"> </a></li>
                <li><a href="https://twitter.com/" class="fa fa-twitter icon-border twitter"> </a></li>
                <li><a href="https://plus.google.com/u/0/" class="fa fa-google-plus icon-border googleplus"> </a></li> 
            </ul>
        </div>
        <div class="contact-bnr-w3-agile">
            <ul>
               <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">INFO@QUEENSBURY.COM</a></li>
               <li><i class="fa fa-phone" aria-hidden="true"></i><a>+94 (65)222-44-55</a></li>	

           </ul>
       </div>
       <div class="clearfix"></div>
   </div>
   <div class="w3_navigation">
      <div class="container">
         <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <h1><a class="navbar-brand" href="index.php">QUEENSBURY  <span>HOTELS</span><p class="logo_w3l_agile_caption">Your Dreamy Resort</p></a></h1>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
           <nav class="menu menu--iris">
              <ul class="nav navbar-nav menu__list">

              </ul>
          </nav>
      </div>
  </nav>

</div>
</div>
<!-- //header -->

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .avatar-xl img {
        width: 110px;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    .text-muted {
        font-weight: 300;
    }



    ::-webkit-file-upload-button {
        cursor: pointer;
    }

    input[type=file] {
        cursor: pointer;
    }
</style>
</head>

<body>
    <!-- <input value="" id="Oldpassword" type="hidden" style="display: none;"> -->


    <div class="container body">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">Customer Details</h2>
                <div class="my-4">
                    <form id="formres" method="post" enctype="multipart/form-data">
                        <input value="" id="role" name="role" type="hidden" style="display: none;">

                        <div class="row align-items-center">
                            <!-- <div class="col-md-3 text-center mb-5">
                                <label for="emp_image" style="cursor:pointer" class="avatar avatar-xl"> -->
                                    <div class="text-center">
                                        <!-- <img src="images/admin.png" height="100px" width="100px" id="profilepic" alt=""> -->
                                    </div>
                                </label>
                                <!-- <input type="file" id="emp_image" name="emp_image" style="display: none" accept=".png,.jpg,.jpeg,.gif,.tif" 
                                onchange="document.getElementById('profilePicture').src = window.URL.createObjectURL(this.files[0])">
                            </div> -->
                            <!-- <div class="col">
                                <div class="row mb-5 align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">Hi, <b></b></h4>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <hr class="my-4" /> -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">First Name</label>
                                <input name="fname" class="form-control" id="fname" autocomplete="off" value="" 
                                placeholder="Enter first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Last Name</label>
                                <input class="form-control" id="lname" name="lname" autocomplete="off" value=""
                                placeholder="Enter last name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Mobile</label>
                                <input name="mobile" class="form-control" id="mobile" maxlength="10" autocomplete="off" value="" 
                                placeholder="Enter Mobile Number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" autocomplete="off" value=""
                                placeholder="Enter Email ID">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="" class="form-label">NIC / Passport No</label>
                                <input class="form-control" id="nic" name="nic" autocomplete="off" value=""
                                placeholder="Enter NIC / Passport No">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Guest Type</label>
                                <select class="form-control" name="guesttype" id="guesttype" onChange="changetext()">
                                    <option disabled selected>Select Guest Type</option>
                                    <option value="Normal Customer">Normal Customer</option>
                                    <option value="Travel Company">Travel Company</option>
                                </select>
                            </div>
                        </div>

                        <!-- </form> -->
                        <br><br>
                        <!-- <form id="formPass" method="post" enctype="multipart/form-data"> -->
                            <h2 class="h3 mb-4 page-title">Company Details</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                                    <select class="form-control" name="companyname" id="companyname">
                                        <option disabled selected>Select Company Name</option>
                                        <?php
                                        $res = mysqli_query($connect, "SELECT * FROM travelpartner");
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo $row["name"]; ?>">
                                                <?php echo $row["name"]; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Promo Code</label>
                                <input class="form-control" id="promocode" name="promocode" autocomplete="off" value=""
                                placeholder="Enter Your Promo Code">
                                <!-- <select class="form-control" id="promocode" name="promocode">
                        <option value="" selected disabled>--Select Room Type--</option>
                        <?php //echo fill_Promo($connect) ?>
                        </select> -->
                            </div>
                        </div>
                        <br>

                        <div class = "form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Discount Amont($)</label>
                                <input class="form-control" id="discount" name="discount" onchange="updatePrice()" autocomplete="off" value="" >
                            </div>
                        </div>
                        <!-- </form> -->
                        <br><br>

                        <?php
                        $getid = $_GET['id'];
                        $res = mysqli_query($connect, "SELECT * FROM roomtype WHERE tname ='$getid'");
                        while ($row = mysqli_fetch_array($res)) {
                           $pr=$row["price"];

                       }
                       ?>
                       <!-- <form id="formPass" method="post" enctype="multipart/form-data"> -->
                        <h2 class="h3 mb-4 page-title">Room Details</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Hotel Location</label>
                                <select class="form-control" name="location" id="location">
                                    <option disabled selected>Select Hotel Location</option>
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

                            <div class="form-group col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label"> Room Type</label>
                                    <input name="roomtype" class="form-control" id="roomtype"
                                    value="<?php  $getid = $_GET['id']; echo $getid; ?>" placeholder="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="" class="form-label">Room Price($)</label>
                              <input class="form-control" id="roomprice" name="roomprice" 
                              value="<?php $price = number_format($pr, 2); echo $price ?>" readonly>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="noofrooms" class="form-label">Room Count</label>
                            <input name="noofrooms" class="form-control" id="noofrooms" maxlength="10" onchange="updatePrice()"
                            autocomplete="off" value=""  placeholder="Enter Number of Rooms">
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="noofoccupants" class="form-label">No Of Occupants</label>
                            <input name="noofoccupants" class="form-control" id="noofoccupants" 
                            autocomplete="off" value=""  placeholder="Enter The Occupants Count">
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #8c8b8b; margin-top: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reservedate" class="form-label">Reservation Date</label>
                            <input name="reservedate" id="reservedate" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="checkindate" class="form-label">Check In Date</label>
                            <input name="checkindate" id="checkindate" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="checkoutdate" class="form-label">Check Out Date</label>
                            <input name="checkoutdate" id="checkoutdate" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
                        </div>

                        <div class="form-group col-md-6">
                            <div class="mb-3">

                                <label for="roomrate" class="form-label">Total Amount($)</label>

                                <input type="text" name="roomrates" id="roomrates" class="form-control"
                                placeholder="Room Rate" readonly value="0">
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #8c8b8b; margin-bottom: 10px;">


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="150.00" id="club" name="club" onClick="updatePrice()">
                        <label class="form-check-label" for="club">
                            Club Facility ($150)
                        </label>
                    </div>
                    <Br> 

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="120.00" id="laundry" name="laundry" onClick="updatePrice()">
                        <label class="form-check-label" for="laundry">
                            Laundry Facility ($120)
                        </label>
                    </div>
                    <Br>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="250.00" id="restaurant" name="restaurant" onClick="updatePrice()">
                        <label class="form-check-label" for="restaurant">
                            Restaurant Facility ($250)
                        </label>
                    </div>
                    <Br>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="35.00" id="roomservice" name="roomservice" onClick="updatePrice()">
                        <label class="form-check-label" for="roomservice">
                            Room Service ($35)
                        </label>
                    </div>
                    <Br>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="80.00" id="telephone" name="telephone" onClick="updatePrice()">
                        <label class="form-check-label" for="telephone">
                            Telephone Services ($80)
                        </label> 
                    </div>
                    <Br>



                    <hr class="my-4" />
                    <div class="row">
                        <div class="col-md-6">
                            <input  type="submit" name="submit" class="btn btn-primary btn-block"  value="Reserve">
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success btn-block" href="index.php">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<style>
    .error {
        color: red;
    }
</style>
<script>
    $(document).ready(function() {
        $('#formres').validate({
            rules: {
                fname: {
                    required: true
                },
                lname: {
                    required: true
                },
                nic: {
                    required: true
                },
                guesttype: {
                    required: true
                },
                location: {
                    required: true
                },
                roomtype: {
                    required: true
                },
                checkindate: {
                    required: true
                },
                checkoutdate: {
                    required: true
                },
                noofrooms: {
                    required: true
                },
                noofoccupants: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                },
                mobile: {
                    required: true,
                    rangelength: [9, 10],
                    number: true,
                },
            },
            messages: {
                fname: 'Please enter first name.',
                lname: 'Please enter last name.',
                nic: 'Please enter nic / passport number.',
                guesttype: 'Please select guest type.',
                location: 'Please select location.',
                roomtype: 'Please select room type.',
                checkindate: 'Please pic a check in date.',
                checkoutdate: 'Please pic a check out date.',
                noofrooms: 'Please select room count.',
                noofoccupants: 'Please enter the occupant count.',


                email: {
                    required: 'Please enter Email Address.',
                    email: 'Please enter a valid Email Address.',
                },
                mobile: {
                    required: 'Please enter mobile number.',
                    rangelength: 'Mobile number should be 10 digit number.'
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
    $("#mobile").ForceNumericOnly();
</script>

<script>

$('#promocode').keyup(function() {
        //  var code = $(this).on("onChange").val();
        var prcd = $(this).val();
        console.log()

        //var code = $('#promocode').val();
        // var dataString = 'prcd=' + id;
        $.ajax({
            type:'POST',
            url: "promoload.php",
            // dataType: "json",
            cache: false,
            data: {prcd:prcd},
            success: function(data) {
            //    $('#discount').html(data.discount);
            var roomrate = $('#discount').val(data);
            // console.log(data)
                // $("#promocode").blur();
             
            }
        });
    });

/*
    $('#roomtype').change(function() {
        var id = $(this).find(":selected").val();
        var dataString = 'lid=' + id;
        $.ajax({
            url: "./Admin/load.php",
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(data) {
                var roomrate = $('#roomratehidden').val(data.price);

                $("#roomtype").blur();
            }
        });
    });
    $('#roomtype').blur(function() {
        var roomrate = $('#roomratehidden').val();
        updatePrice()

    });

    function updatePrice() {
        let price = 0.00;
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        for(let i = 0; i < checkboxes.length; i++) {
            if(checkboxes[i].checked) price += parseInt(checkboxes[i].value);
        }
        var roomrate = $('#roomratehidden').val();
        var x=parseInt(price)+parseInt(roomrate)
// console.log("price",x)
$('#roomrate').val(x);
    // document.getElementById("total").innerText = "Your order total is: $" + price;
}
updatePrice()*/
//promocode
</script>


<!-- <script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                promocode: {
                    required: true
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    $('#promocode').change(function() {
        var id = $(this).find(":selected").val();
        var dataString = 'tid=' + id;
        $.ajax({
            url: "./Admin/getpromocode.php",
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(data) {
                var dis = $('#discount').val(data.price);

                $("#promocode").blur();
            }
        });
    });
    $('#promocode').blur(function() {
        var roomrate = $('#roomrate').val();

    });
</script> -->

<div class="copy">
  <p>© 2022 QUEENSBURY HOTELS . All Rights Reserved </p>
</div>
</body>
</html>
<script type="text/javascript">
    function updatePrice()
    {
        var totalamount="";
        var subtotal="";
        let price = 0.00;
        var discount = document.getElementById("discount").value;
        var roomp = document.getElementById("roomprice").value;
        var nooforoom = document.getElementById("noofrooms").value;




        if (nooforoom >= 3) {
            var totalroom = roomp*nooforoom
           subtotal= totalroom-discount


                //totalamount= subtotal //+ price
                document.getElementById("roomrates").value = subtotal.toFixed(2);

            }else{

             subtotal = roomp*nooforoom

                //totalamount= subtotal + price
                document.getElementById("roomrates").value = subtotal;
                
            }
            
            // var input = document.getElementsByName("services");
            const input = document.querySelectorAll('input[type=checkbox]');
            var total = 0;
            for (var i = 0; i < input.length; i++)
            {
              if (input[i].checked)
              {
                 total += parseFloat(input[i].value);
             }
         }

         var x = parseFloat (total) + parseFloat (subtotal);

         document.getElementById("roomrates").value =+ x.toFixed(2);
   //document.getElementById("total").value =+ total.toFixed(2);
}

function changetext(){

    if(document.getElementById("guesttype").value=="Normal Customer")
    {

        document.getElementById("promocode").disabled=true;
        document.getElementById("companyname").disabled=true;
          document.getElementById("discount").disabled=true;
    }
    else{
        document.getElementById("promocode").disabled=false;
        document.getElementById("companyname").disabled=false;
         document.getElementById("discount").disabled=false;
    }
}
</script>
