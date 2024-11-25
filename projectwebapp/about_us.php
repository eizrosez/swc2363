<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "mindful_pathway"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Fetch any dynamic content from the database
// Example: $result = $conn->query("SELECT * FROM about_us_content");
// You can customize this to dynamically fetch or update the About Us content if desired

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Mindful Pathways</title>
    <style>
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

        header h1 {
            margin: 0;
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
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 2rem;
        }

        .about-us {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .about-us h2 {
            color: #007B7F;
        }

        .about-us h3 {
            margin-top: 1.5rem;
            color: #005B5B;
        }

        .about-us ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .about-us ul li {
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #007B7F;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>🌿 Mindful Pathways 🌿</h1>
        <nav>
            <ul>
                <li><a href="mindful_pathwayy.php" title="Home">Home</a></li>
                <li><a href="about_us.php" title="About Us">About Us</a></li>
                <li><a href="self_assessment.php" title="Self-Assessment">Self - Assessment</a></li>
                <li><a href="coping_strategies.php" title="Coping Strategies">Coping Strategies</a></li>
                <li><a href="playlist.php" title="Song Playlist">Song Playlist</a></li>
                <li><a href="videos.php" title="Videos">Videos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="about-us">
            <h2>About Us</h2>
            <p>
                Welcome to Mindful Pathways! We are dedicated to promoting mental health and well-being 
                among students of all ages. Our mission is to provide comprehensive resources, support, 
                and education about mental health issues affecting students in schools and universities.
            </p>
            <p>
                Our platform was founded by a diverse team of educators, mental health professionals, and 
                students who are passionate about creating a supportive environment. We believe that 
                understanding mental health is crucial for academic success and personal growth.
            </p>
            <p>
                At Mindful Pathways, we aim to break the stigma surrounding mental health by fostering 
                open conversations and providing accessible resources. We encourage students to explore 
                their mental health through self-assessment tools, coping strategies, and peer support.
            </p>
            <h3>Our Core Values</h3>
            <ul>
                <li><strong>Empathy:</strong> We strive to understand and listen to the struggles of others.</li>
                <li><strong>Education:</strong> We empower individuals through knowledge and resources.</li>
                <li><strong>Support:</strong> We create a community where help is always available.</li>
                <li><strong>Inclusivity:</strong> We embrace diversity and encourage all voices.</li>
            </ul>
            <p>
                Join us on this journey toward mental well-being and let’s work together to create a 
                mindful path for ourselves and future generations.
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Mindful Pathways. All Rights Reserved.</p>
    </footer>
</body>
</html>
N