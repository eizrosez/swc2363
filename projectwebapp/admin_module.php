<?php
$conn = new mysqli("localhost", "username", "password", "mental_health_app");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM client_records WHERE record_id=$id");
}

$result = $conn->query("SELECT * FROM client_records");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Module</title>
    <style>
        body { background: linear-gradient(to right, #ffd180, #ffab91); font-family: Arial, sans-serif; }
        .container { width: 70%; padding: 30px; margin: auto; background: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); }
        h2 { text-align: center; color: #ff8a65; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛠️ Manage Records 🛠️</h2>
        <table>
            <tr><th>ID</th><th>User ID</th><th>Type</th><th>Description</th><th>Actions</th></tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['record_id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['record_type'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><a href="admin_module.php?delete=<?= $row['record_id'] ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
