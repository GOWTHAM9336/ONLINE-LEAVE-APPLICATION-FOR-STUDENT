<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $roll_no = $_POST['roll_no'];
    $dept_email = $_POST['dept_email'];
    $user_email = $_POST['user_email'];
    $ava_leave = $_POST['ava_leave'];
    $department = $_POST['department'];
    $class_name = $_POST['class_name'];
    $section_name = $_POST['section_name'];
    $leave_type = $_POST['leave_type'];
    $start_date = $_POST['startDate'];
    $end_date = $_POST['endDate'];
    $reason = $_POST['reason'];

    // Check if roll number exists in login count table
    $checkQuery = "SELECT login_count FROM roll_number_logins WHERE roll_no = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("i", $roll_no);
    $stmt->execute();
    $stmt->bind_result($login_count);
    $stmt->fetch();
    $stmt->close();

    if ($login_count >= 10) {
        echo "<script>
                alert('Login limit reached! You cannot submit more applications.');
                window.location.href='leaveform.php';
              </script>";
        exit();
    }

    // Insert leave application
    $insertQuery = "INSERT INTO leave_applications (fullname, roll_no, dept_email, user_email, ava_leave, department, class_name, section_name, leave_type, start_date, end_date, reason) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sissssssssss", $fullname, $roll_no, $dept_email, $user_email, $ava_leave, $department, $class_name, $section_name, $leave_type, $start_date, $end_date, $reason);
    
    if ($stmt->execute()) {
        // Increment login count
        if ($login_count === null) {
            $insertLogin = "INSERT INTO roll_number_logins (roll_no, login_count) VALUES (?, 1)";
            $stmt2 = $conn->prepare($insertLogin);
            $stmt2->bind_param("i", $roll_no);
            $stmt2->execute();
            $stmt2->close();
        } else {
            $updateLogin = "UPDATE roll_number_logins SET login_count = login_count + 1 WHERE roll_no = ?";
            $stmt2 = $conn->prepare($updateLogin);
            $stmt2->bind_param("i", $roll_no);
            $stmt2->execute();
            $stmt2->close();
        }

        echo "<script>
                alert('Leave Application Submitted Successfully');
                window.location.href='leaveform.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
