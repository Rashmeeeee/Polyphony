<?php
include('security.php');

$connection = mysqli_connect("localhost","root","","adminpanel");
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register1 WHERE email='$email_login' AND password='$password_login'LIMIT 1 ";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);


    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else{
        
        $_SESSION['status'] = 'email id or password is Invalid';
        header('Location: login.php'); 
    }
}




?>