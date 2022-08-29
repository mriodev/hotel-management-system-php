<?php
include("./connection.php");

if (isset($_POST['prcd'])) {

     $sql = "SELECT * FROM travelpartner WHERE promocode = '" . $_POST['prcd'] . "'";

     $result = mysqli_query($connect, $sql);
     // $output = array();
     while ($row = mysqli_fetch_assoc($result)) {
          echo $row['discount'];
     }
     // echo json_encode($output);
} else {
     echo 0;
}
