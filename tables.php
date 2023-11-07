<!DOCTYPE html>

<?php
    include 'session.php'; ?>
<html lang="en" dir="ltr">
  <head>
    <?php include 'head.php';?>
    <title>Tables</title>
    <style>
      hr {
        position: absolute;
        border-bottom: solid;
        border-width: 1px;
        bottom: 30px;
        index: -2;
      }
      .loader-wrapper {
      width: 100%;
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
      background-color: #rgba(250, 131, 52, .4);
      display:flex;
      justify-content: center;
      align-items: center;
      z-index: 1;
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
    </style>
  </head>
  <body>
    <?php 
    include 'navbar.php';
    ?>
    <script>
      function active() {
        var element = document.getElementById("tables");
        element.classList.add("active");
      }
    </script>
    
    
    
    <section class="home-section">

      <div class="text">Tables</div>
      <!-- tables -->
      <div id="alltable" class="alltable">
      
      <div class="container-fluid">

        <div class="row">
          <!-- start of table 1 div -->
          <div class="col-xl-6">
            
            <div class="card table-card rounded shadow">
              <div class="card-content">
                <div class="card-body Cleartfix">
                  <div class="media align-items-stretch">
                    <div class="text">Table Number: 1 </br></br>
                      <?php
                        // Displaying the name of customer in occupied table number 1
                        $sql = "SELECT * FROM customers;";
                        $result = $con-> query($sql);
                        $table = '1';
                        if ($result-> num_rows > 0){
                          while ($row = $result-> fetch_assoc()){
                            if($table == $row["table_num"]){
                              echo $row["name"];
                            }
                          }
                        }
                      ?>
                      <hr>
                      <form action="process.php" method="post">
                        <div class="tble_button">
                          <button type="submit"class="btn btn-sm btn-warning" name="tableServe1"> Serve</button>
                          <button type="submit" class="btn btn-sm btn-dark " name="tableDelete1">Clear</button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-responsive tablelist">
                            <thead>
                  
                                <tr class="bg-dark text-white">
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" width="3%">Quantity</th>
                                    <th scope="col" class="text-end" width="3%">Status</th>
                                </tr>
                            </thead>
                            
                            <tbody id="tables_table1">
                                                 
                            </tbody>       
                        </table>
                          
                      </form>
                      </div>
                      <!-- end of table div -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of table 1 div -->


          <!-- start of table 2 div -->
          <div class="col-xl-6">
            
            <div class="card table-card rounded shadow">
              <div class="card-content">
                <div class="card-body Cleartfix">
                  <div class="media align-items-stretch">
                    <div class="text">Table Number: 2 </br></br>
                      <?php
                        // Displaying the name of customer in occupied table number 2
                        $sql = "SELECT * FROM customers;";
                        $result = $con-> query($sql);
                        $table = '2';
                        if ($result-> num_rows > 0){
                          while ($row = $result-> fetch_assoc()){
                            if($table == $row["table_num"]){
                              echo $row["name"];
                            }
                          }
                        }
                      ?>
                      <hr>
                      <form action="process.php" method="post">
                        <div class="tble_button">
                          <button type="submit"class="btn btn-sm btn-warning" name="tableServe2"> Serve</button>
                          <button type="submit" class="btn btn-sm btn-dark " name="tableDelete2">Clear</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive tablelist">
                            <thead>
                  
                                <tr class="bg-dark text-white">
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" class="text-end" width="3%">Quantity</th>
                                    <th scope="col" class="text-end" width="5%">Status</th>
                                </tr>
                            </thead>
                            
                            <tbody id="tables_table2">
                                                          
                            </tbody>       
                        </table>
                          
                      </form>
                      </div>
                      <!-- end of table div -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of table 2 div -->


          <!-- start of table 3 div -->
          <div class="col-xl-6">
            
            <div class="card table-card rounded shadow">
              <div class="card-content">
                <div class="card-body Cleartfix">
                  <div class="media align-items-stretch">
                    <div class="text">Table Number: 3 </br></br>
                      <?php
                        // Displaying the name of customer in occupied table number 3
                        $sql = "SELECT * FROM customers;";
                        $result = $con-> query($sql);
                        $table = '3';
                        if ($result-> num_rows > 0){
                          while ($row = $result-> fetch_assoc()){
                            if($table == $row["table_num"]){
                              echo $row["name"];
                            }
                          }
                        }
                      ?>
                      <hr>
                      <form action="process.php" method="post">
                        <div class="tble_button">
                          <button type="submit"class="btn btn-sm btn-warning" name="tableServe3"> Serve</button>
                          <button type="submit" class="btn btn-sm btn-dark " name="tableDelete3">Clear</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive tablelist">
                            <thead>
                  
                                <tr class="bg-dark text-white">
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" class="text-end" width="3%">Quantity</th>
                                    <th scope="col" class="text-end" width="5%">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tables_table3">
                                           
                            </tbody>       
                        </table>
                      </form>
                      </div>
                      <!-- end of table div -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of table 3 div -->


          <!-- start of table 4 div -->
          <div class="col-xl-6">
            
            <div class="card table-card rounded shadow">
              <div class="card-content">
                <div class="card-body Cleartfix">
                  <div class="media align-items-stretch">
                    <div class="text">Table Number: 4 </br></br>
                      <?php
                        // Displaying the name of customer in occupied table number 4
                        $sql = "SELECT * FROM customers;";
                        $result = $con-> query($sql);
                        $table = '4';
                        if ($result-> num_rows > 0){
                          while ($row = $result-> fetch_assoc()){
                            if($table == $row["table_num"]){
                              echo $row["name"];
                            }
                          }
                        }
                        
                      ?>
                      <hr>
                      <form action="process.php" method="post">
                        <div class="tble_button">
                          <button type="submit"class="btn btn-sm btn-warning" name="tableServe4"> Serve</button>
                          <button type="submit" class="btn btn-sm btn-dark " name="tableDelete4">Clear</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive tablelist">
                            <thead>
                  
                                <tr class="bg-dark text-white">
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" class="text-end" width="3%">Quantity</th>
                                    <th scope="col" class="text-end" width="5%">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tables_table4">
                                              
                            </tbody>       
                        </table>
                      </form>
                      </div>
                      <!-- end of table div -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of table 4 div -->

          <!-- start of table 5 div -->
          <div class="col-xl-6">
            
            <div class="card table-card rounded shadow">
              <div class="card-content">
                <div class="card-body Cleartfix">
                  <div class="media align-items-stretch">
                    <div class="text">Table Number: 5 </br></br>
                      <?php
                        // Displaying the name of customer in occupied table number 5
                        $sql = "SELECT * FROM customers;";
                        $result = $con-> query($sql);
                        $table = '5';
                        if ($result-> num_rows > 0){
                          while ($row = $result-> fetch_assoc()){
                            if($table == $row["table_num"]){
                              echo $row["name"];
                            }
                          }
                        }
                      ?>
                      <hr>
                      <form action="process.php" method="post">
                        <div class="tble_button">
                          <button type="submit"class="btn btn-sm btn-warning" name="tableServe5"> Serve</button>
                          <button type="submit" class="btn btn-sm btn-dark " name="tableDelete5">Clear</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive tablelist">
                            <thead>
                  
                                <tr class="bg-dark text-white">
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" class="text-end" width="3%">Quantity</th>
                                    <th scope="col" class="text-end" width="5%">Status</th>
                                </tr>
                            </thead>
                            <tbody id="tables_table5">
                                      
                            </tbody>       
                        </table>
                      </form>
                      </div>
                      <!-- end of table div -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of table 5 div -->




            
    
        </div>

    </div>
      </div>
    
      <!-- loading -->
      <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
      </div>
    
    </section>

    <script type="text/javascript" src="javaScript.js"></script>
    <script>
      function loadXMLDoc1() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tables_table1").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "tables_table1.php", true);
        xhttp.send();
      }
      function loadXMLDoc2() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tables_table2").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "tables_table2.php", true);
        xhttp.send();
      }
      function loadXMLDoc3() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tables_table3").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "tables_table3.php", true);
        xhttp.send();
      }
      function loadXMLDoc4() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tables_table4").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "tables_table4.php", true);
        xhttp.send();
      }
      function loadXMLDoc5() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tables_table5").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "tables_table5.php", true);
        xhttp.send();
      }

      setInterval(function(){
        loadXMLDoc1();
        loadXMLDoc2();
        loadXMLDoc3();
        loadXMLDoc4();
        loadXMLDoc5();
        // 1sec
      },1000);

      window.onload = loadXMLDoc1;
      window.onload = loadXMLDoc2;
      window.onload = loadXMLDoc3;
      window.onload = loadXMLDoc4;
      window.onload = loadXMLDoc5;
      window.onload = active;

      $(window).on("load",function(){
          $(".loader-wrapper").delay(1000).fadeOut("slow");
        });
    </script>
  </body>
</html>