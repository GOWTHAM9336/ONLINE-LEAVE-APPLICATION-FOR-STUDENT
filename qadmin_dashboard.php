<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: qadmin_login.php");
    exit();
}

include 'qdb_connect.php'; // Database connection

// Fetch leave applications
$query = "SELECT * FROM leave_applications ORDER BY submission_time DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="qstyle.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Roll No</th>
                <th>Department</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Submission Time</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['roll_no']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['leave_type']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['reason']; ?></td>
                <td><?php echo $row['submission_time']; ?></td>
            </tr>
            <?php } ?>
        </table>
      
<button onclick="goBack()">Back to Previous Page</button>



    </div>
</body>
<script>
function goBack() {
    window.history.back();
}
</script>
</html>
