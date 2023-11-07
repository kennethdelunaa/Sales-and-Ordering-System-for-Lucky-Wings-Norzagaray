<!DOCTYPE html>
<?php
    include 'session.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="customer_side_style.css">
    <title>Confirm Order</title>
    <style>
        body {
            background-color: #FA8334ff;
        }
        .container {
            height: 700px;
            margin-top: 5%;
        }
        .ord {
            background-color: rgb(226, 226, 226);
            border-radius: 5px;
            padding: 10px;
            height: 100%;
        }
 
    </style>
</head>
<body>
    <div class="container position-absolute top-50 start-50 translate-middle">
        <div class="card order_total shadow m-auto p-3 col-xxl-4 h-75">
            
            <h3>Order Total:</h3>
            <div class="ord">
                <?php
                    $newarr = [];
                if (isset($_POST['submit']) ) 
                {
                        foreach($_POST['order_num'] as $item)
                        {
                            if($item) 
                            {
                            $newarr[] = $item;
                            }
                        }                                   
                        include 'connect.php';
                        if(!empty($_POST["order"]))
                        {
                                foreach($newarr as $key => $order_num)
                                {   
                                    $orderarr = $_POST['order'];
                                    $order = $orderarr[$key];   
                                    if ($order_num < 0) 
                                    {
                                        echo "<h3>Dont enter negative values</h3>";
                                    }
                                    else if ($order_num > 9) 
                                    {
                                        echo "<h3>Maximum of 9 orders per chicken only</h3>";
                                    }
                                    else
                                    {   
                                        mysqli_query($con,"INSERT INTO `order_list`(`orders`, `order_total` ,`table_num_order`, `status`) VALUES
                                        ('". trim($order, " ") ."', '".$order_num."','4','Pending')");
                                        mysqli_query($con,"INSERT INTO `table_4`(`orders`, `order_total` ,`table_num_order`, `status`) VALUES
                                        ('". trim($order, " ") ."', '".$order_num."','4','Pending')");
                                        echo "<p>".$order_num. "x". $order. "</p>";           
                                        mysqli_query($con,"UPDATE `menu` SET `stock_num`= `stock_num` - '$order_num', `total_orders` = `total_orders` + '$order_num' WHERE `product_name` = '". trim($order, " ") ."'");   
                                    }
                                }
                        }
                        else
                        {
                            echo 'Please select at least one chicken';
                        }
                }
                ?>
            </div>
            <div class="col-12">
                <hr>
            </div>
                <a type="button" name="submit" href="customer_side4.php?success" class="btn btn-dark">
                Done
                </a>
        </div>
    </div>
</body>
</html>