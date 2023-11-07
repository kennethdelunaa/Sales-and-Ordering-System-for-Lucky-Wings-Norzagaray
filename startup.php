<?php
include 'connect.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>
<title>Start Up</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<script src="sweetalert2.all.min.js"></script>
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins" , sans-serif;}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("mainpage.jpg");
  min-height: 100%;
}
</style>
<body>
<?php
if($_SESSION["position"] == 'Admin'){
  $href = 'dashboard.php';
}
else{
  $href = 'orders.php';
}
?>
<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-orange w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>
    <a href="table_setup.php" class="w3-bar-item w3-button">TABLE SETUP</a>
    <a href="<?php echo $href;?>" class="w3-bar-item w3-button"><?php echo strtoupper($_SESSION["position"]);?></a>
    <a onclick="logout()" class="w3-bar-item w3-button w3-right">LOG OUT</a>

  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-orange w3-xlarge">Open from 11am to 9pm</span>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'wings');" id="myLink">
        <div class="w3-col w3-orange s4 tablink w3-padding-large ">Wings Flavor</div>
      </a>
    </div>
    
    <?php 
        $sql = "SELECT product_name AS sum FROM menu WHERE total_orders = (SELECT max(total_orders) FROM menu);";
        $query_result = mysqli_query($con, $sql);
        while($row = mysqli_fetch_assoc($query_result)){
            $bestwings = $row['sum'];
        } 
    ?>   
    <div id="wings" class="w3-container menu w3-padding-32 w3-white">
      <?php 
        $sql = "SELECT * FROM menu";
        $result = $con-> query($sql);
            if ($result-> num_rows > 0){ 
                while ($row = $result-> fetch_assoc()){
                    ?>
                    <h1><b><?php echo $row['product_name'];?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php if ($bestwings == $row['product_name']){ echo "Best Seller";} ?></span></h1>
                        <hr>
                        <?php
                }
            }
      ?>
   
    </div>

    

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-orange w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p class="w3-col w3-center s4">Dine In</p>
    <p class="w3-col w3-center s4">Customer Pickup</p>
    <p class="w3-col w3-center s4">Restaurant Delivery</p>
    <h3 class="w3-col w3-center s6">Offers Free Wifi</h3>
    <h3 class="w3-col w3-center s6">Accepts Cash</h3>
    <img src="mainpage2.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
    
  </div>
</div>

<!-- Image of location/map -->
<img src="loc.png" class="w3-image" style="width:100%;" id="myMap">

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p class="w3-center">Find us at 2nd Floor Roadsideview, Back of 7/11 Crossing <br> Brgy.Poblacion 3013 Norzagaray Bulacan or call us at 0906 850 3057</p>
    <p class="w3-center">Email us at luckywingssizzlers@gmail.com</p>
    <p class="w3-center">Message us at <a href="https://www.facebook.com/luckywingssizzlers/" target="Facebook.com">Facebook</a></p>


    
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>All Rights Reserve @luckywingssizzlers</p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-orange", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-orange";
}
document.getElementById("myLink").click();

function logout(){
  Swal.fire({  
  icon: 'warning',
  title: 'Do you want to Log Out this Account?',
  showDenyButton: true,
  confirmButtonText: 'Yes',
  confirmButtonColor: '#E0955Aff',
  denyButtonText: `No`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.href = 'logout.php';
  } 
})
}
</script>
<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($fullUrl, "access=denied") == true){
  echo "<script>			
    Swal.fire({
    icon: 'error',
    title: 'Access Denied!',
    confirmButtonColor: '#E0955Aff',
    text: 'Only the admin can access that page!',
    timer: 5000
  })
  </script>";
  exit();
}
if (strpos($fullUrl, "success=login") == true){
  echo "<script>			
    Swal.fire({
    icon: 'info',
    confirmButtonColor: '#E0955Aff',
    title: 'Welcome, ".$_SESSION['position']." ".ucfirst($_SESSION['username'])."!',
    timer: 5000
  })
  </script>";
  exit();
}

?>
</body>
</html>
