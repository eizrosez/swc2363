<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Page - Mindful Pathways</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #E8EAF6;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        header {
            background: #004D40;
            padding: 15px;
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            border-bottom: 3px solid #003D33;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #C8E6C9;
            color: #333;
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
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 45%;
            margin-bottom: 20px;
        }
        .quiz-section {
            background: #C8E6C9;
        }
        .info-section {
            background: #FFCCBC;
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
            color: #8E24AA;
            margin-bottom: 15px;
        }
        .close-btn {
            background: #8E24AA;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
        }
        .close-btn:hover {
            background: #BA68C8;
        }
        button {
            background: #004D40;
            color: white;
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
            background: #004D40;
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 0.9em;
            font-weight: 400;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.15);
        }
        footer a {
            color: #FFC107;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            color: #FFD54F;
        }
        @media (max-width: 768px) {
            .section {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <a href="mindful_pathwayy.php" class="home-button">🏠</a>
    📚 Students' Guide - Mindful Pathways 📚
</header>

<div class="section-container">
    <!-- First row of information boxes -->
    <div class="section info-section">
        <h2>Understanding Your Mental Health</h2>
        <ul>
            <li>🧠 Recognizing signs of stress and anxiety</li>
            <li>💬 Finding someone to talk to</li>
            <li>📚 Managing academic pressure</li>
            <li>🎮 Balancing work and play</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Effective Stress Management</h2>
        <ul>
            <li>🧘‍♂️ Practicing mindfulness</li>
            <li>💪 Exercising for mental well-being</li>
            <li>🎯 Setting achievable goals</li>
            <li>🌟 Taking regular breaks</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Second row of information boxes -->
    <div class="section info-section">
        <h2>Building Positive Habits</h2>
        <ul>
            <li>🗓️ Establishing a routine</li>
            <li>💬 Talking to your friends and family</li>
            <li>📱 Limiting screen time</li>
            <li>🧘‍♀️ Taking care of your body</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Connecting with Your Support System</h2>
        <ul>
            <li>📚 Engaging with school counselors</li>
            <li>💬 Finding a mentor</li>
            <li>🗣️ Building a support network</li>
            <li>🎯 Seeking professional help when needed</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Quiz Section with Popup Messages -->
    <div class="section quiz-section">
        <h2>Quick Stress Assessment Quiz</h2>
        <p>How often do you feel overwhelmed by schoolwork?</p>
        <button onclick="showPopup('Tip: Try managing your time with a planner!')">Often</button>
        <button onclick="showPopup('Tip: Remember to take breaks!')">Sometimes</button>
        <button onclick="showPopup('Tip: Keep up the good work and stay balanced!')">Rarely</button>
    </div>
    <div class="section quiz-section">
        <h2>Check Your Well-Being</h2>
        <p>Do you feel connected to people around you?</p>
        <button onclick="showPopup('Tip: Social support is essential. Reach out to a friend!')">Not at all</button>
        <button onclick="showPopup('Tip: Balance social interactions with self-care.')">Somewhat</button>
        <button onclick="showPopup('Tip: Stay connected and keep nurturing these bonds!')">Very much</button>
    </div>
</div>

<!-- Popup Modal -->
<div class="popup" id="popup">
    <div class="popup-content">
        <h3>⊹₊⋆.˚୨୧⋆.˚₊⊹</h3>
        <p id="popup-message">Here's a tip for you!</p>
        <button class="close-btn" onclick="closePopup()">Got it!</button>
    </div>
</div>

<footer>
    <p>&copy; 2024 Mindful Pathways. For more information, visit our <a href="resources.php">Resources</a> page.</p>
</footer>

<script>
    function showPopup(message) {
        document.getElementById('popup-message').innerText = message;
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>