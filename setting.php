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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <style>
    .button {
      position: relative;
    }
    .btn-update {
      left: 50%;
    }
    tr {
      text-align: center;
    }
    .alert {
      position: absolute;
      right: 10px;
      top: 10px;
      height: 60px;
      width: 300px;
    }
    .alert p{
      position: absolute;
      right: 20px;
      top: 20px;
    }
    .home-section {
      margin-top: -20px;
      padding-top: 30px
    }
    .cell {
      margin-top: 19%;
      text-align: center;
    }
    .cell-button {
      margin-top: 15%;
      text-align: center;
    }
  </style>
  </head>
<body onload="active()">
  <?php
  include 'navbar.php';
  ?>
  <script>
  function active() {
    var element = document.getElementById("menu");
    element.classList.add("active");
  }
  </script>
  <section class="home-section">
    <div class="container mt-3">            
      <div class="card stock">
        <div class="head">
          <div class="text">
            Lucky Wings Menu 
          </div>
          <button class="btn btn-warning" onclick="addModal()">Add Menu</button>
          <!-- modal add -->
          <script>
            //modal add
            function addModal(){
              Swal.fire({
              title: '<strong>Add Menu</strong>',
              html:
              
                "<form action='upload.php' method='POST' enctype='multipart/form-data'>" +
                  "<div class='row input-group mb-3'>" +
                    "<div class='input-group-prepend'>" +
                      "<span class='input-group-text' id='basic-addon1'>Name</span>" +
                    "</div>" +
                    "<input type='text' class='form-control' name='menu_name' placeholder='Menu Name' aria-label='Username' aria-describedby='basic-addon1' required>" +
                  "</div>" +
                  "<div class='row input-group mb-3'>" +
                    "<div class='input-group-prepend'>" +
                      "<span class='input-group-text' id='basic-addon1'>Stock</span>" +
                    "</div>" +
                    "<input type='number' class='form-control' name='stock' placeholder='Stock Count' aria-label='Username' aria-describedby='basic-addon1' required>" +
                  "</div>" +
                  "<div class='row input-group mb-3'>" +
                    "<div class='input-group-prepend'>" +
                      "<span class='input-group-text' id='basic-addon1'>Menu Image</span>" +
                    "</div>" +
                    "<input type='file' class='form-control p-1' name='image' required>" +
                  "</div>" +
                  "<input type='submit' class='btn btn-lg btn-warning' name='submit' value='Add'>" +
                  "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                      
                "</form>", 
              showCloseButton: false,
              showConfirmButton: false,
              focusConfirm: false
            })
            }
            //modal add end
          </script>

        </div>
          <table class="table table-hover">
              <thead>
                  <tr>
                  <th scope="col">Menu Name</th>
                  <th scope="col">Image</th>
                  <th scope="col">Stocks Count</th>
                  <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $sql = "SELECT * FROM menu;";
                  $result = $con-> query($sql);
                  if ($result-> num_rows > 0){ 
                      while ($row = $result-> fetch_assoc()){
                        if($row['stock_num'] <= 0){
                          ?>
                            <div class="card alert bg-danger p-auto rounded" id="alert">
                              <i class="bx bx-md bx-error-circle"></i> 
                              <p><?php echo $row['product_name']." ";?> is Out of Stock </p>             
                            </div>

                          <?php
                        }
                        $id = $row["id"];
                          echo "<tr height='100px' id='table_row'>
                                  <td scope='row'><div class='cell'>" . $row["product_name"] . "</div></td>
                                  <td><div class='imgcell'><img src='menu/" . $row["picture"] . "' alt='image not found' style='height:100px; width:150px;'> </div></td>
                                  <td><div class='cell'>" . $row["stock_num"] . "</div></td>
                                  <td colspan='4'> <div class='cell-button'>
                                    ";?>
                                    <button class='btn btn-dark' onclick="modalEdit<?php echo $id;?>()">Edit</button>
                                    <!-- Modal edit -->
                                    <script>
                                      //modal edit
                                      function modalEdit<?php echo $id;?>(){
                                        Swal.fire({
                                        title: '<strong>Edit Menu</strong>',
                                        html:
                                          "<form action='update.php' method='POST' enctype='multipart/form-data'>" +                                             
                                            "<input type='hidden' name='id' id='id' value='<?php echo $row['id']; ?>'>" +

                                            "<div class='row input-group mb-3'>" +
                                                "<div class='input-group-prepend'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Name</span>" +
                                                "</div>" +
                                                "<input type='text' class='form-control' value='<?php echo $row['product_name']?>' name='menu_name' id='menu_name' placeholder='Menu Name' aria-label='Username' aria-describedby='basic-addon1' required>" +
                                            "</div>" +
                                            "<div class='row input-group mb-3'>" +
                                                "<div class='input-group-prepend'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Stock</span>" +
                                                "</div>" +
                                                "<input type='number' class='form-control' value='<?php echo $row['stock_num']?>' name='stock' id='stock' placeholder='Stock Count' aria-label='Username' aria-describedby='basic-addon1' required>" +
                                            "</div>" +
                                            "<div class='row input-group mb-3'>" +
                                                "<div class='input-group-prepend'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Menu Image</span>" +
                                                "</div>" +
                                                "<input type='file' class='form-control p-1'  name='image' id='image'>" +
                                            "</div>" +
                                                "<input type='submit' class='btn btn-lg btn-warning btn-update' name='updatedata' value='Update'>" +
                                                "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                            

                                          "</form>",
                                        
                                        showCloseButton: false,
                                        showConfirmButton: false,
                                        focusConfirm: false
                                      })
                                      }
                                      //modal add end
                                    </script>
                                    <!-- modal end -->

                                    <button class="btn btn-danger" onclick="deleteModal<?php echo $id;?>()">Delete</button>
                                    <!-- Modal Clear -->
                                    <script>
                                        function deleteModal<?php echo $id;?>(){
                                        Swal.fire({
                                            title: '<strong>Delete <?php echo $row['product_name'];?>?</strong>',
                                            html: 
                                            "<form method='post' name='admit' action='delete.php'>" +
                                                "<input type='hidden' name='id' value='<?php echo $row['id'];?>'>" +
                                                "<button type='submit' class='btn btn-lg btn-warning' name='delete' class='clear_btn'>Yes</button>" +
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript" src="javaScript.js"></script>
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
            title: 'Successfully Updated!',
            timer: 5000
        })
        </script>";
        exit();
      } 
      if (strpos($fullUrl, "deleted") == true){
        echo "<script>			
            Swal.fire({
            icon: 'success',
            title: 'Successfully Deleted!',
            timer: 5000
        })
        </script>";
        exit();
        } 
        if (strpos($fullUrl, "menu=exist") == true){
          echo "<script>			
              Swal.fire({
              icon: 'error',
              title: 'This Menu Exist!',
              timer: 5000
          })
          </script>";
          exit();
          } 
  ?>               
</body>
</html>