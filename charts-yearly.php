
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <?php include 'head.php';
    include 'connect.php';
    include 'session.php';
    if($_SESSION["username"] == 'cashier'){
      header("Location:startup.php?access=denied");
    }
    ?>
   <title>Chart</title>
  </head>
<body onload="active()">
  <?php 
    include 'navbar.php';
  ?>
  <script>
  function active() {
    var element = document.getElementById("charts");
    element.classList.add("active");
  }
  </script>
  <section class="home-section">
    <div class="row">
      <div class="col-12 mt-3 ml-4">
        <h4 class="text-uppercase">Chart</h4>
      </div>
    </div>
        <div class="col-xl-8 col-sm-6 m-auto"> 
        <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div>
                  <div >
                        <div class="col-12 mt-3 mb-1">
                            <div class="dropdown text-left">
                                    <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Yearly
                                    </a>
                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="charts-monthly.php">Montly</a>
                                    <a class="dropdown-item" href="charts-daily.php">Daily</a>
                                    <a class="dropdown-item" href="charts-pertransaction.php">Per Transaction</a>
                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Sales', 'Expenses'],
          <?php 
          $query = "select YEAR(date) as 'date', sale, expense from chart_table GROUP BY YEAR(date);";
          $res = mysqli_query($con, $query);
          while($data=mysqli_fetch_array($res))
          {
            $date = $data['date'];
            $sale = $data['sale'];
            $expenses = $data['expense'];
         
          
          ?>
          ['<?php echo $date?>' , <?php echo $sale?>, <?php echo $expenses?>],
            <?php
            }
            ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses Of Lucky Wings',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
                  </div>
                    
            </div>
              </div>
                    
                </div>
            </div>
        </div>
  </section>  
  
</body>
</html>



       
       

       
       