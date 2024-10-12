<?php
include('../login/security.php');

$connection = mysqli_connect("localhost", "root", "", "adminpanel");

    $email_query = "SELECT * FROM tbl_user1 WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register1.php');  
    }


if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    

    $query = "UPDATE tbl_user1 SET name='$username',email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
       $_SESSION['success'] = "Your Data is Updated";
       header('Location:register1.php');
    }
    else{
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location:register1.php');
     }
    }
if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM tbl_user1 WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location:register1.php');
    }
    else{
        $_SESSION['status'] = "Your Data is not DELETED";
        header('Location:register1.php');
    }
}


// if(isset($_POST['login_btn']))
// {
//     $email_login = $_POST['email'];
//     $password_login = $_POST['password'];

//     $query = "SELECT * FROM tbl_user1 WHERE email='$email_login' AND password='$password_login'LIMIT 1 ";
//     $query_run = mysqli_query($connection, $query);


// if(mysqli_fetch_array($query_run))
// {
//     $_SESSION['username'] = $email_login;
//     header('Location: index.php');
// }
// else{
    
//     $_SESSION['status'] = 'email id or password is Invalid';
//     header('Location: login.php'); 
// }
// }
if(isset($_POST['delete_feedback_btn'])) {
    $id = $_POST['delete_id'];

    // Delete query
    $query = "DELETE FROM feedback WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        $_SESSION['success'] = "Feedback deleted successfully.";
        header('Location: view_feedback.php');
    } else {
        $_SESSION['status'] = "Feedback deletion failed.";
        header('Location: view_feedback.php');
    }
}



 ?>