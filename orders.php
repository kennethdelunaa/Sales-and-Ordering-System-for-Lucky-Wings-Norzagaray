
<!DOCTYPE html>

<?php
    include 'session.php'; ?>

<html lang="en" dir="ltr">
  <head>
    <?php include 'head.php';?>
    <title>Customers</title>
    
    <style>
      .loader-wrapper {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      background-color: #rgba(250, 131, 52, .4);
      display:flex;
      justify-content: center;
      align-items: center;
      }
      .loader {
        display: inline-block;
        width: 30px;
        height: 30px;
        position: relative;
        border: 4px solid #FA8334;
        animation: loader 2s infinite ease;
        shadow: #808080;
      }
      .loader-inner {
        vertical-align: top;
        display: inline-block;
        width: 100%;
        background-color: #FA8334;
        animation: loader-inner 2s infinite ease-in;
      }
      @keyframes loader {
        0% { transform: rotate(0deg);}
        25% { transform: rotate(180deg);}
        50% { transform: rotate(180deg);}
        75% { transform: rotate(360deg);}
        100% { transform: rotate(360deg);}
      }
      @keyframes loader-inner {
        0% { height: 0%;}
        25% { height: 0%;}
        50% { height: 100%;}
        75% { height: 100%;}
        100% { height: 0%;}
      }
      /* [type='radio'] {
        display: none; 
        } */
        
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
        font-size: 16px;
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
    </style>
  </head>

