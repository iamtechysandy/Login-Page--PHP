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
// Get the username from the session
$username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin-Home</title>
    <style>
        .changestatus {
            visibility: hidden;
        }
    </style>
</head>
<body>
    <ul class="nav">
    <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="users.php">Users</a>
    </li>
    <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo " $username</h1>";?></a>
    </li>
    </ul>
    
    
    <div class="container" >

        <?php 
        require_once 'models/users_det.php';
        ?>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
