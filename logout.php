<?php
// Start the session
session_start();

// Unset the loggedIn flag and destroy the session
unset($_SESSION['loggedIn']);
session_destroy();

// Redirect to the login page
header('Location: login.php');
exit;