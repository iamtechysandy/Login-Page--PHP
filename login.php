<?php
require_once 'include/db.php';

session_start();

// Function to display error message
function showError($message)
{
    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form fields
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Check if user is active
        if ($user['status'] === 'Active') {
            // Verify password
            if ($password === $user['password']) {
                // Successful login
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect user to appropriate page
                if ($user['role'] === 'Admin') {
                    header('Location: admin/home.php');
                    exit();
                } elseif ($user['role'] === 'User') {
                    header('Location: user/home.php');
                    exit();
                }
            } else {
                showError('Incorrect password');
            }
        } else {
            showError('Your account is deactivated. Please contact your administrator.');
        }
    } else {
        showError('User not found');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Login</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
