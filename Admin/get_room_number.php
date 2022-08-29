<?php
include("./connection.php");
    if(isset($_POST['roomtype_id'])){
        // $id = $_POST['roomtype_id'];
        $sql = "SELECT * FROM room WHERE roomtype_id = '".$_POST['roomtype_id']."' AND status ='Available'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<option value='" . $row['id'] ."'>" . $row['room_number'] ."</option>";
            }
        }
        else{
            echo "<option disabled selected>--Select--</option>";
        }
        
    }