<body>
  <?php 
  include 'navbar.php';
  ?>
  <script>
  function active() {
    var element = document.getElementById("orders");
    element.classList.add("active");
  }
  </script>
  <div class="home-section">
    <div class="text">Customers</div>
    
    <div class="container-fluid"> 


      <div class="row">

        <!-- Customers Card -->
        <div class="col-xl-8 col-md-10 mx-auto">

          <div class="card dashcard">
      
            <div class="card-content">

              <div class="card-body">

                <div class="media align-items-stretch">
                  
                  <div class="container mt-3 px-2">
                    <div class="text" style="margin-top:-30px;">Waiting Lobby</div>
                    <button id="myBtn" class="btn btn-warning black" name="addCust" onclick="addModal()">Add New Customer</button>

                    <div class="table-responsive">
                      
                      <table class="table table-responsive table-borderless orderlist">
                        <thead>
                        
                            <tr class="bg-dark text-white">
                                <th scope="col" width="5%" >Name</th>
                                <th scope="col" width="5%" >Table No.</th>
                                <th scope="col" width="5%" >Plan</th>
                                <th scope="col" width="6%">Head Count</th>
                                <th scopse="col" class="text-end" width="5%">Status</th>
                                <th scopse="col" class="text-end" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="scroll">
                        <?php
                          $sql = "SELECT * FROM customers;";
                          $result = $con-> query($sql);
                          
                          if ($result-> num_rows > 0)
                          {
                              
                              while ($row = $result-> fetch_assoc())
                              {   
                                  
                                  $id = $row["id"];
                                  if ($row["table_num"] == 0) {
                                      $tble = "Waiting To Be Admitted";
                                  }
                                  else {
                                      $tble = $row["table_num"];
                                  }
                                  ?>
                                  <tr>

                                      <td scope='row'><?php echo $row["name"]; ?><input type="hidden" name="id" value="<?php echo $row['id'];?>"></td>
                                      <td> <?php echo $tble?></td>
                                      <td> <?php echo $row["plan"]?></td>
                                      <td class='text-end'><?php echo $row["head_count"] ?></td>
                                      <td class='text-end'><?php
                                          if ($row["status"] == "Admitted")
                                              {
                                              echo "<i class='fas fa-check-circle green'></i>";
                                              echo "<span class='ms-1'> " . $row["status"] . "</span>";
                                              }
                                              else if ($row["status"] == "Waiting")
                                              {
                                              echo "<i class='fas fa-circle yellow'></i>";
                                              echo "<span class='ms-1'> " . $row["status"] . "</span>";  
                                              } ?></td>
                                      <td>
                                      <?php if($row['table_num'] == 0){?>
                                        <button class="serve btn btn-warning black" onclick="admitModal<?php echo $id;?>()">Admit</button>
                                      <?php }?> 
                                        <!-- Modal Admit -->
                                        <script>
                                          //admit add
                                          function admitModal<?php echo $id;?>(){
                                            Swal.fire({
                                            title: '<strong>Admit Customer</strong>',
                                            html: 
                                            "<form method='post' name='admit' action='addwaitlist.php'>" +
                                              "<div class='modal-body'>" +
                                                "<input type='hidden' name='id' value='<?php echo $row['id'];?>'>" +
                                                "<div class='mx-auto'>" +  
                                                  "<div class='input-group mb-3'>" +
                                                    "<span class='input-group-text' id='basic-addon1'>Name</span>" +
                                                    "<input type='text' class='form-control' placeholder='Name' aria-label='Name' value='<?php echo $row['name'];?>' aria-describedby='Name' name='name' id='name' readonly>" +
                                                  "</div>" +
                                                "</div>" +  
                                                
                                                "<div class='radio mx-auto mb-4'>" +
                                                  "<input label='Table 1' type='radio' id='table_1' name='table' value='1'>" +
                                                  "<input label='Table 2' type='radio' id='table_2' name='table' value='2'>" +
                                                  "<input label='Table 3' type='radio' id='table_3' name='table' value='3'>" +
                                                  "<input label='Table 4' type='radio' id='table_4' name='table' value='4'>" +
                                                  "<input label='Table 5' type='radio' id='table_5' name='table' value='5'>" +
                                                "</div>" +
                                              "</div>" +
                                                "<button type='submit' class='btn btn-lg btn-warning mb-4' name='admit_btn' class='admit_btn'>Admit</button>" +
                                                "<a class='btn btn-lg  mb-4 btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                            "</form>",
                                            
                                            showCloseButton: false,
                                            showConfirmButton: false,
                                            focusConfirm: true,
                                            focusConfirm: true,
                                            width: '36rem'
                                          })
                                          }
                                          //modal admit end
                                        </script>





                                      <button class="delete btn btn-dark" onclick="deleteModal<?php echo $id;?>()">Clear</button>
                                      <!-- Modal Clear -->
                                      <script>
                                        function deleteModal<?php echo $id;?>(){
                                          Swal.fire({
                                            title: '<strong><?php
                                                        if($row['status'] == 'Admitted'){
                                                          echo "Are you sure Table " . $row['table_num'] . " has finished eating?";
                                                        }
                                                        else {
                                                          echo "Are you sure to clear Customer ".$row['name']."?";
                                                        }
                                                      ?> </strong>',
                                            html: 
                                            "<form method='post' name='admit' action='addwaitlist.php'>" +
                                                  "<input type='hidden' name='id' value='<?php echo $row['id'];?>'>" +
                                                "<button type='submit' class='btn btn-lg btn-warning' name='clear_btn' class='clear_btn'>Yes</button>" +
                                                "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
                                            "</form>",
                                            showCloseButton: false,
                                            icon: 'warning',
                                            showConfirmButton: false,
                                            focusConfirm: false,
                                            width: '36rem'
                                          })
                                          }
                                      </script>
                                      <!-- end of clear modal -->
                                      </td>
                                  </tr>
                                      <?php
                              } 
                          }
                          ?>
                        </tbody>
                      </table>
                            
                        
                    </div>
                    
                  </div>
                
                </div>

              </div>

            </div>
            
          </div>
 
        </div>
      </div>
    </div> 
