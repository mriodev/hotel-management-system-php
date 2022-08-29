<?php
include("./connection.php");

if ($_REQUEST["lid"]) {

     $sql = "SELECT discount FROM travelpartner WHERE promocode = '" . $_REQUEST["lid"] . "'";

     $result = mysqli_query($connect, $sql);
     $output = array();
     while ($row = mysqli_fetch_assoc($result)) {

          $output = $row;
     }
     echo json_encode($output);
} else {
     echo 0;
}