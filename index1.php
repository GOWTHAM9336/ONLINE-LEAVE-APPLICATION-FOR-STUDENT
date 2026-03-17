<?php
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: zindex.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

// Auto logout after 30 minutes of inactivity
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Website</title>
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Sidebar Navigation */
        nav {
            width: 220px;
            background: #2c3e50;
            position: fixed;
            height: 100%;
            padding-top: 20px;
            color: white;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            padding: 15px;
            transition: background 0.3s ease-in-out;
        }
        nav ul li:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #f1c40f;
        }
        nav ul li a i {
            margin-right: 10px;
        }
        .logout {
            color: #e74c3c;
            font-weight: bold;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Main Content */
        .main {
            margin-left: 220px;
            padding: 20px;
            width: calc(100% - 240px);
            background: url('clg.jpeg') no-repeat center center/cover;
            min-height: 100vh;
            color: white;
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Overlay for better contrast */
        .main::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        /* Glowing Text Animation */
        .clg {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            color: #f1c40f;
            text-shadow: 0 0 10px #f1c40f, 0 0 20px #f1c40f;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #f1c40f; }
            to { text-shadow: 0 0 20px #f1c40f; }
        }

        /* Facilities Section */
        .fac {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .h22 {
            font-size: 24px;
            font-weight: bold;
            color: #f1c40f;
            margin-bottom: 10px;
        }
        .fac ul {
            list-style-type: none;
            padding-left: 0;
        }
        .fac ul li {
            font-size: 18px;
            color: #ecf0f1;
            margin-bottom: 5px;
        }

        /* Image Marquee */
        .marquee {
            overflow: hidden;
            white-space: nowrap;
            margin-top: 20px;
            position: relative;
            width: 100%;
        }
        .imgs {
            display: flex;
            gap: 15px;
            animation: scroll-images 15s linear infinite;
        }
        .imgs img {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }
        .imgs img:hover {
            transform: scale(1.1);
        }

        @keyframes scroll-images {
            from { transform: translateX(0%); }
            to { transform: translateX(-100%); }
        }

        /* Scrolling Text */
        .scrolling-text {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            margin-top: 20px;
        }
        .scrolling-text h2 {
            display: inline-block;
            padding-left: 100%;
            color: #f1c40f;
            animation: scroll-left 10s linear infinite;
        }
        @keyframes scroll-left {
            from { transform: translateX(100%); }
            to { transform: translateX(-100%); }
        }

        /* NEW Badge Effect */
.new-badge {
    font-weight: bold;
    font-size: 14px;
    padding: 2px 6px;
    margin-left: 8px;
    text-transform: uppercase;
    background: linear-gradient(45deg, red, orange, yellow, magenta, red);
    background-size: 200% 200%;
    color: white;
    border-radius: 5px;
    display: inline-block;
    font-family: Arial, sans-serif;
   
    animation: glowText 1.5s infinite alternate, bgMove 2s linear infinite, bounce 1.2s infinite;
}

/* Glowing Effect */
@keyframes glowText {
    0% { text-shadow: 0 0 5px rgba(255, 0, 0, 0.8); }
    100% { text-shadow: 0 0 12px rgba(255, 255, 0, 1); }
}

/* Moving Gradient Background */
@keyframes bgMove {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}

/* Bounce Effect */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-3px); }
}



    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <nav> <div id="message" >
                <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
                <p>You are logged in as: <strong><?php echo ucfirst(htmlspecialchars($role)); ?></strong></p>
            </div>
            <ul>
                <li>
                    <a href="#" class="logo">
                        <img src="logo1.jpeg" alt="College Logo" width="40">
                        <b><span class="nav-item" style="font-size: 24px;">Student</span></b>

                    </a>
                </li>

                <li><a href="index1.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
                <li><a href="contact.php"><i class="fas fa-phone"></i> Contact</a></li>
                <li>
    <a href="leaveform.php">
        <i class="fas fa-edit"></i> Leave Form
        <span class="new-badge">NEW</span>
    </a>
</li>


                <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
            
        </nav>

        <!-- Main Content -->
        <section class="main">
            <b><h1 class="clg">K.M.G. College of Arts and Science
            (Autonomous)</h1></b>

           
           
           
        </section>
    </div>

    <script>
        setTimeout(() => {
            var msg = document.getElementById("message");
            if (msg) msg.style.display = "none";
        }, 5000);
    </script>
</body>
</html>
