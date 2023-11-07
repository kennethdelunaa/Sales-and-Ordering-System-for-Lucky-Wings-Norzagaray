<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <title>Lucky Wings</title>
</head>

<body>

    <nav style="background: rgb(255,176,113);
    background: linear-gradient(145deg, rgba(255,176,113,1) 30%, 
    rgba(233,137,61,1) 100%);"class="navbar navbar-expand-lg navbar-light fixed-top">
        
        <div class="container">
          <a class="navbar-brand" href="#"><img style="height: 70px; width: 150px; "src="image1.png" alt="" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
            <ul class="navbar-nav">
             

              <li class="nav-item dropdown ms-3">
                <a style="color: white;" class="nav-link dropdown-toggle pt-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  SETTINGS
                </a>
                <ul style="border:none; background-color: #E9893D;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a style="color: white;"class="dropdown-item" href="#"><i class="fas fa-user pe-2"></i>My Account</a></li>
                    <li><a style="color: white;"class="dropdown-item" href="#"><i class="fas fa-cogs pe-2"></i>System Update</a></li>
                    <li><a style="color: white;"class="dropdown-item" href="#"><i class="fas fa-sign-out-alt pe-2"></i>Log Out</a></li>
                </ul>
              </li>
              
              <li class="nav-item">
                <a style="color: white; margin-left: 5rem;" class=" nav-link" href="#"><i class="fas fa-shopping-cart fa-2x"></i></a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
