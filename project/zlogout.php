<?php
session_start();
session_destroy();
header("Location: zlogin.php");
exit();
?>
