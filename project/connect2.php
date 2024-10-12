<?php
include('../login/security.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM tbl_user1
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        if (password_verify($_POST["pswd"], $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION['status'] = "Login successful";
            header("Location: ../html/index.php");
            exit;
        }
    }
    
    $_SESSION['status'] = "Invalid login";
    header("Location: ../html/login.php");
    exit;
}
?>