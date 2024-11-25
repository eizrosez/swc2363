<?php
// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mindful_pathway";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have logged in successfully and stored the user's name in the session
if (isset($_SESSION['name'])) {
    $user_name = $_SESSION['name'];
}

// Fetch daily tips and did you know
$dailyTipsQuery = "SELECT tip_text FROM daily_tips ORDER BY RAND() LIMIT 1"; // Get a random daily tip
$didYouKnowQuery = "SELECT fact_text FROM did_you_know ORDER BY RAND() LIMIT 1"; // Get a random "Did You Know"

// Execute the queries
$dailyTipsResult = $conn->query($dailyTipsQuery);
$didYouKnowResult = $conn->query($didYouKnowQuery);

// Fetch the results
$dailyTip = $dailyTipsResult->fetch_assoc()['tip_text'];
$didYouKnow = $didYouKnowResult->fetch_assoc()['fact_text'];

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindful Pathways</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e6f4f1; /* Soft teal background */
            color: #2d3748;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            background: linear-gradient(135deg, #4fd1c5, #81e6d9);
            padding: 30px;
            text-align: center;
            font-size: 3em;
            color: #fff;
            font-weight: bold;
            border-bottom: 4px solid #38b2ac;
            letter-spacing: 2px;
            width: 100%;
        }
        nav {
            background-color: #38b2ac;
            padding: 15px;
            text-align: center;
            width: 100%;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 25px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #fff;
        }
        #mainwrapper {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
        }
        #sidebar {
            width: 200px;
            padding: 20px;
            background-color: #e6fffa;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }
        #sidebar h2 {
            font-size: 20px;
            color: #2d3748;
            margin-bottom: 15px;
            border-bottom: 2px solid #4fd1c5;
            padding-bottom: 10px;
        }
        #sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        #sidebar ul li {
            margin-bottom: 10px;
        }
        #sidebar ul li a {
            text-decoration: none;
            color: #38b2ac;
            font-weight: bold;
            transition: color 0.3s;
        }
        #sidebar ul li a:hover {
            color: #4fd1c5;
        }
        .content {
            flex-grow: 1;
        }
        h1 {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 10px;
            color: #2d3748;
        }
        h2 {
            font-size: 2em;
            margin-top: 20px;
            color: #2d3748;
            border-bottom: 2px solid #4fd1c5;
            padding-bottom: 10px;
        }
        .intro {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .why-mental-health {
            text-align: center;
            margin-bottom: 30px;
            background-color: #e6fffa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .tips-container {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
        }
        .daily-tips, .did-you-know {
            background-color: #e6fffa;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 48%;
            font-size: 18px;
            position: relative;
        }
        footer {
            background-color: #e6fffa;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
            color: #2d3748;
            font-size: 14px;
            border-top: 3px solid #4fd1c5;
            border-radius: 0 0 15px 15px;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
   🌿 Mindful Pathways 🌿
</header>

<nav>
    <ul>
        <li><a href="loginandsignup.php">My Account</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><a href="user_self_assessment.php">Self - Assessment</a></li>
        <li><a href="coping_strategies.php">Coping Strategies</a></li>
        <li><a href="playlist.php">Song Playlist</a></li>
        <li><a href="videos.php">Videos</a></li>
    </ul>
</nav>

<div id="mainwrapper">
    <div id="sidebar">
        <h2>Sections</h2>
        <ul>
            <li><a href="students.php">Student</a></li>
            <li><a href="parents.php">Parents</a></li>
            <li><a href="professional.php">Professional</a></li>
            <li><a href="admin_dashboard.php">Admin</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>
            <?php
            // Display the user's name if logged in
            if (isset($user_name)) {
                echo "Hi, " . htmlspecialchars($user_name);
            } else {
                echo "Welcome to Mindful Pathways";
            }
            ?>
        </h1>

        <div class="intro">
            <p>Welcome to Mindful Pathways. We're here to help you feel your best by providing tips, resources, and support for your mental well-being. Join us in making mental health a priority in your life.</p>
        </div>

        <div class="why-mental-health">
            <h2>Why is Mental Health Important?</h2>
            <p>
                Your mental health is the key to living a balanced and happy life. Taking care of your mind helps you cope with stress, make better decisions, and build strong connections with others. 🌿 Remember, it’s okay to seek help and share how you're feeling. 💬
            </p>
        </div>

        <div class="tips-container">
            <div class="daily-tips">
                <h2>Daily Tips</h2>
                <p><?php echo $dailyTip; ?></p>
            </div>

            <div class="did-you-know">
                <h2>Did You Know?</h2>
                <p><?php echo $didYouKnow; ?></p>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 Mindful Pathways. All rights reserved.</p>
</footer>

</body>
</html>
