<!-- <?php
session_start();

// Database credentials
$host = 'localhost'; // Change if needed
$db = 'login_system';
$user = 'root'; // Change to your DB username
$pass = ''; // Change to your DB password

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = SHA2($_POST['password']); // MD5 is used here for simplicity; use password_hash in production!

    // SQL query to check credentials
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row matches
    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Set session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: http://localhost/phpmyadmin/");
        } else {
            header("Location:index1.php");
        }
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='index.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?> -->
