<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            align-items: center;
            background-image: linear-gradient(to right, #4e54c8, #8f94fb);
            border-color: #4e54c8;
            color: white;
            width: 340px;
        }

        .btn-primary:hover {
            background-image: linear-gradient(to right, #8f94fb, #4e54c8);
            border-color: #4e54c8;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Profile Page</h1>
        <p>Your email: <?php echo $_SESSION['loggedIn']; ?></p>
        <p class="text-center">You are logged in.</p>
        <div class="text-center">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
</body>

</html>
