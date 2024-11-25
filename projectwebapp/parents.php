
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents Page - Mindful Pathways</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #FFEBEE;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        header {
            background: #D32F2F;
            padding: 15px;
            text-align: center;
            font-size: 2.5em;
            color: #fff;
            border-bottom: 3px solid #C62828;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #FFEBEE;
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
            background: #FFCDD2;
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
            background: #D32F2F;
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
            background: #D32F2F;
            color: white;
            text-align: center;
            padding: 3px 0;
            font-size: 1.1em;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.15);
            position: relative;
        }
        footer a {
            color: #FFC107;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            color: #FFD54F;
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
            color: #FFEB3B;
        }
        @media (max-width: 768px) {
            .section {
                width: 100%;
            }
            .quiz-section {
                width: 100%;
            }
        }
        /* Adjusting the third quiz box to be long and centered */
        .quiz-long-box {
            background: #FFCDD2;
            width: 100%; /* Make it full width */
            max-width: 800px; /* Max width for the box */
            margin: 0 auto; /* Center the box */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <a href="mindful_pathwayy.php" class="home-button">🏠</a>
    📚 Parents' Guide - Mindful Pathways 📚
</header>

<div class="section-container">
    <!-- First row of information boxes -->
    <div class="section info-section">
        <h2>Understanding Your Child's Mental Health</h2>
        <ul>
            <li>🧠 Recognizing signs of stress and anxiety in your child</li>
            <li>💬 Encouraging open conversations with your child</li>
            <li>📚 Supporting academic pressures</li>
            <li>🎮 Ensuring a healthy work-life balance</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Effective Ways to Support Your Child</h2>
        <ul>
            <li>🧘‍♂️ Encouraging mindfulness practices</li>
            <li>💪 Fostering a healthy routine</li>
            <li>🎯 Supporting goal-setting</li>
            <li>🌟 Promoting regular breaks and self-care</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Second row of information boxes -->
    <div class="section info-section">
        <h2>Building Positive Family Habits</h2>
        <ul>
            <li>🗓️ Establishing a family routine</li>
            <li>💬 Creating a supportive communication environment</li>
            <li>📱 Setting healthy screen time limits</li>
            <li>🧘‍♀️ Promoting family wellness activities</li>
        </ul>
    </div>
    <div class="section info-section">
        <h2>Helping Your Child Connect with Support</h2>
        <ul>
            <li>📚 Encouraging school counselor engagement</li>
            <li>💬 Finding a mentor for your child</li>
            <li>🗣️ Helping your child build a support network</li>
            <li>🎯 Seeking professional help when necessary</li>
        </ul>
    </div>
</div>

<div class="section-container">
    <!-- Quiz Section with Popup Messages -->
    <div class="section quiz-section">
        <h2>Quick Stress Assessment for Your Child</h2>
        <p>How often does your child feel overwhelmed by schoolwork?</p>
        <button onclick="showPopup('Tip: Try managing time together with a planner!')">Often</button>
        <button onclick="showPopup('Tip: Encourage regular breaks and relaxation time.')">Sometimes</button>
        <button onclick="showPopup('Tip: Great job! Continue supporting a healthy balance.')">Rarely</button>
    </div>
    <div class="section quiz-section">
        <h2>Check Your Child's Well-Being</h2>
        <p>How often does your child experience intense emotions (e.g., sadness, anger)?</p>
        <button onclick="showPopup('Tip: Help them explore coping mechanisms like journaling.')">Frequently</button>
        <button onclick="showPopup('Tip: Regular conversations can help ease emotional pressure.')">Occasionally</button>
        <button onclick="showPopup('Tip: Your child seems well-balanced! Keep it up.')">Rarely</button>
    </div>
    <!-- Long Quiz Box (Centered and Rectangular) -->
    <div class="quiz-long-box">
        <h2>How's Your Child's Emotional Health?</h2>
        <p>How often does your child experience intense emotions (e.g., sadness, anger)?</p>
        <button onclick="showPopup('Tip: Help them explore coping mechanisms like journaling.')">Frequently</button>
        <button onclick="showPopup('Tip: Regular conversations can help ease emotional pressure.')">Occasionally</button>
        <button onclick="showPopup('Tip: Your child seems well-balanced! Keep it up.')">Rarely</button>
    </div>
</div>

<!-- Popup Modal -->
<div class="popup" id="popup">
    <div class="popup-content">
        <h3>Parent Tip</h3>
        <p id="popup-message"></p>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>
</div>

<script>
    function showPopup(message) {
        document.getElementById('popup-message').textContent = message;
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>
