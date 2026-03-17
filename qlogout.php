<?php
session_start();
session_destroy();
header("Location: admindashboard.html");
exit();
?>
