<?php
session_start();
if (isset($_SESSION["CurrentUser"])) {
    header("Location: mdl-template-dashboard/home.php");
} else {
    header("Location: login.php");
}

?>