<?php
include('./links.php');
include('./connection.php');
?>

<?php
$totalamount = $_GET['amount'];
$resid=$_GET['resid'];
$date = date ('Y-m-d');

?>

<?php
if (isset($_POST["submit"])) {

    $cardnumber = $_POST['cardnumber'];
    $cardholdername = $_POST['cardholdername'];
    $expdate = $_POST['expdate'];
    $totalamount = $_POST['totalamount'];
    $reid = $_POST['resid'];


    $query = "INSERT INTO payments (cardnumber, cardholdername, expdate, status,paymentdate, totalamount, resid) VALUES('$cardnumber', '$cardholdername', '$expdate', 'Paid', '$date','$totalamount','$reid')";
    $res = mysqli_query($connect, $query);

    if ($res) {
        // move_uploaded_file($tmp_name, "images/$image");
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Paid successfully!",
                icon: "success",
                buttons: false,
                timer: 1500,
                }).then(function() {
                    window.location = "index.php";
                    });
                    });
                    </script>';
                } else {
                    echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Payment failed!",
                            icon: "error",
                            });
                            });
                            </script>';
                        }
                    }
                    else if (isset($_POST["submitUnpaid"])) {

                        $cardnumber1 = $_POST['cardnumber'];
                        $cardholdername1 = $_POST['cardholdername'];
                        $expdate1 = $_POST['expdate'];
                        $totalamount1 = $_POST['totalamount'];



                        $query1 = "INSERT INTO payments (cardnumber, cardholdername, expdate,status, paymentdate, totalamount,resid ) VALUES('$cardnumber1', '$cardholdername1', '$expdate1','Unpaid', '$date', '$totalamount1','$reid')";
                        $res1 = mysqli_query($connect, $query1);

                        if ($res1) {
                            echo '
                            <script type="text/javascript">
                            $(document).ready(function(){
                                swal({
                                    title: "Success!",
                                    text: "Card added successfully!",
                                    icon: "success",
                                    buttons: false,
                                    timer: 1500,
                                    }).then(function() {
                                        window.location = "index.php";
                                        });
                                        });
                                        </script>';
                                    } else {
                                        echo '
                                        <script type="text/javascript">
                                        $(document).ready(function(){
                                            swal({
                                                title: "Error!",
                                                text: "Card added failed!",
                                                icon: "error",
                                                });
                                                });
                                                </script>';
                                            }
                                        }
                                        ?>



                                        <?php

// $date = date('m/d/Y h:i:s a', time());
// $date = date_default_timezone_set("Asia/Colombo")
// $date = date ('yy-m-d');
                                        ?>

                                        <!DOCTYPE html>
                                        <html lang="en">
                                        <head>
                                            <meta charset="UTF-8">
                                            <title>Payment Form</title>
                                            <link rel="stylesheet" href="style.css">
                                            <link rel="preconnect" href="https://fonts.gstatic.com">
                                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

                                            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

                                            <!-- <link rel="stylesheet" type="text/css" href="./invoice/bootstrap/css/bootstrap.min.css" /> -->



<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" /> -->

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h3>Confirm Your Payment</h3>
        <br>

        <form action="" id="form" method="post" enctype="multipart/form-data">
            <div class="first-row">
                <div class="owner">
                    <h5>Card Holer Name</h5>
                    <div class="input-field">
                        <input type="text" name= "cardholdername" id= "cardholdername" value="">
                    </div> 
                </div>
                <div class="cvv">
                    <h5>CVV</h5>
                    <div class="input-field" >
                        <input type="password" id= "cvv" maxlength="3">
                    </div>
                </div>
            </div>
            <br>
            <div class="second-row">
                <div class="card-number">
                    <h5>Card Number</h5>
                    <div class="input-field">
                        <input type="text" name= "cardnumber" placeholder="cardnumber" id= "cardnumber" maxlength="12">
                    </div>
                </div>
            </div>
            <br>
            <div class="third-row">
                <h5>Exp Date</h5>
                <div class="selection">
                    <div class="date">
                        <input type="month" id="start" name="expdate" id= "expdate"
                        onload="getDate()">
                        <input type="hidden" name= "totalamount" id= "payment"  value=" <?php echo $totalamount; ?>">
                        
                    </div>
                    <div class="cards">
                        <img src="mc.png" alt="">
                        <img src="vi.png" alt="">
                    </div>
                </div>    
            </div>

            <br>
            <!-- <input type="submit" name="submit" value="Confirm" /> -->

            <div class="row">
                <div class="col-md-6">
                    <input  type="submit" name="submit" class="btn btn-primary btn-block"  value="Pay"/>
                </div>
                <div class="col-md-6"> 
                    <input  type="submit" name="submitUnpaid" class="btn btn-primary btn-block"  value="Save"/>
                    <!-- <a class="btn btn-success btn-block" name="submit" >Save</a> -->
                </div>
            </div>

            <!-- <a href="">Confirm</a> -->
        </form>
        

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
                cardholdername: {
                    required: true
                },
                cvv: {
                    required: true,
                    rangelength: [2, 3],
                    number: true,
                },
                cardnumber: {
                    required: true,
                    rangelength: [11 , 12],
                    number: true,
                },
                
                expdate: {
                    required: true,
                },
            },
            messages: {
                cardholdername: 'Please enter card holder name.',
                cvv: 'Please enter valid CVV number.',
                cardnumber: 'Please enter valid card number',
                expdate: 'Please select exp date'
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
    $("#cardnumber").ForceNumericOnly();
        // $("#cvv").ForceNumericOnly();

    </script>
    </html>