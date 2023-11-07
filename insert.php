<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}


 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 

 $sql =  mysqli_query($con, "INSERT INTO customers (`name`, `table_num`, `head_count` ) VALUES ('$name','$table_num','$head_count')");
 if($sql){
     header('location:orders.php?m=1');
 }

?>
