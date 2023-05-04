<?php
session_start();
$_SESSION['user_login'] = "";
header("location:login.php");


?>