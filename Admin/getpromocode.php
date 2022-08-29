<?php
include("./connection.php");

if ($_REQUEST["tid"]) {

     $sql = "SELECT * FROM travelpartner WHERE id = '" . $_REQUEST["tid"] . "'";

     $result = mysqli_query($connect, $sql);
     $output = array();
     while ($row = mysqli_fetch_assoc($result)) {

          $output = $row;
     }
     echo json_encode($output);
} else {
     echo 0;
}
