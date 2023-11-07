<?php
    include 'connect.php';
    include 'session.php';
    if (isset($_POST['updatedata'])) {
        $id = $_POST['id'];
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
                        $sql = "UPDATE `menu` SET `product_name`='$menuname',`picture`='$filenamenew',`stock_num`='$stock' WHERE `id`='$id'";
                        $result = mysqli_query($con, $sql);
                        header("Location: setting.php?updated");
                        
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
                $sql = "UPDATE `menu` SET `product_name`='$menuname',`stock_num`='$stock' WHERE `id`='$id'";
                $result = mysqli_query($con, $sql);
                header("Location: setting.php?updated");
            }
        }
        else{
            header("Location: setting.php?menu=exist");
        }





        

    }

    if(isset($_POST['updateaccount'])) {
        $id = $_POST['id'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $countsql = "SELECT username FROM login WHERE username = '$name'";
        $querry = mysqli_query($con, $countsql);
        $count = mysqli_num_rows($querry);
        if($count == 0){
            $sql = "UPDATE `login` SET `username`='$name',`password`='$password' WHERE `id`='$id'";
            $result = mysqli_query($con, $sql);
            header("Location: accounts.php?updated");
        }
        else{
            header("Location: accounts.php?user=exist");
        }

        
    }

    if(isset($_POST['updateadmin'])) {
        $id = $_POST['id'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $password;
        
        $sql = "UPDATE `login` SET `username`='$name',`password`='$password' WHERE `id`='$id'";
        $result = mysqli_query($con, $sql);
        header("Location: accounts.php?updated");
    }
?>