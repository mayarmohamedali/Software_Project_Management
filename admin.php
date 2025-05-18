<?php
// Start session and check admin authentication
session_start();

// Simple authentication check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Sample hardcoded shelters data
$shelters = [
    [
        'id' => 1,
        'name' => 'City Shelter',
        'location' => 'Downtown',
        'capacity' => 50,
        'description' => 'Main city shelter with full facilities'
    ],
    [
        'id' => 2,
        'name' => 'Northside Shelter',
        'location' => 'North District',
        'capacity' => 30,
        'description' => 'Smaller shelter serving the northern area'
    ]
];

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_shelter'])) {
        // Add new shelter
        $newId = count($shelters) + 1;
        $shelters[] = [
            'id' => $newId,
            'name' => htmlspecialchars($_POST['name']),
            'location' => htmlspecialchars($_POST['location']),
            'capacity' => (int)$_POST['capacity'],
            'description' => htmlspecialchars($_POST['description'])
        ];
        $success = "Shelter added successfully!";
        
    } elseif (isset($_POST['update_shelter'])) {
        // Update shelter
        $id = (int)$_POST['id'];
        foreach ($shelters as &$shelter) {
            if ($shelter['id'] == $id) {
                $shelter['name'] = htmlspecialchars($_POST['name']);
                $shelter['location'] = htmlspecialchars($_POST['location']);
                $shelter['capacity'] = (int)$_POST['capacity'];
                $shelter['description'] = htmlspecialchars($_POST['description']);
                break;
            }
        }
        $success = "Shelter updated successfully!";
        
    } elseif (isset($_POST['delete_shelter'])) {
        // Delete shelter
        $id = (int)$_POST['id'];
        $shelters = array_filter($shelters, function($shelter) use ($id) {
            return $shelter['id'] != $id;
        });
        $shelters = array_values($shelters); // Reindex array
        $success = "Shelter deleted successfully!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Shelter Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: rgb(246, 236, 208); }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: rgb(246, 236, 208); color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        textarea { min-height: 80px; }
        button, .btn { 
            padding: 10px 15px; 
            background-color: rgb(246, 236, 208); 
            color: #333; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            text-decoration: none; 
            display: inline-block;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        button:hover, .btn:hover { 
            background-color: rgb(236, 226, 198); 
        }
        .logout { 
            float: right; 
            padding: 10px 15px; 
            background-color: rgb(246, 236, 208);
            color: #333;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .logout:hover {
            background-color: rgb(236, 226, 198);
        }
        
        .action-buttons { display: flex; gap: 5px; }
        .edit-form { display: none; margin-top: 10px; padding: 10px; background: #f9f9f9; border-radius: 4px; }
        .success-message { color: green; margin: 10px 0; padding: 10px; background: #e8f5e9; border-radius: 4px; }
        .error-message { color: red; margin: 10px 0; padding: 10px; background: #ffebee; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard <a href="logout.php" class="logout">Logout</a></h1>
        
        <?php if(isset($success)): ?>
            <div class="success-message"><?= $success ?></div>
        <?php endif; ?>
        
        <h2>Add New Shelter</h2>
        <form method="POST">
            <div class="form-group">
                <label>Shelter Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Location:</label>
                <input type="text" name="location" required>
            </div>
            <div class="form-group">
                <label>Capacity:</label>
                <input type="number" name="capacity" required min="1">
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" rows="3"></textarea>
            </div>
            <button type="submit" name="add_shelter">Add Shelter</button>
        </form>
        
        <h2>Existing Shelters</h2>
        <?php if(count($shelters) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($shelters as $shelter): ?>
                <tr>
                    <td><?= $shelter['id'] ?></td>
                    <td><?= htmlspecialchars($shelter['name']) ?></td>
                    <td><?= htmlspecialchars($shelter['location']) ?></td>
                    <td><?= $shelter['capacity'] ?></td>
                    <td><?= htmlspecialchars($shelter['description']) ?></td>
                    <td class="action-buttons">
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $shelter['id'] ?>">
                            <button type="submit" name="delete_shelter" onclick="return confirm('Are you sure you want to delete this shelter?')">Delete</button>
                        </form>
                        <button onclick="toggleEditForm(<?= $shelter['id'] ?>)">Edit</button>
                    </td>
                </tr>
                <tr id="edit-form-<?= $shelter['id'] ?>" class="edit-form">
                    <td colspan="6">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $shelter['id'] ?>">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" value="<?= htmlspecialchars($shelter['name']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Location:</label>
                                <input type="text" name="location" value="<?= htmlspecialchars($shelter['location']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Capacity:</label>
                                <input type="number" name="capacity" value="<?= $shelter['capacity'] ?>" required min="1">
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description" rows="3"><?= htmlspecialchars($shelter['description']) ?></textarea>
                            </div>
                            <button type="submit" name="update_shelter">Update Shelter</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No shelters found.</p>
        <?php endif; ?>
    </div>

    <script>
        function toggleEditForm(id) {
            const form = document.getElementById(`edit-form-${id}`);
            form.style.display = form.style.display === 'none' ? 'table-row' : 'none';
        }
        
        // Hide all edit forms on page load
        document.querySelectorAll('.edit-form').forEach(form => {
            form.style.display = 'none';
        });
    </script>
</body>
</html>