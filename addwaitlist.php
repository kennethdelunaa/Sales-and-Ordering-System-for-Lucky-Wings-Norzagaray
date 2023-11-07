
<?php     

  include 'connect.php';     
  if(isset($_POST['btn_add'])){
    $name =  $_POST['name'];
    $plan =  $_POST['plan'];
    $head_count =  $_POST['head_count'];
    // $tableRes = "SELECT * FROM `order_list` WHERE `table_num_order` = $table_num";
    // $tbNumRes = $con-> query($tableRes);       
    $sql = "SELECT * FROM customers;";
    $result = $con-> query($sql);
    if (empty($name) || empty($plan) || empty($head_count)) 
    {
        header("Location: orders.php");
    exit();
    }      
    else
    {
      // insert to table
      date_default_timezone_set("Asia/Manila");
      $dt2=date("Y-m-d H:i:s");
      mysqli_query($con, "INSERT INTO customers (`name`, `plan`, `head_count` ) VALUES ('$name','$plan' , '$head_count')");
      if ($plan == "198") {
        $price = $head_count*198;
      }
      else {
        $price = $head_count*238;
      }
      // for history
      mysqli_query($con, "INSERT INTO `sale-history` (`customer_name`, `customer_count`, `plan`, `total_price` ,`date`) 
      VALUES ('$name','$head_count', '$plan', '$price','$dt2')");
      header("Location: orders.php?add=success");
      exit();
    }


  }

  if(isset($_POST['admit_btn'])){
    $table = $_POST['table'];
    $id = $_POST['id'];
    $sql = "SELECT COUNT(1) FROM customers WHERE table_num = $table";
    $result = $con-> query($sql);
    $row = mysqli_fetch_row($result);
    
    if(empty($table)){
      header("Location: orders.php?table=empty");
      exit();
    }
    else {
      if($row[0] >= 1 ){
        header("Location: orders.php?table=occupied");
        exit();
      }
      else {
        $sql = "UPDATE `customers` SET `table_num`='$table', `status` = 'Admitted' WHERE `id` = '$id';";
        $result = $con-> query($sql);
        header("Location: orders.php?table=success");
        exit();
      }
    }

  }

  if(isset($_POST['clear_btn'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM customers WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    header("Location: orders.php?cust=deleted");
  }

?>