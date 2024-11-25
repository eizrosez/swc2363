<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "mindful_pathway"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error variables
$signupError = "";
$loginError = "";

// Handle Sign Up
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        $signupError = "All fields are required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $signupError = "Invalid email format.";
    } else if (strlen($password) < 6) {
        $signupError = "Password must be at least 6 characters.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            // Success - JavaScript will show congrats box
        } else {
            $signupError = "Sign-up failed. Please try again.";
        }
        $stmt->close();
    }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    if (empty($email) || empty($password)) {
        $loginError = "All fields are required.";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo "<script>alert('Login successful! Redirecting...');</script>";
                header("Location: mindful_pathwayy.php"); // Redirect upon successful login
                exit();
            } else {
                $loginError = "Incorrect password.";
            }
        } else {
            $loginError = "No account found with this email.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        body {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #2c3e50;
        }

        .container {
            background-color: #3498db;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(44, 62, 80, 0.3);
            overflow: hidden;
            width: 900px;
            max-width: 100%;
            display: flex;
        }

        .form-container {
            padding: 50px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container.disable {
            pointer-events: none;
            opacity: 0.5;
            transition: opacity 0.3s;
        }

        .social {
            border: 1px solid #ddd;
            border-radius: 50%;
            display: inline-block;
            margin: 0 10px;
            width: 40px;
            height: 40px;
            background-color: #2c3e50;
            color: #fff;
            line-height: 40px;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .social:hover {
            background-color: #1a252f;
            color: #fff;
        }

        input, select {
            background-color: #eeeeee;
            border: none;
            padding: 10px;
            margin: 10px 0;
            width: 100%;
        }

        .toggle-password {
            position: relative;
            width: 100%;
        }

        .toggle-password input {
            width: 100%;
        }

        button {
            border: none;
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1a252f;
        }

        a {
            color: #333;
            text-decoration: none;
            margin: 15px 0;
            display: block;
            transition: color 0.3s;
        }

        a:hover {
            color: #000;
        }

        .error {
            background-color: #e74c3c;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            display: none;
            font-size: 14px;
            animation: fadeIn 0.3s ease-out;
        }

        .error.show {
            display: block;
        }

        .congrats-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #2ecc71;
            color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
            z-index: 1000;
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        .congrats-box button {
            margin-top: 15px;
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .congrats-box button:hover {
            background-color: #219653;
        }

        .toggle-password i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sign-Up Form -->
        <div class="form-container sign-up-container">
            <form method="POST" action="">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div class="error <?= !empty($signupError) ? 'show' : '' ?>"><?= $signupError ?></div>
                <input type="text" name="name" placeholder="Name" />
                <input type="email" name="email" placeholder="Email" />
                <div class="toggle-password">
                    <input type="password" name="password" id="password" placeholder="Password" />
                    <i class="fas fa-eye" onclick="togglePassword('password', this)"></i>
                </div>
                <select name="role">
                    <option value="student">Student</option>
                    <option value="parent">Parent</option>
                    <option value="educator">Educator</option>
                    <option value="counselor">Counselor</option>
                </select>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-container login-container">
            <form method="POST" action="">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <div class="error <?= !empty($loginError) ? 'show' : '' ?>"><?= $loginError ?></div>
                <input type="email" name="loginEmail" placeholder="Email" />
                <div class="toggle-password">
                    <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" />
                    <i class="fas fa-eye" onclick="togglePassword('loginPassword', this)"></i>
                </div>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>

        <!-- Congrats Box -->
        <div id="congratsBox" class="congrats-box">
            <p>Sign-up successful!</p>
            <button onclick="closeCongratsBox()">Close</button>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.classList.remove("fa-eye");
                el.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                el.classList.remove("fa-eye-slash");
                el.classList.add("fa-eye");
            }
        }

        // Close Congrats Box and enable social icons
        function closeCongratsBox() {
            document.getElementById('congratsBox').style.display = 'none';
            document.querySelector('.social-container').classList.remove('disable');
        }

        <?php if (isset($_POST['signup']) && empty($signupError)) : ?>
        document.getElementById('congratsBox').style.display = 'block';
        document.querySelector('.social-container').classList.add('disable');
        <?php endif; ?>
    </script>
</body>
</html>
