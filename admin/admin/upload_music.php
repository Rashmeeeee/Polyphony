<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

// Check connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['upload'])) {
    // Get user inputs and sanitize
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $section_name = mysqli_real_escape_string($connection, $_POST['section_name']); // Get section name from form

    // Define the target directories
    $target_dir_img = $_SERVER['DOCUMENT_ROOT'] . "/Mywebsite/uploads/images/";
    $target_dir_audio = $_SERVER['DOCUMENT_ROOT'] . "/Mywebsite/uploads/audio/";

    // Move uploaded image to target directory
    $image_path = $target_dir_img . basename($_FILES["image"]["name"]);
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
        echo "Error uploading image.";
        exit; // Stop execution if the image fails to upload
    }

    // Move uploaded audio file to target directory
    $file_path = $target_dir_audio . basename($_FILES["file"]["name"]);
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
        echo "Error uploading audio file.";
        exit; // Stop execution if the audio fails to upload
    }

    // Insert into database, including section_name
    $query = "INSERT INTO playlists (title, description, image_name, audio_name, section_name) 
              VALUES ('$title', '$description', '" . basename($_FILES["image"]["name"]) . "', '" . basename($_FILES["file"]["name"]) . "', '$section_name')";

    if (mysqli_query($connection, $query)) {
        echo "File uploaded successfully!";
        // Optionally redirect to playlist.php here or display a success message
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!-- Form for uploading music -->
<form action="upload_music.php" method="POST" enctype="multipart/form-data">
    <label for="title">Song Title:</label>
    <input type="text" name="title" required><br>

    <label for="description">Description:</label>
    <input type="text" name="description" required><br>

    <label for="section_name">Section Name:</label>
    <input type="text" name="section_name" required placeholder="e.g. Pop, Rock"><br>

    <label for="image">Cover Image:</label>
    <input type="file" name="image" accept=".png, .jpg, .jpeg" required><br>

    <label for="file">Audio File:</label>
    <input type="file" name="file" accept=".mp3, .mp4" required><br>

    <button type="submit" name="upload">Upload Music</button>
</form>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
