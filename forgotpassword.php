<?php
session_start();
?>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<?php
require_once('mailing/PHPMailer-5.2.10/class.phpmailer.php');
require_once('mailing/PHPMailer-5.2.10/class.smtp.php');    //library added in download source.
$passwordi = "";
$passwordiErr = $nameErr = "";

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
        if (isset($_POST['forgotPass'])) {
            include('databaze.php');
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $email = $conn->real_escape_string($_POST['email']);

            $data = $conn->query("SELECT did FROM tbldoktoret WHERE email='$email'");

            $data2= $conn->query("SELECT pid FROM tblpacientatstaff WHERE email='$email'");


            if (($data->num_rows > 0) || ($data2->num_rows >0)) {


                $str = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
                $str = str_shuffle($str);
                $str = substr($str, 0, 20);

                $url = "Please click the link to reset your password:
                        http://pmu1/MedicalDB/resetpassword.php?token=$str&email=$email";


                $msg = "To reset your password please visit this: $url";
                $subj = 'Reset your Password';
                $to = $email;
                $from = 'medical.db2@gmail.com';
                $name = 'MedicalDB';
                $body = $url;=======


                function smtpmailer($to, $from, $from_name = 'MedicalDB', $subject, $body, $is_gmail = true)
                {
                    global $error;
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    if ($is_gmail) {
                        $mail->SMTPSecure = 'ssl';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->Username = 'medical.db2@gmail.com';
                        $mail->Password = 'limakasi202A';
                    } else {
                        $mail->Host = 'smtp.mail.google.com';
                        $mail->Username = 'medical.db2@gmail.com';
                        $mail->Password = 'limakasi202A';
                    }
                    $mail->IsHTML(true);
                    $mail->From = "noreply@medical.db";
                    $mail->FromName = "noreply@medical.db";
                    $mail->Sender = $from; // indicates ReturnPath header
                    $mail->AddReplyTo($from, $from_name); // indicates ReplyTo headers
//        $mail->AddCC('cc@site.com.com', 'CC: to site.com');
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->AddAddress($to);
                    if (!$mail->Send()) {
                        $error = 'Mail error: ' . $mail->ErrorInfo;
                        return true;
                    } else {
                        $error = 'Message sent!';
                        return false;
                    }
                }

                echo smtpmailer($to, $from, $name, $subj, $msg);

                $conn->query("UPDATE tbldoktoret SET token='$str' WHERE email='$email'");
                $conn->query("UPDATE tblpacientatstaff SET token='$str' WHERE email='$email'");
                echo "Please check your email!";
            } else {
                echo "Please check your inputs!";
            }
        }
        ?>
    </form>

</div>