<div class="container-fluid ms-2 ">
    <div class="row" >
        <form action="" method="post">
        <div style="margin-top: 110px; border: 1px solid black; border-radius: 10px; width: 400px; height: 532px; " class="col-md-6 p-3">
            <h5>Order details:</h5>
            <div style="height: 430px; "  class="container">
               <textarea name="order" >ORDER HERE!</textarea>
            </div>
            <div class="d-grid d-md-flex justify-content-md-end">
            <button style=" width: 100%; height: 50px; background-color: red; color: white;" class="btn" type="button">Add to Cart</button>
            </div>
        </form>
    </div>
        <div style="width: 900px;" class="col-md-6">
      <section style="margin-top: 110px; margin-bottom: 10px;">
        <div class="container" style="padding-bottom: 5%">
            <button type="button" class="btn btn-primary" style="width:15%; height:45px">WINGS</button>
            <button type="button" class="btn btn-secondary" style="width:15%; height:45px">SIZZLING</button>
        </div>
            <script type="text/javascript">
        var data; 
        document.getElementById("root1").innerText=data;

         function increment1(){
            data++;
            document.getElementById("root1").innerText=data;
            order ="KOREAN SOY WINGS: " + data;
            document.getElementById("order").innerText=order;
        }

        function decrement1()
        {
           document.getElementById("root1").innerText=data;
            data--;
            order +="KOREAN SOY WINGS: " - data;
            if (data > 0 ) 
           {
                  order += "KOREAN SOY WINGS: " +  (data-data);
                 document.getElementById("order").innerText = order;  
             }  
             else
             {
                 order="";
               document.getElementById("order1").innerText=order;   
     }
        }
      
    </script>
          <div class="container" >
              <div class="row">

                <!-- KOREAN SOY WINGS -->
                  <div style="border: 1px black solid; border-radius: 10px;" class="col me-3 mb-3 p-2 text-center"><img style="height: 160px; width: 250px; border-radius: 10px; margin-bottom: 5px;"src="koreansoy.jpg"></img><h5 style="margin-top: 5px;">KOREAN SOY WINGS</h5>
                    <div class="d-grid gap-2 d-md-block">
                    <button onclick="decrement1()" style="width: 70px; background-color: red; color: white; "class="btn text-center">-</button>

                    <h2 id="root1" class="btm text-center"  style="background-color:  blue;width: 50px; border: none; text-align: center;">0</h2>

                    <button onclick="increment1()" style="width: 70px; background-color: green; color: white" class="btn">+</button>
                  </div>
                </div>
    <script type="text/javascript">
        var data=0; 
        document.getElementById("root2").innerText=data;
        function decrement2()
        {
            data--;
            document.getElementById("root2").innerText=data;
            order="";
            if (data>0) 
            {
                order="Buttered Wings: " +  (data-data);
                document.getElementById("order2").innerText=order;  
            }  
            else
            {
                order="";
                document.getElementById("order2").innerText=order;   
            }
        }
        function increment2(){
            data++;
            document.getElementById("root2").innerText=data;
            order ="SALTED EGG WINGS " + data;
            document.getElementById("order2").innerText=order;
        }
    </script>

                <!-- SALTED EGG WINGS -->
                <div style="border: 1px black solid; border-radius: 10px;" class="col me-3 mb-3 p-2 text-center"><img style="height: 160px; width: 250px; border-radius: 10px; margin-bottom: 5px;"src="saltedegg.jpg"></img><h5 style="margin-top: 5px;">SALTED EGG WINGS</h5>
                    <div class="d-grid gap-2 d-md-block">
                    <button onclick="decrement2()" style="width: 70px; background-color: red; color: white;" class="btn">-</button>
                    <h2 id="root2" class="btm text-center"  style="width: 50px; border: none;">0</h2>
                    <button onclick="increment2()" style="width: 70px; background-color: green; color: white" class="btn">+</button>
                  </div>
                </div>
     <script type="text/javascript">
        var data=0; 
        document.getElementById("root3").innerText=data;
        function decrement3()
        {
            data--;
            document.getElementById("root3").innerText=data;
            order="";
            if (data>0) 
            {
                order="SWEET CHILI WINGS " +  (data-data);
                document.getElementById("order3").innerText=order;  
            }  
            else
            {
                order="";
                document.getElementById("order3").innerText=order;   
            }
        }
        function increment3(){
            data++;
            document.getElementById("root3").innerText=data;
            order ="SWEET CHILI WINGS: " + data;
            document.getElementById("order3").innerText=order;
        }
        data=0;
    </script>
                <!-- SWEET CHILI WINGS -->
                <div style="border: 1px black solid; border-radius: 10px;" class="col me-3 mb-3 p-2 text-center"><img style="height: 160px; width: 250px; border-radius: 10px; margin-bottom: 5px;"src="sweetchili.jpg"></img><h5 style="margin-top: 5px;">SWEET CHILI WINGS</h5>
                    <div class="d-grid gap-2 d-md-block">
                    <button onclick="decrement3()" style="width: 70px; background-color: red; color: white;" class="btn">-</button>
                    <h2 id="root3" class="btm text-center"  style="width: 50px; border: none;">0</h2>
                    <button onclick="increment3()" style="width: 70px; background-color: green; color: white" class="btn">+</button>
            
                  </div>
                </div>
    <script type="text/javascript">
        var data=0; 
        document.getElementById("root4").innerText=data;
        function decrement4()
        {
            data--;
            document.getElementById("root4").innerText=data;
            order="";
            if (data>0) 
            {
                order="BUTTERED WINGS:  " +  (data-data);
                document.getElementById("order4").innerText=order;  
            }  
            else
            {
                order="";
                document.getElementById("order4").innerText=order;   
            }
        }
        function increment4(){
            data++;
            document.getElementById("root4").innerText=data;
            order ="BUTTERED WINGS: " + data;
            document.getElementById("order4").innerText=order;
        }
        data=0;
    </script>
                <!-- BUTTERED WINGS -->
                <div style="border: 1px black solid; border-radius: 10px;" class="col me-3 mb-3 p-2 text-center"><img style="height: 160px; width: 250px; border-radius: 10px; margin-bottom: 5px;"src="butteredwings.jpg"></img><h5 style="margin-top: 5px;">BUTTERED WINGS</h5>
                    <div class="d-grid gap-2 d-md-block">
                   <button onclick="decrement4()" id="dec4" style="width: 70px; background-color: red; color: white;"
                     class="btn">-</button>
                    <h2 id="root4" class="btm text-center" style="width: 50px; border: none;">0</h2>
                    <button onclick="increment4()" style="width: 70px; background-color: green; color: white" class="btn">+</button>
                    
                  </div>
                </div>

    <script type="text/javascript">
        var data=0; 
        document.getElementById("root5").innerText=data;
        function decrement5()
        {
            data--;
            document.getElementById("root5").innerText=data;
            order="";
            if (data>0) 
            {
                order="Buttered Wings: " +  (data-data);
                document.getElementById("order5").innerText=order;  
            }  
            else
            {
                order="";
                document.getElementById("order5").innerText=order;   
            }
        }
        function increment5(){
            data++
            document.getElementById("root5").innerText=data;
            order ="HONEY MUSTARD WINGS: " + data;
            document.getElementById("order5").innerText=order;
        }
        data=0;
    </script>
            <!-- HONEY MUSTARD WINGS -->
                <div style="border: 1px black solid; border-radius: 10px;" class="col me-3 mb-3 p-2 text-center"><img style="height: 160px; width: 250px; border-radius: 10px; margin-bottom: 5px;"src="honeymustard.jpg"></img><h5 style="margin-top: 5px;">HONEY MUSTARD WINGS</h5>
                    <div class="d-grid gap-2 d-md-block">
                    <button onclick="decrement5()"  id="dec5" style="width: 70px; background-color: red; color: white;" class="btn">-</button>
                    <h2 id="root5" class="btm text-center" style="width: 50px; border: none;">0</h2><br>
                    <button onclick="increment5()" id= "increment5"style="width: 70px; background-color: green; color: white" class="btn">+</button>
                  </div>
                </div>

          </div>
      </section>
    </div>


    </div>
    </div>
</body>
</html>