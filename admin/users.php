<?php
session_start();

// Check if user is logged in and is an admin
if (!(isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'Admin')) {
    // If not logged in as admin, redirect to login page
    header('Location: login.php');
    exit();
}

// Include database connection
require_once '../include/db.php';

// Function to display error message
function showError($message)
{
    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}

// Function to display success message
function showSuccess($message)
{
    echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
}

// Handle form submission for user creation, role/status change, and password reset
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle user creation
    if (isset($_POST['create_user'])) {
        // Validate form fields
        $username = $_POST['email']; // Username is same as email
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $password = $_POST['password'];

        // Insert new user into database
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password, full_name, email, role, status) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$username, $password, $full_name, $email, $role, $status]);
            showSuccess('User created successfully.');
        } catch (PDOException $e) {
            showError('Error creating user: ' . $e->getMessage());
        }
    }

    // Handle role/status change
    if (isset($_POST['change_status'])) {
        $userId = $_POST['username'];
        $status = $_POST['status'];

        // Update user status in the database
        try {
            $stmt = $pdo->prepare("UPDATE users SET status = ? WHERE username = ?");
            $stmt->execute([$status, $userId]);
            showSuccess('Status updated successfully.');
        } catch (PDOException $e) {
            showError('Error updating status: ' . $e->getMessage());
        }
    }

    // Handle password reset
    if (isset($_POST['reset_password'])) {
        $userId = $_POST['username'];
        $newPassword = $_POST['new_password'];

        // Reset user password in the database
        try {
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->execute([$newPassword, $userId]);
            showSuccess('Password reset successfully.');
        } catch (PDOException $e) {
            showError('Error resetting password: ' . $e->getMessage());
        }
    }
}
// Fetch all users from database

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" href="users.php">Users</a>
    </li>
    <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo " $username</h1>";?></a>
    </li>
    </ul>
    <div class="container mt-5">
        <h2>Admin - Users</h2>
        <!-- User Creation Form -->
        <form action="" method="post">
            <h3>Create User</h3>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <!-- Add more roles if needed -->
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create_user">Create User</button>
        </form>

        <!-- Role/Status Change Form -->
        <?php 
        require_once 'models/users_det.php';
        ?>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
