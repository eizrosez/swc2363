<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "mental_health_app");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = 1;  // Assume user ID is 1 for simplicity; integrate session for dynamic values.
    $description = $_POST['description'];
    $conn->query("INSERT INTO client_records (user_id, record_type, description) VALUES ($user_id, 'productivity', '$description')");
    echo "<script>alert('Record added!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Module</title>
    <style>
        body { background: linear-gradient(to right, #ffccbc, #ffe0b2); font-family: Arial, sans-serif; }
        .container { width: 50%; padding: 30px; margin: auto; background: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); }
        h2 { text-align: center; color: #ff8a65; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🌱 Add Your Productivity Goals 🌱</h2>
        <form method="POST">
            <textarea name="description" placeholder="Describe your goals..." required></textarea>
            <button type="submit">Submit 😊</button>
        </form>
    </div>
</body>
</html>
