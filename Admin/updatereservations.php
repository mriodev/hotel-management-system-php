<?php
include('./header.php');
include('./links.php');
include('./connection.php');

// include('./restrict.php');
?>
<?php
if (isset($_GET['resupid'])) {
    $id = $_GET['resupid'];
    $query = " SELECT * FROM reservation JOIN guest 
    ON reservation.cus_id = guest.guestid
    JOIN hotel ON reservation.hotelid = hotel.hotelcode WHERE guestid=$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $fname = $row['fname'];
    $lname = $row['lname'];
    $nic = $row['nic'];
    $type = $row['type'];
    $companyname = $row['companyname'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $promocode = $row['promocode'];

    $hotelid = $row['location'];
    $roomtype_id = $row['roomtype'];
    $noofrooms = $row['noofrooms'];
    $noofoccuoants = $row['noofoccuoants'];
    $reservedate = $row['reservedate'];
    $checkindate = $row['checkindate'];
    $checkoutdate = $row['checkoutdate'];
    $totalamount = $row['promocode'];
}
?>

                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
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
                                <input name="fname" class="form-control" id="fname" autocomplete="off" value="<?php echo $fname; ?>" 
                                placeholder="Enter first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Last Name</label>
                                <input class="form-control" id="lname" name="lname" autocomplete="off" value="<?php echo $lname; ?>"
                                placeholder="Enter last name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Mobile</label>
                                <input name="mobile" class="form-control" id="mobile" maxlength="10" autocomplete="off" value="<?php echo $mobile; ?>" 
                                placeholder="Enter Mobile Number">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $email; ?>"
                                placeholder="Enter Email ID">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="" class="form-label">NIC / Passport No</label>
                                <input class="form-control" id="nic" name="nic" autocomplete="off" value="<?php echo $nic; ?>"
                                placeholder="Enter NIC / Passport No">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Guest Type</label>
                                <select class="form-control" name="guesttype" id="guesttype"onChange="changetext()">
                                    <option value="<?php echo $type; ?>" disabled selected>Select Guest Type</option>
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
                                        <option value="<?php echo $companyname; ?>" disabled selected>Select Company Name</option>
                                        <?php
                                        $res = mysqli_query($connect, "SELECT * FROM travelpartner");
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option value="<?php echo $row["id"]; ?>">
                                                <?php echo $row["name"]; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Promo Code</label>
                                    <input class="form-control" id="promocode" name="promocode" autocomplete="off" value="<?php echo $promocode; ?>"
                                    placeholder="Enter Your Promo Code">
                                </div>

                            </div>
                            <div class = "form-row">
                                <div class="form-group col-md-6">
                                    <label for="" class="form-label">Discount Amont($)</label>
                                    <input class="form-control" id="discount" name="discount" onchange="updatePrice()" autocomplete="off" value="" >
                                </div>
                            </div>
                            <!-- </form> -->
                            <br><br>
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
                                            <label for="status" class="form-label">Select Room Type</label>
                                            <select class="form-control" id="roomtype" name="roomtype">
                                                <option value="" selected disabled>--Select Room Type--</option>
                                                <?php echo fill_addrooms($connect) ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="" class="form-label">Room Price($)</label>
                                      <input class="form-control" id="roomprice" name="roomprice" 
                                      value="" readonly>
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
                                    <input name="noofoccupants" class="form-control" id="noofoccupants" autocomplete="off" value="" 
                                    placeholder="Enter The Occupants Count">
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

                                <input type="text" name="roomrate" id="roomrate" class="form-control"
                                placeholder="Room Rate" readonly value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option disabled selected>Select Status</option>
                                        <option value="Accept">Accept</option>
                                        <option value="Decline">Decline</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Rooms</label>
                                    <select class="form-control" name="roomnumber" id="roomnumber">
                                        <option disabled selected>Select Room</option>
                                <!-- <option value="Accept">Accept</option>
                                    <option value="Decline">Decline</option> -->
                                </select>
                                <!-- <input type="text" name="roomnumber_hidden" id="roomnumber_hidden"> -->
                            </div>
                        </div>

                        <hr style="border-top: 1px solid #8c8b8b; margin-top: 10px;">
                         <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="150.00" id="club" name="services" onClick="updatePrice()">
                        <label class="form-check-label" for="club">
                            Club Facility ($150)
                        </label>
                    </div>
                    <Br> 

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="120.00" id="laundry" name="services" onClick="updatePrice()">
                        <label class="form-check-label" for="laundry">
                            Laundry Facility ($120)
                        </label>
                    </div>
                    <Br>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="250.00" id="restaurant" name="services" onClick="updatePrice()">
                        <label class="form-check-label" for="restaurant">
                            Restaurant Facility ($250)
                        </label>
                    </div>
                    <Br>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="35.00" id="roomservice" name="services" onClick="updatePrice()">
                        <label class="form-check-label" for="roomservice">
                            Room Service ($35)
                        </label>
                    </div>
                    <Br>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="80.00" id="telephone" name="services" onClick="updatePrice()">
                        <label class="form-check-label" for="telephone">
                            Telephone Services ($80)
                        </label> 
                    </div>
                        <Br>


                        
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" href="" value="Reserve">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="reservations.php">Back</a>
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
    // $(document).ready(function() {
    //     $('#form').validate({
    //         rules: {
    //             roomtype: {
    //                 required: true
    //             },
    //         },
    //         submitHandler: function(form) {
    //             form.submit();
    //         }
    //     });
    // });
    $('#roomtype').change(function() {
        var id = $(this).find(":selected").val();
        var txt = $(this).find(":selected").text();

        // $("#roomnumber_hidden").val(id);

        
        var dataString = 'lid=' + id;
        $.ajax({
            url: "load.php",
            dataType: "json",
            data: dataString,
            cache: false,
            success: function(data) {
                var roomrate = $('#roomprice').val(data.price);

                $("#roomtype").blur();
            }
        });

//get the room number

var roomtype_id = $(this).val();
if(roomtype_id.length != 0){
    $.ajax({
        type: 'POST',
        url: 'get_room_number.php',
        cache: 'false',
        data: {roomtype_id:roomtype_id},
        success: function(data){
                        // alert(data)
                        $('#roomnumber').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
}else{
    $('#roomnumber').html('<option value=""> -- SELECT -- </option>');
}


});
    $('#roomtype').blur(function() {
        var roomrate = $('#roomratehidden').val();
        //updatePrice()
    });
/*
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





</script>

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
           subtotal= roomp-discount


                //totalamount= subtotal //+ price
                document.getElementById("roomrate").value = subtotal.toFixed(2);

            }else{

             subtotal = roomp

                //totalamount= subtotal + price
                document.getElementById("roomrate").value = subtotal;
                
            }
            const checkboxes = document.querySelectorAll('input[type=checkbox]');
            // var input = document.getElementsByName("services");
            var total = 0;
            for (var i = 0; i < input.length; i++)
            {
              if (input[i].checked)
              {
                 total += parseFloat(input[i].value);
             }
         }

         var x = parseFloat (total) + parseFloat (subtotal);

         document.getElementById("roomrate").value =+ x.toFixed(2);
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