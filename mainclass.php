<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    
    <script>
        // JavaScript function for client-side validation
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            if (username === "" || password === "") {
                alert("Please fill in both fields.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST" onsubmit="return validateForm()">
            <input type="text" class="input-field" placeholder="Username" name="username" id="username" required>
            <input type="password" class="input-field" placeholder="Password" name="password" id="password" required>
            <button type="submit" class="button">Login</button>
        </form>
    </div>
</body> 
 -->

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script> <!-- FontAwesome -->

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            if (username === "" || password === "") {
                alert("Please fill in both fields.");
                return false;
            }
            return true;
        }

        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        function setRole(role) {
            document.getElementById("role").value = role;
            document.getElementById("loginForm").submit();
        }
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .password-container {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #555;
        }

        .button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
        }

        .admin-button {
            background-color: #d9534f;
        }

        .user-button {
            background-color: #5cb85c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" action="login.php" method="POST" onsubmit="return validateForm()">
            <input type="text" class="input-field" placeholder="Username" name="username" id="username" required>
            
            <div class="password-container">
                <input type="password" class="input-field" placeholder="Password" name="password" id="password" required>
                <i class="fas fa-eye eye-icon" id="eye-icon" onclick="togglePassword()"></i>
            </div>

            <input type="hidden" name="role" id="role">

            <button type="button" class="button admin-button" onclick="setRole('admin')">Admin Login</button>
            <button type="button" class="button user-button" onclick="setRole('user')">User Login</button>
        </form>
    </div>
</body>
</html>
