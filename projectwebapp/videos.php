<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mindful_pathway";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch video data from the database
$sql = "SELECT title, url FROM videos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindful Pathways - Videos</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #edf2f7;
            color: #2d3748;
            margin: 0;
            padding: 0;
        }
        #mainwrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #81e6d9;
            padding: 20px 0;
            font-size: 32px;
            color: #2d3748;
            text-align: center;
            font-weight: bold;
            border-bottom: 5px solid #319795;
            position: relative;
        }
        h2 {
            font-size: 24px;
            color: #2c5282;
            margin-bottom: 20px;
        }
        .home-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #2c5282;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .home-button:hover {
            background-color: #319795;
        }
        .video-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .video-item {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .video-item:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .video-thumbnail iframe {
            width: 100%;
            height: 250px;
            border: none;
        }
        .video-title {
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #319795;
            text-align: center;
            transition: color 0.3s ease;
        }
        .video-title:hover {
            color: #2c5282;
        }
        footer {
            background-color: #e6fffa;
            padding: 15px;
            margin-top: 40px;
            text-align: center;
            color: #2c5282;
            font-size: 14px;
            border-top: 3px solid #319795;
        }
    </style>
</head>
<body>

<div id="mainwrapper">
    <header>
        🎥 Mindful Pathways Video Collection 🎥
        <a href="mindful_pathwayy.php" class="home-button">Home</a>
    </header>

    <h2>Curated Videos for Relaxation, Mindfulness & Focus</h2>

    <div class="video-gallery">
        <?php
        if ($result->num_rows > 0) {
            // Display each video
            while ($row = $result->fetch_assoc()) {
                echo '<div class="video-item">';
                echo '  <div class="video-thumbnail">';
                echo '    <iframe src="' . htmlspecialchars($row["url"]) . '" allowfullscreen></iframe>';
                echo '  </div>';
                echo '  <div class="video-title">' . htmlspecialchars($row["title"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No videos available.</p>";
        }
        $conn->close();
        ?>
    </div>

    <footer>
        Mindful Pathway © 2024 | Discover calmness and balance through these curated videos.
    </footer>
</div>

</body>
</html>
