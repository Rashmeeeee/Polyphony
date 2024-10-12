
<?php 

session_start();

if(empty($_POST["name"])){
    // die("Name is required");
    $_SESSION['status']="Name is required";
    header("location:../html/login.php");
    exit;
}
if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    // die("Valid email is required");
    $_SESSION['status']="Valid email is required";
    header("location:../html/login.php");
    exit;
}

if (strlen($_POST["password"]) < 8) {
    // die("Password must be at least 8 characters");
    $_SESSION['status']="Password must be at least 8 characters";
    header("location:../html/login.php");
    exit;
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    // die("Password must contain at least one letter");
    $_SESSION['status']="Password must contain at least one letter";
    header("location:../html/login.php");
    exit;
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    // die("Password must contain at least one number");
    $_SESSION['status']="Password must contain at least one number";
    header("location:../html/login.php");
    exit;
}
if ($_POST["password"] !== $_POST["retype_password"]) {
    // die("Passwords must match");
    $_SESSION['status']="Password must match";
    header("location:../html/login.php");
    exit;
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO tbl_user1 (name, email, password)
       VALUES (?, ?, ?)";
$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);


try {
    if ($stmt->execute()) {
        $_SESSION['status'] = "Congratulation!! Signup successful";
        header("location:../html/login.php");
        exit;
    } else {
        $_SESSION['status'] = "An error occurred: " . $stmt->error;
        header("location:../html/login.php");
        exit;
    }
 } catch (mysqli_sql_exception $exception) {
     $_SESSION['status'] = "Email is already taken";
     header("location:../html/login.php");
     exit;
 }
?>

    

// print_r($_POST);
// var_dump($password_hash);

