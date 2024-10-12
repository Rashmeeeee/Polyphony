<?php
session_start(); // Ensure session is started before using $_SESSION
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
</head>
<body>

<!-- Session alert section -->
<header class="alert">
<?php
    if(isset($_SESSION['status'])) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION['status']); // Unset after displaying the message
    }
?>
</header>

<!-- Main login and signup section -->
<div class="container" id="main">
    <div class="sign-up">
        <form action="../project/connect.php" method="post">
            <h1>Create Account</h1>
            <input type="text" name="name" placeholder="name" id="text" required>
            <input type="email" name="email" placeholder="email" id="name" required>
            <input type="password" name="password" placeholder="password" id="password" required>
            <input type="password" name="retype_password" placeholder="retype_password" id="retype-password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <div class="sign-in">
        <form action="../project/connect2.php" method="post">
            <h1>Sign In</h1>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="pswd" placeholder="password" required>
            <a href="#">Forget your password?</a>
            <button type="submit" name="login_btn1">Sign In</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-left">
                <h1>Welcome Back</h1>
                <p>To keep connected with us, please login with your personal info</p>
                <button onclick="removePanel()" id="signin">Sign In</button>
            </div>
            <div class="overlay-right">
                <h1>Hello!!</h1>
                <p>Music is the best solution for any problem.</p>
                <button onclick="addPanel()" id="signup">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and custom script for toggling panels -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function addPanel() {
        let showlogin = document.getElementById("main");
        showlogin.classList.add("right-panel-active");  
    }
    function removePanel() {
        let main1 = document.getElementById("main");
        main1.classList.remove("right-panel-active");
    }
</script>
    
</body>
</html>
