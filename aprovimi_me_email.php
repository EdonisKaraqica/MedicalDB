<?php
require_once('mailing/PHPMailer-5.2.10/class.phpmailer.php');
require_once('mailing/PHPMailer-5.2.10/class.smtp.php');    //library added in download source.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sherbimimjeksor";


$conn = new mysqli($servername, $username, $password, $dbname);

$kid = $_GET['kidselect'];


$plotesuar = "SELECT plotesuar_nga FROM tblkerkesat WHERE kid=$kid";
$res = mysqli_query($conn, $plotesuar) or die("Error");

while ($row = mysqli_fetch_assoc($res)) {
    $plotesuar_nga = $row['plotesuar_nga'];

}

$email2 = "SELECT email FROM tblpacientatstaff WHERE pid=$plotesuar_nga";
$res1 = mysqli_query($conn, $email2) or die("Error");

while ($row = mysqli_fetch_assoc($res1)) {
    $email = $row['email'];

}

$msg = "Kerkesa juaj per pushim mjekesor eshte aprovuar!";
$subj = 'Aprovimi i Kerkeses';
$to = "sarakuqi94@gmail.com";
$from = 'medical.db2@gmail.com';
$name = 'MedicalDB';
//$body = $msg;


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

?>