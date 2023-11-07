<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
    <?php include 'head.php';
    include 'session.php';
    if($_SESSION["username"] == 'cashier'){
      header("Location:startup.php?access=denied");
    }?>
    <!-- pagination -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <title>History</title>
    <style>

      #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
      }

      #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
      }

      #myTable th, #myTable td {
        text-align: left;
        padding: 12px;
      }

      #myTable tr {
        border-bottom: 1px solid #ddd;
      }

      #myTable tr.header, #myTable tr:hover {
        background-color: #f1f1f1;
      } 
      .home-section {
        margin-top: -20px;
        padding-top: 30px;
        height: 110%;
        padding-bottom: -20px;
      }
    </style>
  </head>
<body onload="active()">

 
  <?php 
  include 'navbar.php';
  ?>
  <script>
  function active() {
    var element = document.getElementById("history");
    element.classList.add("active");
  }
  </script>
  
  <div class="home-section">
    <div class="container-fluid">
      <!-- history Card -->
      <div class="col-xl-8 col-lg-10 col-md-10 m-auto">
        <div class="card mb-3">
          <div class="card-content">
            <div class="card-body">
              <div class="media align-items-stretch">         
                <div class="container px-2">
                  <div class="text" style="margin-top: 10px;">TRANSACTION HISTORY</div>  
                  <table id="datatableid" class="table display table-responsive table-borderless table-hover" id="myTable">
                    <thead>
                      <tr class="bg-light">
                          <th scope="col" width="2%">Transaction ID</th>
                          <th scope="col" width="5%" >Customer Name</th>
                          <th scope="col" width="5%" >Customer Count</th>
                          <th scope="col" width="2%">Plan</th>
                          <th scope="col" width="5%">Total Price</th>
                          <th scopse="col" width="15%">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT * FROM `sale-history`;";
                      $result = $con-> query($sql);
                      if ($result-> num_rows > 0)
                      {
                        while ($row = $result-> fetch_assoc())
                        {?>
                          <tr>
                            <td scope='row'> <?php echo $row["customer_id"] ?> </td>
                            <td><?php echo $row["customer_name"]; ?></td>
                            <td> <?php echo $row["customer_count"]?></td>
                            <td> <?php echo $row["plan"]?></td>
                            <td class='text-end'><?php echo $row['total_price'] ?></td>
                            <td class='text-end'><?php echo $row['date'] ?></td>
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
</body>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#datatableid').DataTable();
} );
</script>
</html>




       