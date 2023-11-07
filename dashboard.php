<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <?php include 'head.php';
    include 'session.php';
    if($_SESSION["username"] == 'cashier'){
      header("Location:startup.php?access=denied");
    }?>
  <title>Dashboard</title>

  <style>
    .statcard {
      padding: auto;
      height: 150px;
    }
  </style>
   </head>
<body onload="active()">
  <?php 
    include 'navbar.php';
  ?>
  <script>
  function active() {
    var element = document.getElementById("dashboard");
    element.classList.add("active");
  }
  </script>
  <section class="home-section">
    <div class="text"></div>
    
    <div class="grey-bg container-fluid">

      <!-- front section -->
      <section id="stats-subtitle">

        <div class="row">
          <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Statistics for LUCKY WINGS!</h4>
          </div>
        </div>
        <?php 
          include 'connect.php';
          $sql = "SELECT SUM(total_price) as sum FROM `sale-history`;";
          $query_result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($query_result))
          {
            $output = $row['sum'];
          }
          $sql = "SELECT SUM(price) as sum FROM stocks;";
          $query_result = mysqli_query($con, $sql);
          while($row = mysqli_fetch_assoc($query_result))
          {
            $outputexpense = $row['sum']  ;
          } 
          $sum = $output - $outputexpense;
        ?>
        
        <div class="row">
          <!-- card for total sales -->
          <div class="col-xl-6 col-md-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body cleartfix">
                  <div class="media align-items-stretch">
                    <div class="align-self-center">
                    <h1 class="mr-2"><?php echo "₱ ".$sum; ?></h1>
                    </div>
                    <div class="media-body text-right">
                      <span> 
                        <h4>All Time <br> GROSS Profit</h4>
                      </span>
                    </div>
                    <div class="align-self-center ml-4">
                      <i class="icon-wallet success font-large-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <?php 
              $sql = "SELECT product_name AS sum, total_orders FROM menu WHERE total_orders = (SELECT max(total_orders) FROM menu);";
              $query_result = mysqli_query($con, $sql);
              while($row = mysqli_fetch_assoc($query_result)){
                if ($row['sum'] == "")
                {
                  $bestwings = "None";
                  $total = "0";
                }
                else
                {
                  $bestwings = " ".$row['sum'];
                  $total = " ".$row['total_orders'];
                }
              } 
            ?>   
          <!-- card for best wing -->
          <div class="col-xl-6 col-md-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body cleartfix">
                  <div class="media align-items-stretch">
                    <div class="align-self-center">
                      <h1 class="mr-4"><?php echo $bestwings;?></h1>
                    </div>  
                    <div class="media-body">
                      <h4>BEST SELLING WINGS!</h4>
                      <span>Total Orders: <?php echo $total." ";?> Orders Sold</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-heart danger font-large-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- stat section -->
      <section id="minimal-statistics">
        <div class="row">
          <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Sales</h4>
          </div>
        </div>
        <div class="row">
          <!-- monthly sales -->
          <div class="col-xl-6 col-sm-6 col-12"> 
            <div class="card statcard">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-calendar primary font-large-2 float-left"></i>
                    </div>
                      <?php
                      $query = "SELECT SUM(total_price)  FROM `sale-history` WHERE MONTH(date) = MONTH(CURRENT_DATE());";
                      $result = mysqli_query($con, $query);
                      ?>
                        <div class="media-body text-right">
                          <h3><?php 
                          while ($row = mysqli_fetch_row($result)) 
                          {
                              $sum = $row[0];
                          } 
                      $query = "SELECT MONTHNAME(date) as 'date', SUM(price) FROM stocks WHERE MONTH(date) = MONTH(CURRENT_DATE());";
                      $result = mysqli_query($con, $query);
                      ?>
                        <div class="media-body">
                          <h3><?php 
                            while ($row = mysqli_fetch_row($result)) 
                          {
                              $sumexpense = $row[1];
                              $date = $row[0];
                          }
                          $sumexpense = $sum - $sumexpense;
                          echo "₱ " . $sumexpense;
                            ?></h3>
                          <p>This month's GROSS Sale!</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- daily sales -->
          <div class="col-xl-6 col-sm-6 col-12">
            <div class="card statcard pt-2">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      <i class="icon-users warning font-large-2 float-left"></i>
                        <?php
                        $query = "SELECT sum(total_price) as 'total_price' , DAY(date) , MONTHNAME(date) FROM `sale-history` WHERE DAY(date) = DAY(CURRENT_DATE());";
                        $query_result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($query_result)
                        ?>
                    </div>
                    <div class="media-body text-right">
                      <h3><?php  
                      if ($row["total_price"] == "") {
                        echo "No transaction for today";
                      }
                      else{
                        echo "₱ ".$row["total_price"]; 
                      }?></h3>
                      <span>Daily Total Sales! <br></span>
                      <span id="m"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- total visits -->
          <div class="col-xl-6 col-sm-6 col-12">
            <div class="card statcard pt-2">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                    <?php 
                      $sql = "SELECT SUM(customer_count) as sum FROM `sale-history`;";
                      $query_result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_assoc($query_result))
                      {
                        $output = $row['sum'];
                      }
                      $sql = "SELECT SUM(customer_count) as sum FROM `sale-history`;";
                      $query_result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_assoc($query_result))
                      {
                        $output = $row['sum'];
                      }
                    ?>
                      <h3 class="danger"><?php echo $output; ?></h3>
                      <span>Total Customers</span>
                    </div>
                    <div class="align-self-center">
                      <i class="icon-direction danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- total Expenses -->
          <div class="col-xl-6 col-sm-6 col-12">
            <div class="card statcard pt-3">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                    <?php 
                      $sql = "SELECT SUM(price) as sum FROM `stocks`;";
                      $query_result = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_assoc($query_result))
                      {
                        $output = $row['sum'];
                      }
                    ?>
                      <h3 class="primary"><?php echo "₱ ".$output; ?></h3>
                      <span>Total Expense</span>
                    </div>
                    <div class="align-self-center">
                      <i class="fas fa-money-check-alt primary font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
      </section>

      <!-- stock section -->
      <section id="minimal-statistics">
        <div class="row">
          <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Stocks Menu</h4>
          </div>
        </div>
        <div class="row">
          <!--------stock piles------->
          <?php 
            $sql = "SELECT product_name, total_orders, stock_num FROM `menu`;";
            $query_result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($query_result))
            {?>
              <div class="col-xl-4 col-sm-6">
                <div class="card statcard pt-2">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media">
                        <div class="media-body">        
                            <h3><?php echo $row['product_name'];?></br></h3>
                            <p><?php echo $row['total_orders'];?> orders Sold</br>
                            Remaining Stock: <?php echo $row['stock_num'];?></p>
                        </div>
                        
                        <div class="align-self-center">
                          <i class="fas fa-drumstick-bite font-large-2 float-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php }
          ?>
        </div>
      </section>  
  <script type="text/javascript" src="javaScript.js"></script>
  <script>                        
    const d = new Date();
    let month = d.getMonth();
    document.getElementById("m").innerHTML = d.toDateString();
  </script>
</body>
</html>