<?php
include('./connection.php');
?>

<?php
if (isset($_GET['resid'])) {
    $id = $_GET['resid'];
    $query = " SELECT * FROM reservation JOIN guest 
    ON reservation.cus_id = guest.guestid WHERE res_id =$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $id = $row['res_id'];
    $clubcharge = $row['clubcharge'];
    $laundrycharge = $row['laundrycharge'];
    $roomservice = $row['roomservice'];
    $restaurantcharge = $row['restaurantcharge'];
    $telephonecharge = $row['telephonecharge'];
    $name = $row['fname'];
    $totalamount = $row['totalamount'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<!-- <div class="page-header">
    <h1>Invoice Template <small>Professional Business Invoice Template</small></h1>
</div> -->

<!-- Invoice Template - START -->



<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 main">
            <div class="col-md-12">
               <div class="row">
                    <div class="col-md-4">
                        <img class="img-responsive" alt="Invoce Template" src="./queensbury.png" />
                    </div>
                    <div class="col-md-8 text-right">
                        <h4 style="color: #F81D2D;"><strong>Queensbury Hotels</strong></h4>
                        <p>Gallface, Colombo</p>
                        <p>+94 (65)222-44-55</p>
                        <p>info@queensbury.com</p>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>INVOICE</h2>
                        <h3><?php echo $id; ?></h3>
                        <h3><?php echo $name; ?></h3>
                    </div>
                </div>
                <br />
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><h5>Description</h5></th>
                                <th><h5>Amount</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-9">Club Charge</td>
                                <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $clubcharge; ?> </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Laundry Charge</td>
                                <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $laundrycharge; ?> </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Restaurant Charge</td>
                                <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $roomservice; ?> </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Room Service Charge</td>
                                <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $restaurantcharge; ?> </td>
                            </tr>

                            <tr>
                                <td class="col-md-9">Telephone Charge</td>
                                <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $telephonecharge; ?> </td>
                            </tr>

                            <tr>
                                <td class="text-right">
                                <p>
                                    <strong>Total Amount: </strong>
                                </p>
                                
							    </td>
                                <td>
                                <p>
                                    <strong><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $totalamount; ?> </strong>
                                </p>
                                
							    </td>
                            </tr>
                            <tr style="color: #F81D2D;">
                                <td class="text-right"><h4><strong>Total:</strong></h4></td>
                                <td class="text-left"><h4><strong><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $totalamount; ?> </strong></h4></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                            <div class="col-md-6">
                                <input  type="submit" name="submit" class="btn btn-primary btn-block"  value="Pay With Paypal">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="../payment.php?amount=<?php echo $row['totalamount']; ?>&&resid=<?php echo $row['res_id']; ?>">Pay with Credit Card</a>
                            </div>
                        </div>
                </div>
                <div>
                    <!-- <div class="col-md-12">
                        <p><b>Date :</b> 28 June 2017</p>
                        <br />
                        <p><b>Signature</b></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .main {
        background: #ffffff;
        border-bottom: 15px solid #F81D2D;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;
    }

    .main thead {
		background: #1E1F23;
        color: #fff;
		}
</style>
<!-- Invoice Template - END -->

</div>

</body>
</html>