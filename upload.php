<?php
    include 'connect.php';
    if (isset($_POST['submit'])) {
        $menuname = $_POST['menu_name'];
        $stock = $_POST['stock'];
        $file = $_FILES['image'];
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $fileerror = $_FILES['image']['error'];
        $filetype = $_FILES['image']['type'];

        $fileext = explode('.', $filename);
        $fileactext = strtolower(end($fileext));
        
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        $countsqlmenu = "SELECT product_name FROM menu WHERE product_name = '$menuname'";
        $querrymenu = mysqli_query($con, $countsqlmenu);
        $countmenu = mysqli_num_rows($querrymenu);
        if($countmenu == 0){
            if (in_array($fileactext, $allowed)){
                if ($fileerror == 0){
                    if ($filesize < 700000){
                        $filenamenew = uniqid('', true) . '.' . $fileactext;
                        $filedest = 'menu/' . $filenamenew;
                        move_uploaded_file($filetmp, $filedest);
                        $sql = "INSERT INTO menu (product_name, picture, stock_num) VALUES ('$menuname', '$filenamenew', '$stock');"; 
                        $result = mysqli_query($con, $sql);
                        header("Location: setting.php?added");
                        
                    }
                    else{
                        echo "File Size is to big!";
                    }
                    
                }
                else{
                    echo "Error!";
                }
            }
            else{
                echo 'The File is Not Allowed!';
            }
        }
        else{
            header("Location: setting.php?menu=exist");
        }
            

    }

    if (isset($_POST['addaccount'])){
        $username = $_POST['username'];
        $position = $_POST['position'];
        $password = $_POST['password'];
        
        $countsql = "SELECT username FROM login WHERE username = '$username'";
        $querry = mysqli_query($con, $countsql);
        $count = mysqli_num_rows($querry);
        if($count == 0){
            $sql = "INSERT INTO `login` (`username`, `position`, `password`) VALUES ('$username', '$position', '$password')";
            $result = mysqli_query($con, $sql);
            header("Location: accounts.php?added");
        }
        else{
            header("Location: accounts.php?user=exist");
        }
    }
?>  