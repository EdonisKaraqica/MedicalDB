<?php
session_start();
?>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>
<?php
$passwordi = "";
$passwordiErr = $nameErr = "";
require_once 'C:\Windows\SysWOW64\vendor\autoload.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<div class="alignment">
    <img src="raportet/limak_logo.png" alt="Mountain View" style="width:400px;height:100px;">
</div>

<p class="alignment" style="color:#336699;font-weight:bold;">LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C</p>
<p class="alignment">Sherbimi Mjekesor/Medical Service</p>
<div class="wrapper">
    <form method="post" action="forgotpassword.php" class="form-signin">
        <h4 class="form-signin-heading">Forgot password</h4>
        Email <input type="email" class="form-control" name="email" placeholder="Email">
        <br>


        <input type="submit" class="btn btn-primary btn-block" name="forgotPass" value="Request Password">

        <?php
        require_once 'C:\Windows\SysWOW64\vendor\autoload.php';
        if (isset($_POST['forgotPass'])) {
            include('databaze.php');
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $email = $conn->real_escape_string($_POST['email']);
            $data = $conn->query("SELECT did FROM tbldoktoret WHERE email='$email'");
            if ($data->num_rows > 0) {


                $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
                $str = str_shuffle($str);
                $str = substr($str, 0, 20);
                $url = "Please click the link to reset your password:
                        http://localhost/MedicalDB/resetpassword.php?token=$str&email=$email";

                //mail($email,"Reset your Password", "To reset your password please visit this: $url","From: noreply@medicaldb.com\r\n");

                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername('medical.db2@gmail.com')
                    ->setPassword('limakasi202A');

                // Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message('Password recovery'))
                    ->setFrom(['medical.db2@gmail.com' => 'noreply@limak.medical'])
                    ->setTo($email)
                    ->setBody($url);

               // Send the message
                $result = $mailer->send($message);

                $conn->query("UPDATE tbldoktoret SET token='$str' WHERE email='$email'");
                echo "Please check your email!";
            } else {
                echo "Please check your inputs!";
            }
        }
        ?>
    </form>

</div>
