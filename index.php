<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="js/bootstrap.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="javaScript.js"></script>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body style="background-color: #ffeee0;">
  <div class="container mt-5 pt-5 px-5 position-relative">
    <div class="container-fluid mt-5 pt-5 px-5 position-relative" style=" width: 50%;">
      <form class="m-3 p-3 rounded shadow-lg position-relative" method="post" style="background-color: #FA8334; font-family: 'Poppins', sans-serif;">
        <img class="d-block mx-auto" src="logo.png" style="width: 80px; height: 80px; filter: invert(100%);" alt="logo"><h3 class="mb-4" style="color: white;" >Log In</h3>
        
        <div class="mb-4">
          <label for="exampleInputEmail1" class="form-label" style="color: White;">Username</label>
          <input type="text" class="form-control" name="username" id="username" >
        </div>
        
        <div class="mb-1">
          <div class="row">
            <label for="exampleInputEmail1" class="form-label col-4 mr-3" style="color: White;">Position:</label>
            <div class="btn-group col-7" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="btnradio" value="Admin" id="btnradio1" autocomplete="off" checked>
              <label class="btn btn-outline-light" for="btnradio1">Admin</label>

              <input type="radio" class="btn-check" name="btnradio" value="Cashier" id="btnradio2" autocomplete="off">
              <label class="btn btn-outline-light" for="btnradio2">Cashier</label>
            </div>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" style="color: White;">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>

        
        <button type="submit" class="btn btn-dark"  name="login">Log In</button>
      </form>
    </div>
  </div>



</body>
</html>
<?php 
///////////////////////LOGIN

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($fullUrl, "notlogedin") == true){
  echo "<script>			
    Swal.fire({
    icon: 'error',
    title: 'Session Ended!',
    text: 'Log in first to access the page!',
    timer: 5000
  })
  </script>";
  header('Location: index.php?');
  exit();
}

if (isset($_POST["login"])) {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $position = $_POST['btnradio'];
  if (empty($username)) 
  {
    echo "
    <script>			
    Swal.fire({
    icon: 'error',
    title: 'Username is Empty!',
    text: '',
    timer: 5000
    })
    </script>";
  }
  else if (empty($password))
  {
    echo "
    <script>			
    Swal.fire({
    icon: 'error',
    title: 'Password is Empty!',
    text: '',
    timer: 5000
    })
    </script>";
  }
  
  else if (empty($position))
  {
    echo "
    <script>			
    Swal.fire({
    icon: 'error',
    title: 'Please Select Your Position',
    text: '',
    timer: 5000
    })
    </script>";
  }

  else 
  {
    $sql = "SELECT * FROM `login`";
    $result = $con->query($sql);
    $_SESSION["status"]=false;
    if ($result-> num_rows > 0){    

      while ($row = $result-> fetch_assoc()){

        if(($row['username'] == $username) && ($row['position'] == $position) && ($row['password'] == $password)){
          $_SESSION["status"] = true;
          $_SESSION["id"] = $row['id'];
          $_SESSION["username"] = $username;
          $_SESSION["position"] = $position;
          $_SESSION["password"] = $password;
          header('Location: startup.php?success=login');
        }
        else{
          echo "
          <script>			
          Swal.fire({
          icon: 'error',
          title: 'Invalid!',
          text: '',
          timer: 5000
          })
          </script>";  
        }
      }
    }
    
  }   
}?>