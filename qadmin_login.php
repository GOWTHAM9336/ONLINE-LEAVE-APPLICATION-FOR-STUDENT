<?php
session_start();
include 'qdb_connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check admin credentials
    $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admindashboard.html");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgb(184, 225, 33), #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        body {
    font-family: 'Poppins', sans-serif;
    background: url('admin.jpg') no-repeat center center/cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}





        .login-container {
            background: rgba(101, 180, 111, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 380px;
            text-align: center;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 1px;
            color: #fff;
            text-transform: uppercase;
        }

        /* Input Group - Floating Labels & Neon Glow */
        .input-group {
    position: relative;
    margin-bottom: 20px;
    text-align: center;
    display: flex;
    flex-direction: column-reverse; /* Moves label below input */
    align-items: center;
}

.input-group label {
    font-size: 20px;
    color: rgba(246, 246, 246, 0.8);
    margin-top: 5px; /* Moves label below input field */
    text-align: center;
}

.input-group input {
    width: 90%;
    padding: 16px;
    font-size: 18px;
    border: 2px solid rgba(207, 230, 9, 0.2);
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.15);
    color: white;
    outline: none;
    text-align: center;
    transition: all 0.3s ease-in-out;
}

.input-group input:focus {
    border-color: #00ff7f;
    box-shadow: 0px 0px 10px #00ff7f;
    background: rgba(255, 255, 255, 0.2);
}


        /* Login Button - Animated Gradient & Glow */
       /* Updated Login Button - Green Themed */
       button {
    width: 80%; /* Reduced width */
    padding: 12px; /* Smaller padding */
    background: linear-gradient(45deg, #00b894, #00ff7f); /* Green gradient */
    color: white;
    border: none;
    border-radius: 10px; /* Slightly smaller border radius */
    font-size: 16px; /* Smaller font */
    font-weight: bold;
    cursor: pointer;
    transition: all 0.4s ease-in-out;
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0px 4px 12px rgba(0, 255, 127, 0.3);
}

button:hover {
    box-shadow: 0px 0px 15px rgba(0, 255, 127, 0.8);
    transform: scale(1.03); /* Slight hover effect */
}

button::before {
    content: "";
    position: absolute;
    top: -100%;
    left: -100%;
    width: 250%;
    height: 250%;
    background: rgba(255, 255, 255, 0.15);
    transform: rotate(45deg);
    transition: all 0.4s ease;
}

button:hover::before {
    top: 0%;
    left: 0%;
}

        /* Error Message */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <h2 style="color:rgba(0, 255, 127, 0.8);">Admin Login</h2>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder=" " required>
               <b> <label>Username</label><b>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder=" " required>
                <b><label>Password</label><b>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
    </div>
</body>
</html>
