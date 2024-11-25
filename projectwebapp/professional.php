<?php
// PHP code can be added here if needed for dynamic content, database interactions, etc.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Page - Mindful Pathways</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #F4F4F4; /* Light Gray */
            color: #4B4B4B; /* Dark Gray */
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        header {
            background: linear-gradient(135deg, #A8D5BA, #D99A6C); /* Soft Green to Terracotta gradient */
            padding: 15px;
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            border-bottom: 3px solid #4A7C2A; /* Deep Olive for border */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #F0EAD6; /* Light Beige for button */
            color: #4B4B4B; /* Dark Gray */
            padding: 5px 10px;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .home-button:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .section-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .section {
            background: #F0EAD6; /* Light Beige */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 45%;
            margin-bottom: 20px;
        }
        .info-section {
            background: #A8D5BA; /* Soft Green */
        }
        .quiz-section {
            background: #D99A6C; /* Terracotta */
        }
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: #FFF;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            font-size: 1.2em;
        }
        .popup-content h3 {
            color: #4A7C2A; /* Deep Olive */
            margin-bottom: 15px;
        }
        .close-btn {
            background: #4A7C2A; /* Deep Olive */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font -size: 1em;
            cursor: pointer;
            transition: background 0.3s;
        }
        .close-btn:hover {
            background: #3A5A2A; /* Darker Olive */
        }
        button {
            background: #A8D5BA;
            color: #4B4B4B;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: bold;
            border-radius: 30px;
            margin: 10px 5px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25);
        }
        button::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease;
        }
        button:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }
        footer {
            background: #4B4B4B; /* Dark Gray */
            color: white;
            text-align: center;
            padding: 3px 0;
            font-size: 1.1em;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.15);
            position: relative;
        }
        footer a {
            color: #A8D5BA; /* Soft Green for links */
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            color: #D99A6C; /* Terracotta for hover effect */
        }
        footer .social-icons {
            margin-top: 10px;
        }
        footer .social-icons a {
            margin: 0 15px;
            font-size: 1.5em;
            color: white;
            transition: color 0.3s;
        }
        footer .social-icons a:hover {
            color: #A8D5BA; /* Soft Green for hover effect */
        }
        @media (max-width: 768px) {
            .section {
                width: 100%;
            }
            .quiz-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <a href="mindful_pathwayy.php" class="home-button">🏠</a>
    🌟 Professional Support - Mindful Pathways 🌟
</header>

<div class="section-container">
    <!-- First row of information boxes -->
    <div class="section info-section">
        <h2>Supporting Mental Health in Professional Settings</h2>
        <ul>
            <li>💼 Addressing workplace stress and burnout</li>
            <li>🧘‍♀️ Integrating mindfulness practices into the workday</li>
            <li>🔍 Promoting mental health awareness among colleagues</li>
            <li>📅 Providing resources for employee well-being</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Creating a Healthy Work Environment</h2>
        <ul>
            <li>🏢 Encouraging work-life balance</li>
            <li>💬 Open communication about mental health</li>
            <li>🧑‍💻 Supporting remote work well-being</li>
            <li>🎯 Encouraging healthy routines and breaks</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Second row of information boxes -->
    <div class="section info-section">
        <h2>Building Mental Health Programs</h2>
        <ul>
            <li>🎓 Training programs for managers and leaders</li>
            <li>💼 Implementing policies that support mental well-being</li>
            <li>💬 Creating a peer support network within the workplace</li>
            <li>🗣️ Offering professional counseling services</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Supporting Employee Mental Health</h2>
        <ul>
            <li>📅 Providing flexibility for personal well-being</li>
            <li>💬 Encouraging stress management practices</li>
            <li>🔗 Linking employees with mental health resources</li>
            <li>🏅 Recognizing achievements and contributions</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Quiz Section with Popup Messages -->
    <div class="section quiz-section">
        <h2>Employee Mental Health Check</h2>
        <p>How often do you feel overwhelmed by workplace responsibilities?</p>
        <button onclick="showPopup('Consider setting boundaries and delegating tasks when possible.')">Often</button>
        <button onclick="showPopup('Taking regular breaks can help. Try scheduling them into your day.')">Sometimes</button>
        <button onclick="showPopup('Great! Continue maintaining a balanced workload.')">Rarely</button>
    </div>
    <div class="section quiz-section">
        <h2>Assessing Workplace Stress</h2>
        <p>How often do you take breaks during the workday?</p>
        <button onclick="showPopup('Be sure to take short breaks to improve focus and reduce stress.')">Often</button>
        <button onclick="showPopup('Try incorporating a short walk or relaxation exercise into your breaks.')">Sometimes</button>
        <button onclick="showPopup('Great! Regular breaks can improve productivity and mental health.')">Rarely</button>
    </div>
</div>

<!-- Popup for Tips -->
<div id="popup" class="popup">
    <div class="popup-content">
        <h3>💡</h3>
        <p id="popup-text"></p>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>
</div>

<footer>
    <p>© 2024 Mindful Pathways 🌟 | <a href="Mindful Pathway.php">Home</a></p>
</footer>

<script>
    // Popup functions for showing tips
    function showPopup(tip) {
        document.getElementById('popup-text').textContent = tip;
        document.getElementById('popup').style.display = 'flex';
    }
    
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>
