<!DOCTYPE html>
<html lang="en">
    <?php
    include 'session.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="customer_side_style.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Customer Side</title>
    <style>
    .clearfix {
        overflow: hidden;
        height: 100%;
        float:unset;
        width: 100%;
    }
    .btn:disabled,
    .btn[disabled]{
        border: 1px solid #030303ff;
        background-color: #56565655;
        color: #444444;
    }
    .btn {
    border: 2px solid #000000;
    }
    .ords {
        height: 800px;
        overflow: hidden;
        overflow-y: scroll;
    }
    .quantity {
        display: flex;
        justify-content: center;
    }
    .quantity button {
        width: 50px;
        height: 50px;
        border: 1px solid #030303ff;
        color: #000;
        font-weight: bold;
        border-radius: 3px;
        background: #FA8334ff;
        margin: 4px;
    }
    .quantity input {
        border:none;
        border: 1px solid #030303ff;
        text-align: center;
        width: 100px;
        font-size: 20px;
        color: #fff;
        background: #565656ff;
        margin: 4px;
        font-weight: bold;
        cursor: normal;
    }
    article {
    position: relative;
    width: 100%;
    height: 50px;
    box-sizing: border-box;
    }

    article div {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    line-height: 25px;
    transition: .5s ease;
    border: 1px solid #030303ff;
    font-size: 20px;
    cursor: pointer;
    }

    article input {
    position: absolute;
    top: 0;
    left: 0;
    width: 140px;
    height: 50px;
    opacity: 0;
    cursor: pointer;
    }
    @keyframes slidein {
        from {
            margin-top: 100%;
            width: 300%;
        }

        to {
            margin: 0%;
            width: 100%;
        }
    }
    .ordTotal{
        position: absolute;
        background: #565656ff;
        top: 10px;
        right: 20px;
        width: 40px;
        height: 50px;
        cursor: context-menu;
        text-align: center;
        font-size: 20px;
        color: #fff;
        font-weight: bold;
    }
    .ordTotal-label {
        position: absolute;
        top: 10px;
        right: 50px;
        width: 100px;
        height: 50px;
        cursor: context-menu;
        text-align: center;
        font-size: 20px;
        color: #565656ff;
        font-weight: bold;
    }
    .quan {
        cursor: default;
    }
    </style>
