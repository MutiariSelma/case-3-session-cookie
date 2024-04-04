<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and password from the request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password match the database
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($storedEmail, $storedPassword) = explode(':', $user);
        if ($email === $storedEmail && $password === $storedPassword) {
            // Start the session and set the loggedIn flag
            session_start();
            $_SESSION['loggedIn'] = true;
            echo 'success';
            exit;
        }
    }

    // If the email and password don't match, return an error
    echo 'error';
} else {
    // If the request is not a POST request, return an error
    echo 'error';
}