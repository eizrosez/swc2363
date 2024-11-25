<?php
include('db_connect.php'); // Include your database connection

$totalScore = 0; // Initialize the variable

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Ensure name and email are set and not empty
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    
    if (empty($name) || empty($email)) {
        echo "<p>Please provide both your name and email.</p>";
    } else {
        // Get the total score by summing the selected values
        $totalScore = array_sum(array_map('intval', $_POST));

        // Insert the name, email, and score into the database
        $sql = "INSERT INTO user_scores (name, email, score) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $totalScore);

        if ($stmt->execute()) {
            echo "<p>Your total score is: $totalScore. " . get_result_message($totalScore) . "</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    $conn->close();
}

// Function to get result message
function get_result_message($score) {
    if ($score <= 20) {
        return "It seems that you're in a good place mentally, but it's still important to stay mindful of your emotional health.";
    } elseif ($score <= 35) {
        return "You might be experiencing some stress or challenges. Consider reaching out for support or exploring coping strategies.";
    } else {
        return "It looks like you're going through a tough time. It could be helpful to talk to a counselor or mental health professional.";
    }
}

// Functions for quiz questions and options
function get_question_text($number) {
    $questions = [
        "I often feel anxious or worried.",
        "I have trouble sleeping at night.",
        "I feel overwhelmed by my responsibilities.",
        "I have difficulty concentrating or focusing.",
        "I have felt down or depressed lately.",
        "I find it difficult to stay motivated.",
        "I feel a sense of hopelessness about the future.",
        "I have been isolating myself from others.",
        "I feel like I can't handle stress effectively.",
        "I have been feeling less interest in activities I used to enjoy."
    ];
    return $questions[$number - 1];
}

function get_option_text($value) {
    $options = ["Strongly Disagree", "Disagree", "Neutral", "Agree", "Strongly Agree"];
    return $options[$value - 1];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self-Assessment - Mindful Pathway</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <style>
       body {
            font-family: 'Source Sans Pro', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #d4fcf8, #f3e5f5);
            color: #333;
        }

        /* Main Wrapper */
        #mainwrapper {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            background-color: #007B7F;
            color: white;
            padding: 25px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            font-size: 26px;
            letter-spacing: 1.5px;
            position: relative;
        }

        h1 {
            color: #FFFFFF;
        }

        /* Home Button */
        .home-button {
            position: absolute;
            right: 20px;
            top: 25px;
            background-color: #FFFFFF;
            color: #007B7F;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .home-button:hover {
            background-color: #e0f7fa;
            transform: scale(1.05);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        /* Quiz Card */
        .quiz {
            margin-top: 20px;
            padding: 25px;
            border: 1px solid #007B7F;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .quiz:hover {
            transform: scale(1.02);
        }

        .quiz h3 {
            font-size: 22px;
            color: #007B7F;
        }

        /* Quiz Question Styling */
        .quiz-question {
            margin: 20px 0;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .quiz-question p {
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        /* Form Inputs */
        input[type="radio"] {
            margin-right: 10px;
        }

        /* Buttons Styling */
        button[type="submit"], button[type="reset"] {
            background-color: #007B7F;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin: 15px 10px;
            font-size: 16px;
        }

        button[type="submit"]:hover, button[type="reset"]:hover {
            background-color: #005f63;
            transform: scale(1.05);
        }

        button[type="reset"] {
            background-color: #ff4757;
        }

        button[type="reset"]:hover {
            background-color: #e84118;
        }

        /* Footer */
        footer {
            background-color: #007B7F;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 15px 15px;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
        }

        /* Result Section Styling */
        #result {
            margin-top: 30px;
            padding: 15px;
            background-color: #e0f7fa;
            border-left: 5px solid #007B7F;
            font-weight: bold;
        }

    </style>
</head>
<body>
<div id="mainwrapper">
    <header>
        <h1>🌿 Self-Assessment 🌿</h1>
        <button class="home-button" onclick="location.href='mindful_pathwayy.php'">Home</button>
    </header>

    <section id="content">
        <h2>Evaluate Your Mental Health</h2>
        <p>Take a few moments to assess how you're feeling. This quiz helps identify areas where you might need additional support. Answer each question as honestly as possible.</p>

        <div class="quiz">
            <h3>Quiz: How Are You Feeling?</h3>
            <form id="selfAssessmentForm" method="post" action="user_self_assessment.php">
                <!-- User Info Section -->
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <?php
                // Display questions dynamically
                for ($i = 1; $i <= 10; $i++) {
                    echo "<div class='quiz-question'>";
                    echo "<p>" . get_question_text($i) . "</p>";

                    for ($j = 1; $j <= 5; $j++) {
                        echo "<label><input type='radio' name='question_$i' value='$j'> " . get_option_text($j) . "</label><br>";
                    }

                    echo "</div>";
                }
                ?>

                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
            </form>

            <!-- Display Result -->
            <div id="result">
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <p>Your total score is: <?= $totalScore ?></p>
                    <p><?= get_result_message($totalScore) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <p>Mindful Pathways - Your Mental Health Matters</p>
    </footer>
</div>
</body>
</html>
