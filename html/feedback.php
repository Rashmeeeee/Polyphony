<?php
include('../login/security.php');

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'adminpanel');

$feedbackMessage = ""; // Initialize the variable to store the feedback message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
    $query = "INSERT INTO feedback (user_id, feedback) VALUES ('$user_id', '$feedback')";
    
    if (mysqli_query($conn, $query)) {
        // Set the thank-you message if feedback is successfully submitted
        $feedbackMessage = "Thank you for your feedback!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyphony - Feedback</title>
    <link rel="stylesheet" href="../css/feedback.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
</head>
<body>
   <header>
        <input type="checkbox" name="" id="chk1">
        <div class="logo"><img src="../img/polyphonyy4.png"></div>
        <div class="search-box">
            <!-- <form action="">
                <input type="text" name="search" id="srch" placeholder="Search">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form> -->
        </div>
        <div class="navigation">
        <ul>
            <li class="active"><a href="../html/index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
           <li><a href="../html/playlist.php"><i class="fa fa-headphones" aria-hidden="true"></i>Playlist</a>
        </li>
            <!-- <li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Your library</a></li> -->
           <li><a href="../html/feedback.php"><i class="fa fa-comments" aria-hidden="true"></i>Feedback</a></li>
           <li><a href="../admin/admin/index.php"><i class="fa fa-user" aria-hidden="true"></i>Admin</a></li>
       
        </ul>
        </div>
        <form action="../login/logout.php" method="POST">
        <button type="submit" name="logout_btn" class="btnLogin">Logout</button>
        </form>
        <div class="menu">
            <label for="chk1">
                <i class="fa fa-bars"></i>
            </label>
        </div>
        
    </header>
 <section class="section-main">
    <section class="section-feedback">
        <h2>We Value Your Feedback</h2>
        <form method="POST" action="">
            <textarea name="feedback" placeholder="Share your thoughts with us..." required></textarea>
            <button type="submit" class="btnFeedback">Submit Feedback</button>
        </form>

        <!-- Thank you message section, displayed after submission -->
        <?php if ($feedbackMessage): ?>
        <div class="thank-you-popup">
            <?php echo $feedbackMessage; ?>
        </div>
        <script>
            // Show the thank-you message after form submission
            document.querySelector('.thank-you-popup').style.display = 'block';
        </script>
        <?php endif; ?>
    </section>
</section>
    

    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle('sticky', window.scrollY > 0);
        });
    </script>
</body>
</html>
