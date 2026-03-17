<?php
// Database Connection
$host = "localhost"; // Change if necessary
$user = "root"; // Your DB username
$password = ""; // Your DB password
$database = "leave_email"; // Your DB name

$conn = new mysqli($host, $user, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and Validate Input
$name = trim($_POST['name']);
$roll_number = trim($_POST['roll_number']);
$email = trim($_POST['email']);
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$reason = trim($_POST['reason']);
$status = $_POST['status']; // Capture the approval status

if (empty($name) || empty($roll_number) || empty($email) || empty($start_date) || empty($end_date) || empty($reason) || empty($status)) {
    die("Error: All fields are required.");
}

// Check if the roll number has exceeded the leave request limit (e.g., 10 times)
$checkLimitQuery = "SELECT COUNT(*) AS leave_count FROM leave_requests WHERE roll_number = ?";
$stmt = $conn->prepare($checkLimitQuery);
$stmt->bind_param("s", $roll_number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['leave_count'] >= 10) {
    die("Error: You have reached the maximum leave request limit.");
}

// Insert Leave Request into Database
$insertQuery = "INSERT INTO leave_requests (name, roll_number, email, start_date, end_date, reason, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("sssssss", $name, $roll_number, $email, $start_date, $end_date, $reason, $status);

if ($stmt->execute()) {
    echo "Success: Leave request submitted with status: $status";
} else {
    echo "Error: " . $stmt->error;
}

// Close Connection
$stmt->close();
$conn->close();
?>
