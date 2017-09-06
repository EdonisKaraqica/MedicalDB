<?php
session_start();
unset($_SESSION["CurrentUser"]);
header('location:login.php');

?>