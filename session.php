<?php 
session_start();
$uName = $_SESSION['username'];
if ($_SESSION["status"] != true)
{
    header("Location:index.php?notlogedin");
}
?>