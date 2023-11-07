<?php 
include 'connect.php';
mysqli_query($con,"DELETE FROM `customers` WHERE table_num = '".$_POST["id"]."'"); 
 if (mysqli_affected_rows($con)) 
 {
    echo json_encode(['alert' => 1]);
 }
 else
 {
    echo json_encode(['alert' => 0]);
 }
?>