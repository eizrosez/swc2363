<?php
// Include the database connection file
include('db_connect.php');

// Function for handling Add, Update, Delete, Search
function handleFormSubmission($conn, $table, $action) {
    if ($action == 'add') {
        $columns = '';
        $values = '';
        $bind_params = '';
        $types = '';
        $params = [];

        switch ($table) {
            case 'users':
                $columns = 'name, email, role';
                $values = '?, ?, ?';
                $bind_params = ['sss', $_POST['name'], $_POST['email'], $_POST['role']];
                break;
            case 'coping_strategies':
                $columns = 'icon, title, description';
                $values = '?, ?, ?';
                $bind_params = ['sss', $_POST['icon'], $_POST['title'], $_POST['description']];
                break;
            case 'daily_tips':
                $columns = 'tip_text';
                $values = '?';
                $bind_params = ['s', $_POST['tip_text']];
                break;
            case 'did_you_know':
                $columns = 'fact_text';
                $values = '?';
                $bind_params = ['s', $_POST['fact_text']];
                break;
            case 'songs':
                $columns = 'title, artist, image, audio';
                $values = '?, ?, ?, ?';
                $bind_params = ['ssss', $_POST['title'], $_POST['artist'], $_POST['image'], $_POST['audio']];
                break;
            case 'user_scores':
                $columns = 'name, email';
                $values = '?, ?';
                $bind_params = ['ss', $_POST['name'], $_POST['email']];
                break;
            case 'videos':
                $columns = 'title, url';
                $values = '?, ?';
                $bind_params = ['ss', $_POST['title'], $_POST['url']];
                break;
        }

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(...$bind_params);
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if ($action == 'update') {
        $set_values = '';
        $bind_params = '';
        $id = $_POST['id'];

        switch ($table) {
            case 'users':
                $set_values = 'name=?, email=?, role=?';
                $bind_params = ['ssi', $_POST['name'], $_POST['email'], $_POST['role'], $id];
                break;
            case 'coping_strategies':
                $set_values = 'icon=?, title=?, description=?';
                $bind_params = ['sssi', $_POST['icon'], $_POST['title'], $_POST['description'], $id];
                break;
            case 'daily_tips':
                $set_values = 'tip_text=?';
                $bind_params = ['si', $_POST['tip_text'], $id];
                break;
            case 'did_you_know':
                $set_values = 'fact_text=?';
                $bind_params = ['si', $_POST['fact_text'], $id];
                break;
            case 'songs':
                $set_values = 'title=?, artist=?, image=?, audio=?';
                $bind_params = ['ssssi', $_POST['title'], $_POST['artist'], $_POST['image'], $_POST['audio'], $id];
                break;
            case 'user_scores':
                $set_values = 'name=?, email=?';
                $bind_params = ['ssi', $_POST['name'], $_POST['email'], $id];
                break;
            case 'videos':
                $set_values = 'title=?, url=?';
                $bind_params = ['ssi', $_POST['title'], $_POST['url'], $id];
                break;
        }

        $sql = "UPDATE $table SET $set_values WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(...$bind_params);
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if ($action == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM $table WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    if ($action == 'search') {
        $search = $_POST['search'];
        $sql = "SELECT * FROM $table WHERE name LIKE ? OR title LIKE ? OR description LIKE ?";
        $stmt = $conn->prepare($sql);
        $search_query = "%" . $search . "%"; // Concatenate the '%' symbol
        $stmt->bind_param("sss", $search_query, $search_query, $search_query);
        $stmt->execute();
        return $stmt->get_result();
    }
}

// Handle the form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['table'])) {
        $table = $_POST['table'];
        $action = $_POST['action'];
        handleFormSubmission($conn, $table, $action);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mindful Pathway</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: linear-gradient(to right, #d4fcf8, #f3e5f5);
            margin: 0;
            padding: 0;
            color: #333;
        }

        #admin-dashboard {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: #007B7F;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            font-size: 26px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .action-buttons {
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
        }

        .action-buttons button {
            background-color: #007B7F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .action-buttons button:hover {
            background-color: #005f63;
            transform: scale(1.05);
        }

        .search-bar input {
            padding: 8px 12px;
            border-radius: 25px;
            border: 1px solid #007B7F;
            font-size: 16px;
            width: 250px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #007B7F;
        }

        .table th {
            background-color: #007B7F;
            color: white;
        }

        .table td {
            background-color: #f9f9f9;
        }

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

    </style>
</head>
<body>

<div id="admin-dashboard">
    <header>
        <h1>Admin Dashboard - Manage Records</h1>
    </header>

    <!-- Users Table Section -->
    <section>
        <h2>Manage Users</h2>
        <div class="action-buttons">
            <button onclick="document.getElementById('addUser Form').style.display='block'">Add User</button>
            <div class="search-bar">
                <input type="text" id="searchUser " placeholder="Search Users" onkeyup="searchRecords('users')">
            </div>
        </div>

        <!-- Add User Form -->
        <div id="addUser Form" style="display:none; background-color: #007B7F; padding: 20px; border-radius : 10px;">
            <h3>Add User</h3>
            <form method="post">
                <input type="hidden" name="table" value="users">
                <input type="hidden" name="action" value="add">
                <label for="name">Id:</label>
                <input type="text" id="user_id" name="user_id" required><br><br>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" required><br><br>
                <button type="submit">Add User</button>
            </form>
        </div>

        <!-- Users Table -->
        <table class="table" id="usersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>
                            <form method='post' style='display:inline;'>
                                <input type='hidden' name='table' value='users'>
                                <input type='hidden' name='action' value='delete'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Coping Strategies Table Section -->
    <section>
        <h2>Manage Coping Strategies</h2>
        <div class="action-buttons">
            <button onclick="document.getElementById('addCopingForm').style.display='block'">Add Coping Strategy</button>
            <div class="search-bar">
                <input type="text" id="searchCoping" placeholder="Search Coping Strategies" onkeyup="searchRecords('coping')">
            </div>
        </div>

        <!-- Add Coping Strategy Form -->
        <div id="addCopingForm" style="display:none; background-color: #007B7F; padding: 20px; border-radius: 10px;">
            <h3>Add Coping Strategy</h3>
            <form method="post">
                <input type="hidden" name="table" value="coping_strategies">
                <input type="hidden" name="action" value="add">
                <label for="icon">Icon:</label>
                <input type="text" id="icon" name="icon" required><br><br>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea><br><br>
                <button type="submit">Add Coping Strategy</button>
            </form>
        </div>

        <!-- Coping Strategies Table -->
        <table class="table" id="copingTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM coping_strategies");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['icon'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>
                            <form method='post' style='display:inline;'>
                                <input type='hidden' name='table' value='coping_strategies'>
                                <input type='hidden' name='action' value='delete'>
                                <input ```php
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Mindful Pathway. All Rights Reserved.</p>
    </footer>
</div>

<script>
    function searchRecords(tableName) {
        let input = document.getElementById(`search${tableName.charAt(0).toUpperCase() + tableName.slice(1)}`);
        let filter = input.value.toLowerCase();
        let table = document.getElementById(`${tableName}Table`);
        let tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td");
            let rowMatch = false;

            for (let j = 0; j < td.length - 1; j++) {
                if (td[j] && td[j].textContent.toLowerCase().indexOf(filter) > -1) {
                    rowMatch = true;
                }
            }

            if (rowMatch) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

</body>
</html>