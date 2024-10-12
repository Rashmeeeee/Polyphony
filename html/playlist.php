<?php
include('../login/security.php');

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

// Check connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch distinct section names
$query = "SELECT DISTINCT section_name FROM playlists";
$sections_result = mysqli_query($connection, $query);

// Check if the query succeeded
if (!$sections_result) {
    die("Error fetching sections: " . mysqli_error($connection));
}

// Prepare an array to hold section names
$sections = [];
while ($row = mysqli_fetch_assoc($sections_result)) {
    $sections[] = $row['section_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist - Polyphony</title>
        <link rel="stylesheet" href="../css/playlist.css?v=<?php echo time(); ?>">
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
   
        <section class="section-two">
    <div class="playlist-container">
        <?php foreach ($sections as $section_name): ?>
            <div class="section-playlist">
                <h2 class="section-name"><?php echo htmlspecialchars($section_name); ?></h2>
                <div class="playlist-items">
                    <?php
                    // Fetch songs for the current section
                    $song_query = "SELECT * FROM playlists WHERE section_name = '$section_name'";
                    $songs_result = mysqli_query($connection, $song_query);

                    // Check if the song query succeeded
                    if (!$songs_result) {
                        die("Error fetching songs: " . mysqli_error($connection));
                    }
                    ?>
                    
                   <?php while ($song = mysqli_fetch_assoc($songs_result)): ?>
    <div class="playlist-item">
        <img src="../uploads/images/<?php echo htmlspecialchars($song['image_name']); ?>" alt="Cover Image">
        <div class="playlist-info">
            <h3><?php echo htmlspecialchars($song['title']); ?></h3>
            <p><?php echo htmlspecialchars($song['description']); ?></p>
            <a href="play_music.php?title=<?php echo urlencode($song['title']); ?>&description=<?php echo urlencode($song['description']); ?>&image=<?php echo urlencode($song['image_name']); ?>&audio=<?php echo urlencode($song['audio_name']); ?>" class="play-button" target="_blank">Play</a>
        </div>
    </div>
<?php endwhile; ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
    
</section>

    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle('sticky', window.scrollY > 0);
        });
    </script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($connection);
?>
