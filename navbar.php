   <?php
    include 'connect.php';
   ?>
   <div class="sidebar open">
    <div class="logo-details">
      <i>
        <img src="logo.png" alt="logoMain.png" class='icon' style="height: 40px; width: 40px; margin-top: -5px;">
      </i>
        <div class="logo_name">Lucky Wings</div>
        <i class='bx bx-menu-alt-right' id="btn"></i>
    </div>
    <ul class="nav-list">
    
    <?php
     if($_SESSION['position'] == 'Admin'){
       ?>
      <li>
        <a href="dashboard.php" id="dashboard">
          <i class='bx bxs-dashboard'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="charts-pertransaction.php" id="charts">
         <i class='bx bx-chart'></i>
         <span class="links_name">Chart</span>
       </a>
       <span class="tooltip">Charts</span>
     </li>
     <li>
       <a href="data.php" id="history">
         <i class='bx bx-history' ></i>
         <span class="links_name">History</span>
       </a>
       <span class="tooltip">History</span>
     </li>
     <li>
       <a href="stocks.php" id="stocks">
         <i class='bx bx-coin'></i>
         <span class="links_name">Expenses</span>
       </a>
       <span class="tooltip">Expense</span>
     </li>
     <li>
       <a href="setting.php" id="menu">
         <i class='bx bx-food-menu'></i>
         <span class="links_name">Menu</span>
       </a>
       <span class="tooltip">Menu</span>
     </li>
     <li>
       <a href="accounts.php" id="accounts">
         <i class='bx bxs-user-account'></i>
         <span class="links_name">Accounts</span>
       </a>
       <span class="tooltip">Accounts</span>
     </li>
     <?php
    }?>


    <li>
       <a href="orders.php" id="orders">
         <i class='bx bxs-user-detail'></i>
         <span class="links_name">Customers</span>
       </a>
       <span class="tooltip">Customers</span>
     </li>
     <li>
       <a href="tables.php" id="tables">
         <i class='bx bx-chair' ></i>
         <span class="links_name">Tables</span>
       </a>
       <span class="tooltip">Tables</span>
     </li>

    
     <li class="profile">
      <div class="profile-details">
        <i class='bx bx-user'></i>
        <div class="name_job">
          <div class="name"><?php echo ucfirst($_SESSION['username']);?></div>
          <div class="job"><?php echo $_SESSION['position'];?></div>
        </div>
      </div>
      <a href="startup.php"><i class='bx bx-home' id="log_out" ></i></a>
      <span class="tooltip-back">Main Page</span>
     </li>
    </ul>
  </div>
  
<script type="text/javascript" src="javaScript.js"></script>