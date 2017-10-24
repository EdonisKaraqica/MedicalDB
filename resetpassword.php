<head>
    <style>
        .error-pos{
            top:0;
            margin-left: 500px;
            margin-top: 20px;
            color: red;
            position: absolute;
        }

    </style>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>

<?php
include('databaze.php');
$conn = new mysqli($servername, $username, $password, $dbname);
$email = $conn->real_escape_string($_REQUEST['email']);
$token = $conn->real_escape_string($_REQUEST['token']);
if (isset($_REQUEST['email']) && isset($_REQUEST['token'])) {

    $data = $conn->query("SELECT did FROM tbldoktoret WHERE email='$email' AND token='$token'");
    $data2 = $conn->query("SELECT pid FROM tblpacientatstaff WHERE email='$email' AND token='$token'");
    if (($data->num_rows > 0) || ($data2->num_rows >0)) {
        include('reset-form.php');
        if (isset($_POST['resetPass'])) {
            $password = $_POST["password"];
            $password_conf = $_POST['password-conf'];
            if (empty($password) || empty($password_conf)) {
               die("<p class='error-pos alert alert-error'>Please fill out the form!</p>");
            } elseif ($password !== $password_conf) {
                die("<p class='error-pos alert alert-error'>Password doesn't match Password Confirmation!");
            } else {
                $password = md5($password);

               // $conn->query("UPDATE tbldoktoret SET hashedpwd='$password', token='' WHERE email='$email'");
                $conn->query("UPDATE tblpacientatstaff SET hashedpwd='$password', token='' WHERE email='$email'");
                echo "<p>Successfully updated your password!</p>";
            }


        }
    } else {

        echo "<p class='error-pos alert alert-error'>Please check your link and update your password!</p>";

    }
} else {

    header("Location: login.php");
    exit();
}
?>