</head>
<body>
    <!-- div for selection of order -->
    <div class="container-fluid mt-2">
        <!-- for order menu -->
        <div class="card shadow p-3 bg-white rounded card-menu">
            <form action="order_confirmation5.php" method="post">
                <!-- head -->
                <div class="row">
                    <div class="col-md-4 title">
                        <h3>TABLE 5</h3>
                    </div>
                    <div class="col-md-4">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-lg btn-dark">
                            Order Now
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Are you sure with your Order(s)?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Check your orders first.
                            </div>
                            <div class="modal-footer"> 
                                <button type="submit" name="submit" class="btn bg-orange">Yes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    <div class="co-md-4">
                        <h4 class="ordTotal-label">Order Total:</h4>
                        <input type="text" class="ordTotal rounded" readonly name="ordTotal" id="ordTotal" value="0"/>
                    </div>
                </div>
                <!-- line -->
                <div class="form-group col-12">
                    <hr>
                </div>
                <!-- order list -->
                <div class="orders-list">                
                    <div class="row">
                        <?php
                        include 'connect.php';
                        $sql = "SELECT * FROM menu WHERE NOT stock_num = '6'";
                        $result = $con-> query($sql);
                        $ordTotal = '0';
                        if ($result-> num_rows > 0)
                        {   
                                
                                
                            $ctr = 0;
                            $count = 0;
                            while ($row = $result-> fetch_assoc())
                            {   
                                $count++;
                                $buttonDisable = 'button' . $count;
                                $orderDisable = 'order' . $count;

                                echo"<div class='col-xl-3 col-md-4 list'>
                                        <div class='card shadow m-2 card".$row['id']."'>
                                            <div class='p-4'>
                                                <!-- for image -->
                                                <div class='image mb-2 clearfix' onclick='check()'>
                                                    <img src='menu/" . $row['picture'] . "' alt='Image not Available' class='rounded' width='100%'>
                                                </div>
                                                <hr class='solid'>
                                                <!-- for label -->
                                                <label class='col-xl-12 col-md-12 m-auto'>
                                                    <div class='row'>
                                                        <article class='feature1 col-md-12 col-sm-12 col-xl-12 mx-auto'>
                                                            <input type='checkbox' type='checkbox' name='order[]' value=' ". $row['product_name'] ." ' class='input".$row['id']." mx-auto inputall' id='order'>
                                                            </input>
                                                            <div class='rounded div".$row['id']."'>
                                                                <span>
                                                                " . $row["product_name"] . "
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </label>
                                                <div class='mt-1'>
                                                <div class='quantity col-md-12 col-xl-12 mx-auto'>
                                                    <button class='btn minus-btn".$row['id']." disabled". $row['id'] ."' type='button'>-</button>
                                                    <input type='text' readonly name='order_num[".$ctr++."]' id='quantity".$row['id']."' class='quan' value='0'>
                                                    <button class='btn plusall plus-btn".$row['id']."' type='button'>+</button>
                                                </div>
                                            </div>
                                            </div> 
                                        </div>
                                    </div>";
                                    ?>

                                    <script>
                                        var ordTotal =  <?php echo $ordTotal;?>;
                                        var valueCount;
                                        var holder = 0;
                                        document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = true; 
                                        document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = true;  
                                        // plus
                                        document.querySelector(".plus-btn<?php echo $row['id'];?>").addEventListener("click", function(){
                                            // checking if order exceeded
                                            if(ordTotal == '8'){
                                                if(document.getElementById("quantity<?php echo $row['id'];?>").value > 0){
                                                    if(document.getElementById("quantity<?php echo $row['id'];?>").value == 1){
                                                        document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = true;
                                                    }
                                                    else{
                                                        document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = false; 
                                                    }
                                                }
                                                else {
                                                    document.querySelectorAll(".plusall").disabled = true; 
                                                    document.querySelector(".input<?php echo $row['id'];?>").disabled = true;
                                                }
                                                
                                                Swal.fire({
                                                    position: 'top',
                                                    showConfirmButton: false,
                                                    title: "Ooopss!",
                                                    text: "Maximum of 8 orders per session!",
                                                    icon: "warning",
                                                    timer: "3000"
                                                });

                                                
                                            }

                                            else {
                                                
                                                valueCount = document.getElementById("quantity<?php echo $row['id'];?>").value;
                                                valueCount++;
                                                holder = valueCount;
                                                ordTotal++;
                                                document.getElementById("ordTotal").value = ordTotal;
                                                document.getElementById("quantity<?php echo $row['id'];?>").value = valueCount;
                                                if(valueCount > 0){
                                                    document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = false;
                                                }
                                                if(valueCount == 3){
                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = true; 
                                                    Swal.fire({
                                                        
                                                        position: 'top',
                                                        showConfirmButton: false,
                                                        title: "Warning!",
                                                        text: "Maximum of 3 orders per flavor!",
                                                        icon: "warning",
                                                        timer: "3000"
                                                    });
                                                }
                                            }

                                        })      
                                        // minus
                                        document.querySelector(".minus-btn<?php echo $row['id'];?>").addEventListener("click", function(){

                                            valueCount = document.getElementById("quantity<?php echo $row['id'];?>").value;
                                            valueCount--;
                                            holder = valueCount;
                                            ordTotal--;
                                            document.getElementById("ordTotal").value = ordTotal;
                                            document.getElementById("quantity<?php echo $row['id'];?>").value = valueCount;
                                            if(valueCount == 0){
                                                document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = true;
                                                document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = true;
                                                document.querySelector(".input<?php echo $row['id'];?>").checked = false;
                                                // not active
                                                document.querySelector(".card<?php echo $row['id'];?>").style.backgroundColor="#fff";
                                                document.querySelector(".card<?php echo $row['id'];?>").style.border="0px";
                                                document.querySelector(".div<?php echo $row['id'];?>").style.backgroundColor= "#fff";
                                                document.querySelector(".div<?php echo $row['id'];?>").style.color= "#000";
                                                document.querySelector(".div<?php echo $row['id'];?>").style.fontWeight= "normal";
                                                document.querySelector(".div<?php echo $row['id'];?>").style.border= "1px solid #000";
                                            }
                                            else if(valueCount <= 3){
                                                document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = false;
                                            }
                                            
                                        })        
                                        // button
                                        document.querySelector(".input<?php echo $row['id'];?>").addEventListener("click", function(){
                                            
                                            if(ordTotal == 8){
                                                if(document.getElementById("quantity<?php echo $row['id'];?>").value > 0){
                                                    document.querySelector(".input<?php echo $row['id'];?>").checked = false;
                                                    document.querySelector(".input<?php echo $row['id'];?>").disabled = false;
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.backgroundColor="#fff";
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.border="0px solid #fff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.backgroundColor= "#fff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.color= "#000";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.fontWeight= "normal";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.border= "1px solid #565656ff";
                                                    document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = true;
                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = true;
                                                    ordTotal -= document.getElementById("quantity<?php echo $row['id'];?>").value;
                                                    document.getElementById("ordTotal").value = ordTotal;
                                                    document.getElementById("quantity<?php echo $row['id'];?>").value = '0';
                                                    
                                                }
                                                else {
                                                    document.querySelectorAll(".plusall").disabled = true; 
                                                    
                                                    Swal.fire({
                                                        position: 'top',
                                                        showConfirmButton: false,
                                                        title: "Ooopss!",
                                                        text: "Maximum of 8 orders per session!",
                                                        icon: "warning",
                                                        timer: "3000"
                                                    });
                                                }
                                            }
                                            else{
                                                // clicked
                                                if (document.querySelector(".input<?php echo $row['id'];?>").checked == true){
                                                    
                                                    holder = valueCount;
                                                    ordTotal++;
                                                    document.getElementById("ordTotal").value = ordTotal;

                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = false;
                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").focus();
                                                    document.getElementById("quantity<?php echo $row['id'];?>").value = '1';
                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = false;
                                                    // active
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.backgroundColor="#E0955A88";
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.border="2px solid #030303ff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.backgroundColor= "#FA8334ff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.color= "#fff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.fontWeight= "bold";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.border= "3px solid #565656ff";
                                                    Swal.fire({
                                                        position: 'top',
                                                        showConfirmButton: false,
                                                        title: "Successfuly Added <?php echo $row['product_name'];?>!",
                                                        text: "Now choose the quantity of this flavor.",
                                                        icon: "success",
                                                        timer: "3000"
                                                    });
                                                }
                                                // not clicked
                                                if (document.querySelector(".input<?php echo $row['id'];?>").checked == false){
                                                    if(document.getElementById("quantity<?php echo $row['id'];?>").value == 1){
                                                        ordTotal--;
                                                    }
                                                    else{
                                                        ordTotal -= document.getElementById("quantity<?php echo $row['id'];?>").value;
                                                    }
                                                    document.getElementById("ordTotal").value = ordTotal;
                                                    document.querySelector(".plus-btn<?php echo $row['id'];?>").disabled = true;
                                                    document.querySelector(".minus-btn<?php echo $row['id'];?>").disabled = true; 
                                                    document.getElementById("quantity<?php echo $row['id'];?>").value = '0';
                                                    // not active
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.backgroundColor="#fff";
                                                    document.querySelector(".card<?php echo $row['id'];?>").style.border="0px";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.backgroundColor= "#fff";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.color= "#000";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.fontWeight= "normal";
                                                    document.querySelector(".div<?php echo $row['id'];?>").style.border= "1px solid #000";
                                                }
                                            }
                                        })    
                                                                            
                                    </script>

                                    <?php
                            }                                        
                        }
                        ?>
                    </div>
                </div>
            
            </form>
        </div>  
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "empty=order") == true){
        echo "<script>			
            Swal.fire({
            icon: 'error',
            title: 'Order is Empty!',
            text: 'Please select atleast one order.',
            timer: 5000
        })
        </script>";
        exit();
        }
    ?>
</body>
</html>