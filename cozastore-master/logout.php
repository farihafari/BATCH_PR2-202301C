<?php
session_start();
unset($_SESSION['userEmail']);
echo "<script>location.assign('index.php')</script>";
?>