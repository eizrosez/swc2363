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

// Fetch songs from the database
$sql = "SELECT * FROM songs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindful Pathways - Song Playlist</title>
    <style>
        /* CSS for layout */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #f0f4f7;
            color: #333;
        }
        header {
            background-color: #007B7F;
            color: white;
            padding: 1.5rem 0;
            text-align: center;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin: 0 1rem;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 25px;
        }
        .playlist-item {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background-color 0.3s ease;
        }
        .playlist-item:hover {
            background-color: #e6fffa;
        }
        .playlist-item img {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
        }
        .song-details {
            flex: 1;
            margin-left: 20px;
            text-align: left;
        }
        .song-title {
            font-size: 18px;
            font-weight: bold;
            color: #319795;
        }
        .artist {
            font-size: 16px;
            color: #718096;
        }
        .play-button {
            background-color: #38b2ac;
            border: none;
            border-radius: 50%;
            padding: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .play-button:hover {
            background-color: #319795;
        }
        .play-button img {
            width: 24px;
            height: 24px;
        }
        footer {
            background-color: #e6fffa;
            padding: 15px;
            margin-top: 40px;
            text-align: center;
            color: #2c5282;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div id="mainwrapper">
    <header>
        🌿 Mindful Music Playlist 🌿
        <nav>
            <ul>
                <li><a href="mindful_pathwayy.php" title="Home">Home</a></li>
                <li><a href="about_us.php" title="About Us">About Us</a></li>
                <li><a href="self_assessment.php" title="Self-Assessment">Self - Assessment</a></li>
                <li><a href="coping_strategies.php" title="Coping Strategies">Coping Strategies</a></li>
                <li><a href="videos.php" title="Videos">Videos</a></li>
            </ul>
        </nav>
    </header>

    <h2>Curated Music for Relaxation & Focus</h2>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="playlist-item">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Album Cover">
                <div class="song-details">
                    <div class="song-title"><?php echo htmlspecialchars($row['title']); ?></div>
                    <div class="artist">By <?php echo htmlspecialchars($row['artist']); ?></div>
                </div>
                <button class="play-button" onclick="togglePlay('song<?php echo $row['id']; ?>')">
                    <img id="playPauseIcon<?php echo $row['id']; ?>" src="https://img.icons8.com/ios-filled/50/ffffff/play.png" alt="Play">
                </button>
                <audio id="song<?php echo $row['id']; ?>" src="<?php echo htmlspecialchars($row['audio']); ?>"></audio>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No songs available in the playlist.</p>
    <?php endif; ?>

    <footer>
        Mindful Pathway © 2024 | Playlists for your peace and mental well-being.
    </footer>
</div>

<script>
    function togglePlay(songId) {
        var audio = document.getElementById(songId);
        var icon = document.getElementById('playPauseIcon' + songId.replace('song', ''));

        if (audio.paused) {
            // Play selected audio and pause all others
            document.querySelectorAll('audio').forEach((aud) => {
                aud.pause();
                document.getElementById('playPauseIcon' + aud.id.replace('song', '')).src = "https://img.icons8.com/ios-filled/50/ffffff/play.png";
            });

            audio.play();
            icon.src = "https://img.icons8.com/ios-filled/50/ffffff/pause.png";

            // Revert to play icon when audio ends
            audio.onended = () => {
                icon.src = "https://img.icons8.com/ios-filled/50/ffffff/play.png";
            };
        } else {
            // Pause current audio and revert icon
            audio.pause();
            icon.src = "https://img.icons8.com/ios-filled/50/ffffff/play.png";
        }
    }
</script>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
