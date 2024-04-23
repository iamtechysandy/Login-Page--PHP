<?php
session_start();

// Check if user is logged in and is an admin
if (!(isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'User')) {
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
    <title>User Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">User Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                    <!-- Add more links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content -->
    <div class="container mt-4">
        <h2>Welcome to User Home</h2>
        <p>This is the user's home page content.</p>
        <!-- Add more content here -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <span>&copy; 2024 User Home. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
