<!DOCTYPE html>
<html lang="en">
    
<?php
    include 'session.php'; ?>
    
<script type="text/javascript">
    function preventBack(){window.history.forward()};
    setTimeout("preventBack()",0);
    window.onunload=function(){null;}

</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Set Up</title>
    <?php include 'connect.php'; ?>
    <style>
        body {
            background-color: #FA8334ff;
            width: 100%; 
        }
        a {
            text-align: center;
            height: 200px;
            padding: 50px;
        }
        .btn {
            padding: 60px;
            font-size: 50px;
        }
        .container {
            margin-top: 20px;
        }
        .col {
            margin: 50px;
        }
        .back {
            position: absolute;
            background: #00000070;
            height: 30px;
            width: 30px;
            border-radius: 60px;
            z-index: 2;
            margin-left: 10px;
        }
        .back i {
            position: absolute;
            font-size: 30px;
            top: 50%;
            left: 35%;
            transform: translateY(-50%);
            color: #fff;
        }
        .back:hover{
            background: #00000090;
        }
        .btn:hover {
            background: #FA8334ff;
            color: black;
        }
    </style>
    
</head>
<body>
    <a class="back" href="startup.php"><i class='bx bx-arrow-back'></i></a>
    <div class="container">
        <div class="card p-4 mt-0">
            <h2 class="m-auto">Select the Table Number for this Device</h2>
            <div class="row">
                <div class="col">
                    <div class="card mt-2">
                        <a href="customer_side1.php" class="btn btn-dark" onclick="assign(1)">Table 1</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-2">
                        <a href="customer_side2.php" class="btn btn-dark" onclick="assign(2)">Table 2</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-2">
                        <a href="customer_side3.php" class="btn btn-dark" onclick="assign(3)">Table 3</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mt-2">
                        <a href="customer_side4.php" class="btn btn-dark" onclick="assign(4)">Table 4</a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-2">
                        <a href="customer_side5.php" class="btn btn-dark" onclick="assign(5)">Table 5</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function assign(t){
        $_SESSION['tableNum'] = t;
    }
</script>
</html>