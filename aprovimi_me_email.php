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
$fillimi8=$_SESSION['fillimi8'];
$mbarimi8=$_SESSION['mbarimi8'];
$emriE=$_SESSION['emriE'];
$mbiemriE=$_SESSION['mbiemriE'];


$msg = "Përshëndetje i/e nderuar,<br/><br/>";
$msg = "Kerkesa juaj per pushim mjekesor eshte aprovuar! <br>Emri dhe mbiemri:".$emriE." ".$mbiemriE."<br>Data e fillimit: ".$fillimi8."<br>Data e mbarimit: ".$mbarimi8;
$msg .= "<br/><br/>Ky mesazh eshte mesazh i automatizuar, andaj ju lusemi te mos ktheni pergjigje ne kete e-mail!<br/><br/>";
$msg .= "<br>Dear Medical System user,<br/><br/>";
$msg .= "Your request for medical leave has been approved by the Medical Staff!<br/> First name & Last name: " . $emriE . " " . $mbiemriE . "<br>Start Date: " . $fillimi8 . "<br>End Date: " . $mbarimi8;
$msg .= "<br/><br/>This message is an automated message, so please do not reply to this e-mail!<br/><br/>";
$subj = 'Aprovimi i Kerkeses';
$to = $email;
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

smtpmailer($to, $from, $name, $subj, $msg);

?>
