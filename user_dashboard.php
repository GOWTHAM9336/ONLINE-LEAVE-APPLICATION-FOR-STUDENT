<?php
session_start();

// Check if user is logged in and is a user
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: index.html"); // Redirect to login if not logged in or not user
    exit();
}

echo "Welcome, User! <br><a href='logout.php'>Logout</a>";
?>