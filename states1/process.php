<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database Connection
    $conn = new mysqli("localhost", "root", "", "leave_email");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and sanitize input
    $name = trim($_POST['name']);
    $roll_number = trim($_POST['roll_number']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);
    $reason = trim($_POST['reason']);
    $status = trim($_POST['status']);

    // Check for empty fields
    if (!$name || !$roll_number || !$email || !$start_date || !$end_date || !$reason || !$status) {
        die("Error: All fields are required.");
    }

    // ✅ Convert date to correct format (YYYY-MM-DD)
    $start_date = date("Y-m-d", strtotime($start_date));
    $end_date = date("Y-m-d", strtotime($end_date));

    // ✅ Validate date format
    if ($start_date > $end_date) {
        die("Error: Start date cannot be later than end date.");
    }

    // ✅ Check if leave request already exists
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM leave_requests WHERE roll_number = ? AND start_date = ? AND end_date = ?");
    $check_stmt->bind_param("sss", $roll_number, $start_date, $end_date);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        die("Error: A leave request for these dates already exists.");
    }

    // ✅ Insert Leave Request into Database
    $stmt = $conn->prepare("INSERT INTO leave_requests (name, roll_number, email, start_date, end_date, reason, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("sssssss", $name, $roll_number, $email, $start_date, $end_date, $reason, $status);

    if ($stmt->execute()) {
        echo "Leave request submitted successfully.";

        // ✅ EmailJS API Details
        $service_id = "service_q5a7w3d";  // Replace with your EmailJS Service ID
        $template_id = "template_wg5mb1d"; // Replace with your EmailJS Template ID
        $user_id = "HjQg0qWAAxJgTUDDA"; // Replace with your EmailJS Public Key

        // ✅ Email Data
        $email_data = [
            "service_id" => $service_id,
            "template_id" => $template_id,
            "user_id" => $user_id,
            "template_params" => [
                "to_email" => $email,  
                "to_name" => $name,
                "subject" => "Leave Request Notification",
                "message" => "Dear $name,\n\nYour leave request has been received.\n\n
                              Roll Number: $roll_number\n
                              Start Date: $start_date\n
                              End Date: $end_date\n
                              Reason: $reason\n
                              Status: $status\n
                              Expected return date: $end_date.\n\nThank you!"
            ]
        ];

        // ✅ Send Email via EmailJS API using cURL
        $ch = curl_init("https://api.emailjs.com/api/v1.0/email/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($email_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);

        if ($response) {
            echo " and email sent successfully.";
        } else {
            echo " but failed to send email. Error: " . $curl_error;
        }
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
