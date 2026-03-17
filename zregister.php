<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Secure password hashing
    $role = 'user'; // Default role is 'user'

    // Check if username already exists
    $checkUser = $conn->prepare("SELECT * FROM student WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows > 0) {
        $errorMessage = "Username already exists. Please choose a different one.";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO student (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $role);
        
        if ($stmt->execute()) {
            header("Location: zlogin.php"); // Redirect to login page after successful registration
            exit();
        } else {
            $errorMessage = "Registration failed. Please try again.";
        }
        $stmt->close();
    }
    $checkUser->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Register</h1>
    <form action="zregister.php" method="POST">
        
        <div class="input-box">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>

        <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" name="register">Register</button>

        <?php if (isset($errorMessage)) { ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php } ?>
    </form>
    <p>Already have an account? <a href="zlogin.php">Login here</a></p>
</div>

</body>
<style>
/* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, rgb(25, 218, 131), #2a5298);
    overflow: hidden;
    color: #fff;
}

body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('register1.avif') no-repeat center center/cover;
            overflow: hidden;
        }

/* Container */
.container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    padding: 35px;
    width: 380px;
    text-align: center;
    border-radius: 14px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    animation: float 3s infinite ease-in-out;
}

/* Floating Animation */
@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-8px);
    }
}

/* Heading */
h1 {
    font-weight: 600;
    margin-bottom: 20px;
}

/* Input Fields */
.input-box {
    margin-bottom: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
}

input {
    width: 100%;
    padding: 12px;
    border: none;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 16px;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
    outline: none;
    transition: all 0.4s;
    border-radius: 4px;
}

input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

input:focus {
    border-bottom: 2px solid #f1c40f;
}

/* Button */
button {
    width: 100%;
    padding: 12px;
    border: none;
    background: linear-gradient(90deg, #ff416c, #ff4b2b);
    color: white;
    font-size: 17px;
    font-weight: 600;
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.4s ease-in-out;
}

button:hover {
    background: linear-gradient(90deg, #ff4b2b, #ff416c);
    transform: scale(1.05);
    box-shadow: 0px 0px 12px rgba(255, 75, 43, 0.8);
}

/* Error Message */
.error-message {
    color: #ff6b6b;
    margin-top: 10px;
    font-size: 14px;
}

/* Links */
p {
    margin-top: 15px;
    color: #ecf0f1;
}

a {
    color: #f1c40f;
    text-decoration: none;
    font-weight: 600;
}

a:hover {
    text-decoration: underline;
}

/* Background Animation */
@keyframes moveLines {
    from {
        transform: translateY(-100%);
    }
    to {
        transform: translateY(100%);
    }
}

.lines {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}

.lines span {
    position: absolute;
    width: 4px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    animation: moveLines 8s linear infinite;
}

.lines span:nth-child(1) {
    left: 10%;
    animation-duration: 6s;
}
.lines span:nth-child(2) {
    left: 30%;
    animation-duration: 8s;
}
.lines span:nth-child(3) {
    left: 50%;
    animation-duration: 10s;
}
.lines span:nth-child(4) {
    left: 70%;
    animation-duration: 6s;
}
.lines span:nth-child(5) {
    left: 90%;
    animation-duration: 9s;
}
</style>
</html>
