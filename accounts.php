<?php
    include 'connect.php';
    include 'session.php';
    if($_SESSION["username"] == 'cashier'){
      header("Location:startup.php?access=denied");
    }
    ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/line-awesome-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <title>Menu</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        .password {
            border: 0;
            color: black;
            background: #ffffff00;
            cursor: default;
            text-align: center;
        }
        .radio {
        background: #454857;
        padding: 4px;
        border-radius: 3px;
        position: relative;
        }

        .radio input {
            width: auto;
            height: 100%;
            appearance: none;
            outline: none;
            cursor: pointer;
            border-radius: 2px;
            padding: 4px 8px;
            background: #565656ff;
            color: #fff;
            font-size: 17px;
            transition: all 100ms linear;
        }

        .radio input:checked {
            background-image: linear-gradient(180deg, #FA8334ff, #E0955Aff);
            color: #030303ff;
        }

        .radio input:before {
            content: attr(label);
            display: inline-block;
            text-align: center;
            width: 100%;
        }
        .user {
            position: absolute;
            top: 24px;
            right: 30px;
            background: #565656ff;
            padding-top: 6px;
            color: white;
            border-radius: 4px;
            width: 310px;
        }
        .icon {
            margin: auto;
            padding: auto;
        } 
    </style>
  </head>
    <body onload="active()">
    <?php
    include 'navbar.php';
    ?>
    <script>
    function active() {
        var element = document.getElementById("accounts");
        element.classList.add("active");
    }
    </script>
    <section class="home-section">
        <div class="container mt-3">            
            <div class="card stock">
                <div class="head">
                    <div class="text">
                        Employee's Accounts
                    </div>
                    <button class="btn btn-warning" onclick="addModal()">Add Account</button>
                    <!-- modal add -->
                    <script>
                        //modal add
                        function addModal(){
                            Swal.fire({
                            title: '<strong>Add Account</strong>',
                            html:
                                "<form action='upload.php' method='POST'>" +
                                    "<div class='input-group m-3'>" +
                                        "<div class='row input-group mb-3'>" +
                                        "<div class='input-group-prepend'>" +
                                            "<span class='input-group-text' id='basic-addon1'>Username</span>" +
                                        "</div>" +
                                        "<input type='text' class='form-control' name='username' placeholder='Username' aria-label='Username' aria-describedby='basic-addon1' required>" +
                                    "</div>" +
                                    "<div class='mb-3'>" +
                                        "<div class='row'>" +
                                            "<span class='input-group-text' id='basic-addon1'>Position</span>" +
                                            "<div class='radio mx-auto'>" +
                                                "<input label='Admin' type='radio' id='position' name='position' value='Admin'  required>" +
                                                "<input label='Cashier' type='radio' id='position' name='position' value='Cashier'  required>" +
                                            "</div>" +
                                        "</div>" +
                                    "</div>" +
                                    "<div class='row input-group mb-5'>" +
                                        "<div class='input-group-prepend'>" +
                                            "<span class='input-group-text' id='basic-addon1'>Password</span>" +
                                        "</div>" +
                                        "<input type='password' class='form-control' name='password' id='password' placeholder='Password' aria-label='Password' aria-describedby='basic-addon1' required>" +
                                    "</div>" +
                                    "<div class='button p-1 mt-4' style='position: absolute; right: 20px; top: 140px;'>" +
                                        "<input type='submit' class='btn btn-warning btn-lg' name='addaccount' value='Add'>" +
                                        "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                    "</div>" +
                                "</form>",
                            showCloseButton: false,
                            showConfirmButton: false,
                            focusConfirm: false
                            })
                    }
                    //modal add end
                    </script>



                    <div class="user">
                        <div class="row">
                            <div class="icon col-3">
                                <i class='bx bx-user ml-1 bx-md'></i>
                            </div>
                            <h6 class='col-6'>Current Admin:</br><?php echo $uName;?></h6>
                            <button type="button" class="btn btn-link pt-1 col-3" onclick="editUser()">Edit</button>
                            
                            <!-- Modal Edit -->
                            <script>
                                //modal edit
                                function editUser(){
                                    Swal.fire({
                                    title: '<strong>Edit Admin</strong>',
                                    html:
                                        "<form action='update.php' method='POST'>" +
                                            "<input type='hidden' name='id' id='id' value='<?php echo $_SESSION["id"];?>'>" +
                                            "<div class='input-group m-3'>" +
                                                "<div class='row input-group mb-3'>" +
                                                "<div class='input-group-prepend'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Username</span>" +
                                                "</div>" +
                                                "<input type='text' class='form-control' name='username' placeholder='Username' value='<?php echo $_SESSION["username"]?>' aria-label='Username' aria-describedby='basic-addon1' required>" +
                                            "</div>" +
                                            "<div class='row input-group mb-5'>" +
                                                "<div class='input-group-prepend'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Password</span>" +
                                                "</div>" +
                                                "<input type='text' class='form-control' name='password' id='password' value='<?php echo $_SESSION['password']?>' placeholder='Password' aria-label='Password' aria-describedby='basic-addon1' required>" +
                                            "</div>" +
                                            "<div class='button p-1 mt-4' style='position: absolute; right: 20px; top: 85px;'>" +
                                                "<input type='submit' class='btn btn-lg btn-warning' name='updateadmin' value='Add'>" +
                                                "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                            "</div>" +
                                        "</form>",
                                    showCloseButton: false,
                                    showConfirmButton: false,
                                    focusConfirm: false
                                    })
                                }
                            //modal edit end
                            </script>

                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Position</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM login WHERE NOT username = '$uName';";
                        $result = $con-> query($sql);
                        if ($result-> num_rows > 0){ 
                            while ($row = $result-> fetch_assoc()){
                                $id = $row["id"];
                                echo "<tr id='table_row'>
                                        <td scope='row'>" . $row["username"] . "</td>
                                        <td>" . $row["position"] . "</td>
                                        <td><input class='password' type='password' readonly value='" . $row["password"] . "'></input></td>
                                        <td colspan='4'>
                                            ";?>
                                            <button class='btn btn-dark' onclick="editModal<?php echo $id;?>()">Edit</button>
                                            <!-- Modal Edit -->
                                            <script>
                                                //modal edit
                                                function editModal<?php echo $id; ?>(){
                                                    Swal.fire({
                                                    title: '<strong>Edit Account</strong>',
                                                    html:
                                                        "<form action='update.php' method='POST'>" +
                                                            "<input type='hidden' name='id' id='id' value='<?php echo $row['id']; ?>'>" +
                                                            "<div class='input-group m-3'>" +
                                                                "<div class='row input-group mb-3'>" +
                                                                "<div class='input-group-prepend'>" +
                                                                    "<span class='input-group-text' id='basic-addon1'>Username</span>" +
                                                                "</div>" +
                                                                "<input type='text' class='form-control' name='username' placeholder='Username' value='<?php echo $row['username']?>' aria-label='Username' aria-describedby='basic-addon1' required>" +
                                                            "</div>" +
                                                            "<div class='row input-group mb-5'>" +
                                                                "<div class='input-group-prepend'>" +
                                                                    "<span class='input-group-text' id='basic-addon1'>Password</span>" +
                                                                "</div>" +
                                                                "<input type='text' class='form-control' name='password' id='password' value='<?php echo $row['password']?>' placeholder='Password' aria-label='Password' aria-describedby='basic-addon1' required>" +
                                                            "</div>" +
                                                            "<div class='button p-1 mt-4' style='position: absolute; right: 20px; top: 85px;'>" +
                                                                "<input type='submit' class='btn btn-lg btn-warning' name='updateaccount' value='Add'>" +
                                                                "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                                            "</div>" +
                                                        "</form>",
                                                    showCloseButton: false,
                                                    showConfirmButton: false,
                                                    focusConfirm: false
                                                    })
                                                }
                                            //modal edit end
                                            </script>

                                            <button class="btn btn-danger" onclick="deleteModal<?php echo $id;?>()">Delete</button>
                                            <!-- Modal Clear -->
                                            <script>
                                                function deleteModal<?php echo $id;?>(){
                                                Swal.fire({
                                                    title: '<strong>Delete <?php echo $row['position'];?> <?php echo $row['username'];?>?</strong>',
                                                    html: 
                                                    "<form method='post' name='admit' action='delete.php'>" +
                                                        "<input type='hidden' name='id' value='<?php echo $row['id'];?>'>" +
                                                        "<button type='submit' class='btn btn-lg btn-warning' name='deleteaccount' class='clear_btn'>Yes</button>" +
                                                        "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                                    "</form>",
                                                    showCloseButton: false,
                                                    icon: 'warning',
                                                    showConfirmButton: false,
                                                    focusConfirm: false,
                                                })
                                                }
                                            </script>
                                            <!-- end of clear modal -->
                                        </td>
                                    <?php echo "</tr>";
                            }
                        } 
                        ?>
                    </tbody>
                    
                    </div>
                </table>
            </div>
            </div>
    </section>
    <?php
        
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "added") == true){
    echo "<script>			
        Swal.fire({
        icon: 'success',
        title: 'Successfully added!',
        timer: 5000
    })
    </script>";
    exit();
    }
    if (strpos($fullUrl, "updated") == true){
        echo "<script>			
        Swal.fire({
        icon: 'success',
        title: 'Successfully updated!',
        timer: 5000
        })
        </script>";
        exit();
    }
    if (strpos($fullUrl, "deleted") == true){
        echo "<script>			
        Swal.fire({
        icon: 'success',
        title: 'Successfully deleted!',
        timer: 5000
        })
        </script>";
        exit();
    }
    if (strpos($fullUrl, "user=exist") == true){
        echo "<script>			
        Swal.fire({
        icon: 'error',
        title: 'This account exist!',
        timer: 5000
        })
        </script>";
        exit();
    }




    ?>
    </body>
    <script>
        function showpassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</html>