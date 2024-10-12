<?php
session_start();

if(!$_SESSION['user_id']){
    header('Location: ../html/login.php');
}
?>