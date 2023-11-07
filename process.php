
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
 <?php 
include 'connect.php';
if(isset($_GET['delete']))
{
   mysqli_query($con,"DELETE FROM `customers` WHERE table_num = $tbNum");
    header('Refresh:5;Location: orders.php');
}
if(isset($_GET['serve']))
{
    $tbServe =$_GET['serve'];
    $sql = mysqli_query($con,"SELECT table_num_order FROM `order_list` WHERE $tbServe");
    $row = mysqli_fetch_assoc($sql);
    if ($row["table_num_order"] == $tbServe) {
        echo "
        <script>
        Swal.fire(
          'ERROR!',
          'ERROR',
          'error'
        )
      </script>;";
      header('Location: orders.php');
    }
    else
    {
    mysqli_query($con,"UPDATE `customers` SET `status`='Served' WHERE table_num=$tbServe");
    $sql = mysqli_query($con,"SELECT * FROM `customers` WHERE $tbServe");
	  $row = mysqli_fetch_assoc($sql);
    $id = $row["id"];
    $tbTable = $row["table_num"] ;
    $order = "No Order Yet" ;
    $tbStat = $row["status"];
    $tbServe =$_GET['serve'];
    mysqli_query($con, "INSERT INTO `order_list` (`order_id`,`order`, `table_num_order`, `status`) 
    VALUES ('$id','$order', '$tbTable' ,'$tbStat')");
     echo "
     <script>
     Swal.fire(
       'SUCCESS!',
       'Succesfully added to waitlist at TABLE: " .  $tbTable . "',
       'success'
     )
    </script>";
    header('Location: orders.php');
    exit();
    }
}
if(isset($_POST['delete_btn_set']))
{
        $tbNum =$_GET['delete'];
        mysqli_query($con,"DELETE FROM `customers` WHERE table_num = $tbNum");
        header('Location: orders.php');
}
if(isset($_GET['delete']))
{
    $tbNum =$_GET['delete'];
    mysqli_query($con,"DELETE FROM `customers` WHERE table_num = $tbNum");
    header('Location: orders.php');
}
if(isset($_GET['tdelete']))
{
  $tbNum =$_GET['tdelete'];
  mysqli_query($con,"DELETE * FROM `order_list` WHERE 'order' = $tbNum");
  header('Location: tables.php');
}
if(isset($_POST['tableServe1']))
{
$order = $_POST["order"];
$orderTot = $_POST["orderTot"];
$trim= trim($order, '"');
mysqli_query($con,"UPDATE menu SET total_orders= (total_orders + '$orderTot') WHERE product_name = '$trim';");
$results = mysqli_query($con,"UPDATE table_1 SET status= 'Served' WHERE '1';");
$results = mysqli_query($con,"UPDATE order_list SET status= 'Served' WHERE table_num_order='1';");
header('Location: tables.php');
}

if(isset($_POST['tableDelete1']))
{
 mysqli_query($con,"DELETE FROM `table_1` WHERE 1");
 mysqli_query($con,"DELETE FROM `order_list` WHERE table_num_order='1';");
 header('Location: tables.php');
}


if(isset($_POST['tableServe2']))
{
$order = $_POST["order"];
$orderTot = $_POST["orderTot"];
$trim= trim($order, '"');
mysqli_query($con,"UPDATE menu SET total_orders= (total_orders + '$orderTot') WHERE product_name = '$trim';");
$results = mysqli_query($con,"UPDATE table_2 SET status= 'Served' WHERE '1';");
$results = mysqli_query($con,"UPDATE order_list SET status= 'Served' WHERE table_num_order='2';");
header('Location: tables.php');
}

if(isset($_POST['tableDelete2']))
{
 mysqli_query($con,"DELETE FROM `table_2` WHERE 1");
 mysqli_query($con,"DELETE FROM `order_list` WHERE table_num_order='2';");
 header('Location: tables.php');
}


if(isset($_POST['tableServe3']))
{
$order = $_POST["order"];
$orderTot = $_POST["orderTot"];
$trim= trim($order, '"');
mysqli_query($con,"UPDATE menu SET total_orders= (total_orders + '$orderTot') WHERE product_name = '$trim';");
$results = mysqli_query($con,"UPDATE table_3 SET status= 'Served' WHERE '1';");
$results = mysqli_query($con,"UPDATE order_list SET status= 'Served' WHERE table_num_order='3';");
header('Location: tables.php');
}

if(isset($_POST['tableDelete3']))
{
 mysqli_query($con,"DELETE FROM `table_3` WHERE 1");
 mysqli_query($con,"DELETE FROM `order_list` WHERE table_num_order='3';");
 header('Location: tables.php');
}

if(isset($_POST['tableServe4']))
{
$order = $_POST["order"];
$orderTot = $_POST["orderTot"];
$trim= trim($order, '"');
mysqli_query($con,"UPDATE menu SET total_orders= (total_orders + '$orderTot') WHERE product_name = '$trim';");
$results = mysqli_query($con,"UPDATE table_4 SET status= 'Served' WHERE '1';");
$results = mysqli_query($con,"UPDATE order_list SET status= 'Served' WHERE table_num_order='4';");
header('Location: tables.php');
}

if(isset($_POST['tableDelete4']))
{
 mysqli_query($con,"DELETE FROM `table_4` WHERE 1");
 mysqli_query($con,"DELETE FROM `order_list` WHERE table_num_order='4';");
 header('Location: tables.php');
}


if(isset($_POST['tableServe5']))
{
$order = $_POST["order"];
$orderTot = $_POST["orderTot"];
$trim= trim($order, '"');
mysqli_query($con,"UPDATE menu SET total_orders= (total_orders + '$orderTot') WHERE product_name = '$trim';");
$results = mysqli_query($con,"UPDATE table_5 SET status= 'Served' WHERE '1';");
$results = mysqli_query($con,"UPDATE order_list SET status= 'Served' WHERE table_num_order='5';");
header('Location: tables.php');
}

if(isset($_POST['tableDelete5']))
{
 mysqli_query($con,"DELETE FROM `table_5` WHERE 1");
 mysqli_query($con,"DELETE FROM `order_list` WHERE table_num_order='5';");
 header('Location: tables.php');
}
if(isset($_POST['btn_add']))
  {
    include 'connect.php';
      $name =  $_POST['name'];
      $table_num =  $_POST['table_num'];
      $head_count =  $_POST['head_count'];
      $tableRes = "SELECT * FROM `order_list` WHERE `table_num_order` = $table_num";
      $tbNumRes = $con-> query($tableRes);       
      $sql = "SELECT * FROM customers WHERE table_num = '$table_num';";
      $result = $con-> query($sql);  
        if (empty($name) || empty($table_num) || empty($head_count)) 
        {
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'EMPTY FIELDS!',
        })
        location.reload()
        </script>;";
        exit();
        }
        else if($head_count <= 0)
        {
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'Invalid!',
          text: 'No negative value!',
          timer: 5000
        })
        </script>;";
        }
        else if($head_count >=6)
        {
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'Invalid!',
          text: 'MAXIMUM OF 6 PERSON(s) per table!',
          timer: 5000
        })
        </script>;";
        }
        else if($table_num <= 0)
        {
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'BUSY!',
          text: 'Dont enter negative value',
          'timer: 5000'
        })
        </script>;";
        }
        else if(mysqli_num_rows($result)>0)
        {
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'ALREADY!',
          text: 'Table no: " . $table_num ." is busy at the moment!',
          timer: 5000
        })
        </script>;";
        exit();
        }       
        else
        {
          date_default_timezone_set("Asia/Manila");
          $dt2=date("Y-m-d H:i:s a");
          mysqli_query($con, "INSERT INTO customers (`name`, `table_num`, `head_count` ) VALUES ('$name','$table_num','$head_count')");
          $price = $head_count*200;
          mysqli_query($con, "INSERT INTO `sale-history` (`customer_name`, `customer_count`, `total_price` ,`date`) 
          VALUES ('$name','$head_count','$price','$dt2')");
          echo "
          <script>
          Swal.fire(
            'SUCCESS!',
            'Succesfully added to waitlist at TABLE: ".$table_num."',
            'success'
          )
        </script>;";
        header('Location: orders.php');
          exit();
          }
        }


?>

 </body>