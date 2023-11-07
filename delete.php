<?php
include 'connect.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM menu WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    header("Location: setting.php?deleted");


}

if (isset($_POST['deleteaccount'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM login WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    header("Location: accounts.php?deleted");


}

?>