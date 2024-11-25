<?php


// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mental_health_app";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


// Signup and login handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        echo "<script>alert('Signup successful! You can now login.')</script>";
    } else if (isset($_POST['login'])) {
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();
        if ($user && password_verify($_POST['password'], $user['password'])) {
            echo "<script>alert('Login successful!')</script>";
        } else {
            echo "<script>alert('Invalid credentials.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup - Mental Health App</title>
    <style>
        body { background: linear-gradient(to right, #a8e6cf, #dcedc1); font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); }
        h1 { text-align: center; color: #ff8a65; }
        form { display: flex; flex-direction: column; }
        input, button { margin: 10px 0; padding: 10px; border-radius: 5px; border: none; }
        button { background-color: #ff8a65; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌸 Welcome! Please Login or Signup 🌸</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Name (Signup only)" />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit" name="signup">Signup 😊</button>
            <button type="submit" name="login">Login 😊</button>
        </form>
    </div>
</body>
</html>
