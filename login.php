<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    header('Location: profile.php');
    exit;
}

// Check if the "Remember Me" cookie is set
if (isset($_COOKIE['email'])) {
    $rememberEmail = $_COOKIE['email'];
} else {
    $rememberEmail = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            background-color: rgba(148, 130, 201, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 400px;
            max-width: 90%;
            margin: auto;
            z-index: 1;
        }

        .btn-primary {
            align-items: center;
            background-image: linear-gradient(to right, #4e54c8, #8f94fb);
            border-color: #4e54c8;
            color: white;
            width: 340px;
            margin-top: 30px;
        }

        .btn-primary:hover {
            background-image: linear-gradient(to right, #8f94fb, #4e54c8);
            border-color: #4e54c8;
            color: white;
        }

        .form-check-label {
            font-weight: normal;
        }
    </style>
    <script src="script.js"></script>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <h1 class="text-center">Login Page</h1>
        <form id="loginForm" class="mt-4" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $rememberEmail; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="showPassword" onchange="togglePassword()">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div id="error" class="mt-3"></div>
    </div>
</body>

</html>