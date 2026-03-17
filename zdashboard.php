<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: zlogin.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="zstyle.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        <p>You are logged in as: <strong><?php echo ucfirst($role); ?></strong></p>
        <a href="zlogout.php">Logout</a>
    </div>
</body>
</html>
