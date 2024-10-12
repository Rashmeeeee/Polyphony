<?php
// Get song details from the URL parameters
$title = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'Unknown Title';
$description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : 'No description available.';
$image = isset($_GET['image']) ? htmlspecialchars($_GET['image']) : 'default.png';
$audio = isset($_GET['audio']) ? htmlspecialchars($_GET['audio']) : '';
?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #001018;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.player-container {
    background: #002233;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    border-radius: 10px;
    max-width: 400px;
    width: 100%;
}

.player-image img {
    width: 100%;
    max-width: 300px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.player-details h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #ffffff;
}

.player-details p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #cccccc;
}

audio {
    width: 100%;
    max-width: 300px;
    margin-bottom: 20px;
}

/* Button Styling */
.button-container {
    margin-top: 20px;
}

.return-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #004466;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.return-button:hover {
    background-color: #003355;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Playing - <?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/play.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="player-container">
        <div class="player-image">
            <img src="../uploads/images/<?php echo $image; ?>" alt="Cover Image">
        </div>
        <div class="player-details">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $description; ?></p>
            <audio controls autoplay>
                <source src="../uploads/audio/<?php echo $audio; ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        <div class="button-container">
            <a href="playlist.php" class="return-button">Return to Playlist</a>
        </div>
    </div>
</body>
</html>
