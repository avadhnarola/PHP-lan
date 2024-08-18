<?php 

        include_once 'db.php';
        include_once 'index.php';

        session_start();
        if(!isset($_SESSION['id'])){
            header('location:login.php');
        }

        $cur_user = $_SESSION['email'];
        // echo $cur_user; 
        $data ="select * from contact where ";
?>
