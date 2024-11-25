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

// Fetch strategies from the database
$sql = "SELECT icon, title, description FROM coping_strategies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coping Strategies</title>
    <style>
        /* Add your existing CSS styling here */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6f7;
            margin: 0;
            padding: 0;
        }
        #mainwrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #007B7F;
            color: white;
            text-align: center;
            padding: 30px 0;
            font-size: 24px;
            letter-spacing: 2px;
            position: relative;
        }
        .home-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #007B7F;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .home-button:hover {
            background-color: #005f63;
            transform: scale(1.05);
        }
        #banner {
            text-align: center;
            margin: 20px 0;
        }
        #content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .strategy-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1 1 calc(33.333% - 40px);
            margin: 10px;
            text-align: center;
            transition: transform 0.3s;
        }
        .strategy-card:hover {
            transform: scale(1.05);
        }
        .strategy-card h2 {
            color: #007B7F;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .strategy-card p {
            color: #444;
            font-size: 16px;
        }
        .tip-icon {
            font-size: 50px;
            color: #ff6b81;
            margin-bottom: 10px;
        }
        footer {
            background-color: #007B7F;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
        footer p {
            margin: 0;
        }
        @media (max-width: 768px) {
            .strategy-card {
                flex: 1 1 calc(50% - 20px);
            }
        }
        @media (max-width: 500px) {
            .strategy-card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

<div id="mainwrapper">
    <!-- Header with Home Button -->
    <header>
        <a href="mindful_pathwayy.php" class="home-button" title="Home">Home</a>
        Coping Strategies for Mental Well-being
    </header>

    <!-- Content Section -->
    <section id="content">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="strategy-card">
                    <div class="tip-icon"><?php echo htmlspecialchars($row['icon']); ?></div>
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No coping strategies available at the moment.</p>
        <?php endif; ?>
    </section>

    <!-- Footer -->
    <footer>
        <p>Mindful Pathway © 2024. All Rights Reserved.</p>
    </footer>
</div>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
