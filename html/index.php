<?php
include('../login/security.php');

if (isset($_SESSION["user_id"])) {
    // User is logged in, display content for authenticated users
    $user_id = $_SESSION["user_id"];
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polyphony</title>
<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">   
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
            <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
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
        <h1>MUSIC IS A THERAPY</h1>
    </section>
    <section class="section-two">
        <h2>About Music</h2>
        <p>Music is considered to be a universal language of humans. It creates an aura of positivity and brings entertainment in human life. 
            Music is loved by everyone because it has the power to change the mood and add a sense of relief to the lives of people. One can gain answers to unsolved questions in the mind via music.
           Music makes people loving and loyal because it stays with them  till the end of their lives.
           </p>
           <p> It never leaves people alone in their harsh phases of life. Music helps people express themselves in a better way. It has various impacts on the lives of people. 
           One has various emotions attached to many songs because music helps us to relate to everyone and everything around us. Music can bring people together on different occasions.
           Music is an excellent source of communication.</p>
        <h2>MUSIC Therapy</h2>
        <p>Music therapy is a therapeutic approach that uses the naturally mood-lifting properties of music to help people improve their mental health and overall well-being.
              It’s a goal-oriented intervention that may involve:</p>
              <ul>
              <li> Making music</li>
              <li> Writing songs</li>
               <li> Singing</li>
               <li> Dancing</li>
               <li> Listening to music</li>
               <li> Discussing music </li> 
               </ul>
               <p>This form of treatment may be helpful for people with depression and anxiety, and it may help improve the quality of life 
                for people with physical health problems.And anyone can engage in music therapy; 
                you don’t need a background in music to experience its beneficial effects.</p>

    </section>
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle('sticky', window.scrollY > 0);
        });
    </script>
</body>
</html>
