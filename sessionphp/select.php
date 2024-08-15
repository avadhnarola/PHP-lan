<?php
session_start();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    echo $id;
    // header('Location:dashboard.php');

}
else{
    header('Location:login.php');
}
?>