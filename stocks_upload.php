<?php
include 'connect.php';
if (isset($_POST['submit'])) 
    {
        $file = $_FILES['image'];
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $fileerror = $_FILES['image']['error'];
        $filetype = $_FILES['image']['type'];

        $fileext = explode('.', $filename);
        $fileactext = strtolower(end($fileext));
        
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        
        if (in_array($fileactext, $allowed)){
            if ($fileerror == 0){
                if ($filesize < 500000){
                    $filenamenew = uniqid('', true) . '.' . $fileactext;
                    $filedest = 'menu/' . $filenamenew;
                    move_uploaded_file($filetmp, $filedest);
                    $name = $_POST['name'];
                    $category = $_POST['category'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    date_default_timezone_set("Asia/Manila");
                    $date = date("Y-m-d h:i:sa");
                    $sql = "INSERT INTO stocks (item_name, category, description, price, date, picture) VALUES ('$name', '$category','$description', $price, '$date','$filenamenew');"; 
                    $result = mysqli_query($con, $sql);
                    header("Location: stocks.php?SUCCESS");
                }
                else{
                    echo "File Size is to big!";
                }
                
            }
            else{
                echo "Error!";
            }
        }
        else
        {
            echo 'The File is Not Allowed!';
        }
    }


        
        
?>  