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
    <title>Stocks</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  </head>
  <body onload="active()">
    <?php
    include 'navbar.php';
    ?>
  <script>
    function active() {
      var element = document.getElementById("stocks");
      element.classList.add("active");
    }
  </script>
  <section class="home-section">
    <div class="container mt-3">            
      <div class="card stock">
        <div class="head">
          <div class="text">
            Lucky Wings Expenses
          </div>
          <button class="btn btn-warning" onclick="addModal()">Add</button>
          

          <!-- modal add -->
          <script>
            //modal add
            function addModal(){
                Swal.fire({
                title: '<strong>Add</strong>',
                html:
                  "<form action='stocks_upload.php' method='POST' enctype='multipart/form-data'>" +
                    "<div class='row input-group mb-3'>" +
                        "<span class='input-group-text' id='basic-addon1'>Name</span>" +
                        "<input type='text' class='form-control' name='name' placeholder='Item Name' aria-label='Username' aria-describedby='basic-addon1' required>" +
                        "</div>" +
                    "<div class='row input-group mb-3'>" +
                        "<span class='input-group-text' id='basic-addon1'>Category</span>" +
                        "<input type='text' class='form-control' name='category' placeholder='Category' aria-label='Username' aria-describedby='basic-addon1' required>" +
                    "</div>" +
                    "<div class='row input-group mb-3'>" +
                        "<span class='input-group-text' id='basic-addon1'>Description</span>" +
                        "<input type='textarea' class='form-control' name='description' placeholder='Description' aria-label='Username' aria-describedby='basic-addon1' required>" +
                    "</div>" +                      
                    "<div class='row input-group mb-3'>" +
                        "<span class='input-group-text' id='basic-addon1'>Price</span>" +
                        "<input type='number' class='form-control p-1' name='price' placeholder='Price' aria-label='Username' aria-describedby='basic-addon1' required>" +
                    "</div>" +
                    "<div class='row input-group mb-3'>" +
                        "<span class='input-group-text' id='basic-addon1'>Receipt/Image</span>" +
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
              <tbody>
                
            <?php echo "</tr>";?>
            <thead>
        <tr class="bg-light">
            <th scope="col" width="2%">ID</th>
            <th scope="col" width="5%" >Item Name</th>
            <th scope="col" width="5%" >Category</th>
            <th scope="col" width="5%" >Description</th>
            <th scope="col" width="5%">Price</th>
            <th scopse="col" width="15%">Date</th>
            <th scopse="col" width="15%">Receipt/Picture</th>
        </tr>
      </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM stocks;";
            $result = $con-> query($sql);
            if ($result-> num_rows > 0)
            {
              while ($row = $result-> fetch_assoc())
              {
                echo "<tr>
                  <td scope='row'>".$row["id"] ."</td>
                  <td>". $row["item_name"]."</td>
                  <td> ".$row["category"]."</td>
                  <td> ".$row["description"]."</td>
                  <td>".$row['price']."</span></i></td>
                  <td>".$row['date']."</td>
                  <td><div class='imgcell'><img src='menu/" .$row["picture"]. "' alt='image not found' style='height:100px; width:120px;'> </div></td>  
                  </tr>";
                  
              } 
            }
        ?>
        
        
        </tbody>
        </table>
    </tbody>
</div>
</table>
</div>
    </div>
  </section>
  <script type="text/javascript" src="javaScript.js"></script>
</body>
</html>