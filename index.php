<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Website</title>
    <!-- <link rel="stylesheet" href="zindex.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif; /* body code */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh; /* Full viewport height */
    background: url('image/clg.jpeg') no-repeat center center/cover;
    background-attachment: fixed; /* Keeps the background fixed while scrolling */
    display: flex;
    flex-direction: column;
}


        /* Navbar Styling */
        .container_nav {
            background: #333;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 200px;
        }

        nav ul li {
            display: inline;
            
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        /* Navbar hover effect */
        nav ul li a::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 2px;
            background: #ff3366;
            transition: all 0.3s ease-in-out;
        }

        nav ul li a:hover {
            color: #ff3366;
        }

        nav ul li a:hover::after {
            width: 100%;
            left: 0;
        }

        /* Courses Section */
        .courses-container {
            text-align: center;
            padding: 40px;
            margin-top:190px;
            margin-bottom: 50px;
        }

        .courses-container h2 {
    font-size: 35px;
    font-weight: bold;
    color: rgb(182, 225, 11);
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    position: relative;
    display: inline-block;
    animation: bounce 2s infinite, colorChange 3s infinite alternate;
}

/* Underline Effect */
.courses-container h2::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 100%;
    height: 4px;
    background: rgb(182, 225, 11);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s ease-in-out;
}

/* Hover Effect for the Underline */
.courses-container h2:hover::after {
    transform: scaleX(1);
}

/* Bounce Animation */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Color Change Animation */
@keyframes colorChange {
    0% {
        color: rgb(182, 225, 11);
    }
    50% {
        color: rgb(255, 99, 71);
    }
    100% {
        color: rgb(0, 191, 255);
    }
}


        /* Fade-in effect for courses */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .courses-boxes {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        .course-box {
            background-color: #f0f9ff;
            padding: 20px;
            width: 250px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-box:nth-child(2), .course-box:nth-child(3) {
            background-color: #ffffcc;
        }

        .course-box h3 {
            font-size: 20px;
            color: #ff3366;
        }

        .course-box p {
            font-size: 14px;
            color: #0056b3;
        }

        .course-box i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Hover Effect */
        .course-box:hover {
            transform: scale(1.05);
            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 110px;
            left: 20px;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            background-color: #25D366;
            animation: bounce 1.5s infinite ease-in-out;
        }

        .whatsapp-float img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        /* WhatsApp Button Animation */
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        header {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #25D366;
    padding: 10px;
    position: relative;
}

.logo-container {
    position: absolute;
    left: 5px;
}

.college-logo {
    width: 130px; /* Adjust size */
    height: auto;
}
/* Ensures the body takes full height */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

/* Main container to push footer down */
.main-content {
     /* Adjust based on footer height */
    display: flex;
    flex-direction: column;
}

/* Footer styling */
footer {
    margin top: 500px;
    background-color:rgb(47, 197, 144);
    color: white;
    text-align: center;
    padding: 15px;

    position: relative;
    bottom: 0;
    width: 100%;
}




    </style>
</head>
<body>

<header>
    <div class="logo-container">
        <img src="logo3.png" alt="College Logo" class="college-logo">
    </div>
    <h1>K.M.G College Of Arts And Science (Autonomous)<br>
        Ammananaguppam, Gudiyattam, Vellore Dt - 635 803.
    </h1>
</header>

        </section>

        <nav class="container_nav">
            <ul>
                
                <li><a href="zindex.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="zabout.php"><i class="fas fa-info-circle"></i> About</a></li>
                <li><a href="zcontact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                <li><a href="qadmin_login.php" class="btn"><i class="fas fa-user-shield"></i> Admin Login</a></li>
                <li><a href="zlogin.php" class="btn"><i class="fas fa-user"></i> User Login</a></li>
            </ul>
        </nav>

        <div class="bg">
            
        </div>

        <!-- Courses Categories Section -->
        <div class="courses-container">
            <h2>Courses Categories</h2>
            <div class="courses-boxes">
                <div class="course-box">
                    <i class="fas fa-user-graduate"></i>
                    <h3>UG Courses</h3>
                    <p>The college offers various Undergraduate Programs</p>
                </div>
                <div class="course-box">
                    <i class="fas fa-user-graduate"></i>
                    <h3>PG Courses</h3>
                    <p>The college offers various Postgraduate Programs</p>
                </div>
                <div class="course-box">
                    <i class="fas fa-user-graduate"></i>
                    <h3>Ph.D Programme</h3>
                    <p>The college offers various Research Programs</p>
                </div>
                <div class="course-box">
                    <i class="fas fa-university"></i>
                    <h3>Why Choose Us</h3>
                    <p>The teaching staff is dedicated, experienced, and highly skilled.</p>
                </div>
            </div>
        </div>
       


        <!-- WhatsApp Floating Button -->
        <a href="https://wa.me/916369367880" target="_blank" class="whatsapp-float">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo">
        </a>

    </div>
    <div class="main-content">
    <!-- Your page content here -->
</div>

<footer>
    <marquee class="marque" behavior="scroll" direction="left" scrollamount="3">
        <div style="color: yellow;">
            The Best Educated Courses in Various Categories || The Best Educated Courses in Various Categories ||
            The Best Educated Courses in Various Categories || The Best Educated Courses in Various Categories
        </div>
    </marquee>
    <p>&copy; 2025 K.M.G. COLLEGE OF ARTS AND SCIENCE  All rights reserved.</p>
</footer>
</body>


</html>
