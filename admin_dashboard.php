<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.html"); // Redirect to login if not logged in or not admin
    exit();
}

echo "Welcome, Admin! <br><a href='logout.php'>Logout</a>";
?>