</div>
  

  <script>
    //modal add
    function addModal(){
      Swal.fire({
      title: '<strong>Add Customers</strong>',
      html:
      "<form method='post' action='addwaitlist.php'>" +

        "<div class='input-group mb-3'>" +
          "<span class='input-group-text' id='basic-addon1'>Name</span>" +
          "<input type='text' class='form-control' placeholder='Name' aria-label='Name' aria-describedby='Name' name='name' id='name' required>" +
        "</div>" +

        "<div class='row mx-auto'>" +
          "<div class='mx-auto'>" +
            "<div class='mb-3'>" +
              "<div class='radio mx-auto' required>" +
                "<input label='198 Plan' type='radio' id='198' name='plan' value='198' checked>" +
                "<input label='238 Plan' type='radio' id='238' name='plan' value='238'>" +
              "</div>" +
            "</div>" +
          "</div>" +
          "<div class='mx-auto'>" +
            "<div class='col-xl-4'>" +
              "<div class='input-group mb-3'>" +
                "<div class='dropdown'>" +
                  "<div class='input-group'>" +
                    "<select name='head_count' data-placeholder='Select table...' class='btn btn-warning btn-lg dropdown-toggle' tabindex='2'>" +                
                      "<option value='1'>1 Person</option>" +
                      "<option value='2'>2 People</option>" +   
                      "<option value='3'>3 People</option>" +
                      "<option value='4'>4 People</option>" +
                      "<option value='5'>5 People</option>" +
                      "<option value='6'>6 People</option>" +
                    "</select>" +

                  "</div>" +
                "</div>" +          
              "</div>" +
            "</div>" +
          "</div>" +
        "</div>" +
        "<button type='submit' class='btn btn-lg btn-warning' id='submit' name='btn_add' class='btn_add'>Add</button>" +
        "<a class='btn btn-lg btn-dark ml-1 white' id='submit' name='btn_add' onclick='Swal.close()' class='btn_add'>Cancel</a>" +
      "</form>",
      showCloseButton: false,
      showConfirmButton: false,
      focusConfirm: false
    })
    }
    //modal add end
  </script>
  <script src="jquery-3.6.0.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="javaScript.js"></script>
  <script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  
  <script>
    
    function addwait() {
      let x = document.forms["addwait"]["name"].value;
      let y = document.forms["addwait"]["head_count"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
      if (y == "") {
        alert("Head Count must be filled out");
        return false;
      }
    }
    // for real time update
  function loadXMLDoc_ordtable() {
    var xhttpord = new XMLHttpRequest();
    xhttpord.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ordtable").innerHTML =
        this.responseText;
      }
    };
    xhttpord.open("GET", "orders_ordertable.php", true);
    xhttpord.send();
  }
  function loadXMLDoc_custtable() {
    var xhttpcust = new XMLHttpRequest();
    xhttpcust.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ordcust").innerHTML =
        this.responseText;
      }
    };
    xhttpcust.open("GET", "orders_custtable.php", true);
    xhttpcust.send();
  }
  setInterval(function(){
    loadXMLDoc_ordtable();
    // 1sec
  },1000);
  setInterval(function(){
    loadXMLDoc_custtable();
    // 1sec
  },500);
  window.onload = loadXMLDoc_custtable;
  window.onload = loadXMLDoc_ordtable;
  window.onload = active;

  $(window).on("load",function(){
    $(".loader-wrapper").delay(1500).fadeOut("slow");
  });
  </script>
<?php
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if (strpos($fullUrl, "table=occupied") == true){
    echo "<script>			
      Swal.fire({
      icon: 'error',
      title: 'TABLE BUSY!',
      text: 'Table is busy at the moment!',
      timer: 5000
    })
    </script>";
    exit();
  }
  if (strpos($fullUrl, "table=empty") == true){
    echo "<script>			
      Swal.fire({
      icon: 'error',
      title: 'NO TABLE SELECTED!',
      text: 'Please choose a table!',
      timer: 5000
    })
    </script>";
    exit();
  }
  if (strpos($fullUrl, "add=success") == true){
    echo "<script>			
      Swal.fire(
        'SUCCESS!',
        'Succesfully added!',
        'success'
      )
    </script>";
    exit();
  }
  if (strpos($fullUrl, "table=success") == true){
    echo "<script>			
      Swal.fire(
        'SUCCESS!',
        'Succesfully Admitted!',
        'success'
      )
    </script>";
    exit();
  }
  if (strpos($fullUrl, "cust=deleted") == true){
    echo "<script>			
      Swal.fire(
        'SUCCESS!',
        'Succesfully cleared!',
        'success'
      )
    </script>";
    exit();
  }
?>
</body> 
</html>
                      