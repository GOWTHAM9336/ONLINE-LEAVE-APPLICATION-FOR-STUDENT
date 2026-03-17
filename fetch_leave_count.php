<?php
include 'db_connect.php';

if (isset($_POST['roll_no'])) {
    $roll_no = $_POST['roll_no'];
    
    // Query to count leave applications for the given roll number
    $query = "SELECT COUNT(*) as total_leaves FROM leave_applications WHERE roll_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $roll_no);
    $stmt->execute();
    $stmt->bind_result($total_leaves);
    $stmt->fetch();
    $stmt->close();

    $max_leaves = 10;  // Maximum leave limit
    $available_leaves = $max_leaves - $total_leaves;

    echo json_encode(["available_leaves" => $available_leaves]);
}
?>
