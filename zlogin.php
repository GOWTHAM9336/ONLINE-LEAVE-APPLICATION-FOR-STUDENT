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
$errorMessage = "";

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM student WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: index1.php"); // Redirect to user dashboard
            exit();
        } else {
            $errorMessage = "Invalid password.";
        }
    } else {
        $errorMessage = "Invalid username.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('login.avif') no-repeat center center/cover;
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 1.5s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 28px;
            color:white;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 20px;
            color:rgb(251, 249, 249);
            text-align: center;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input:hover, input:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #ff416c, #ff4b2b);
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            background: linear-gradient(90deg, #ff4b2b, #ff416c);
            transform: scale(1.05);
            box-shadow: 0px 0px 12px rgba(255, 75, 43, 0.8);
        }

        .error-message {
            color: #ff6b6b;
            margin-top: 10px;
            font-size: 15px;
        }

        p {
            color: #ecf0f1;
            margin-top: 20px;
        }

        a {
            color: #f1c40f;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="zlogin.php" method="POST">
            <b><label for="username">Username</label><b>
            <input type="text" id="username" name="username" placeholder="Enter username" required>

            <b><label for="password">Password</label><b>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <button type="submit" name="login">Login</button>

            <?php if (!empty($errorMessage)) { ?>
                <p class="error-message"><?php echo htmlspecialchars($errorMessage); ?></p>
            <?php } ?>
        </form>
        <p>Don't have an account? <a href="zregister.php">Sign up here</a></p>
    </div>
</body>
</html>
