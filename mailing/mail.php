<?php
    require_once('PHPMailer-5.2.10/class.phpmailer.php');
	require_once('PHPMailer-5.2.10/class.smtp.php');	//library added in download source.
    $msg  = 'Hello World';
    $subj = 'test mail message';
    $to   = 'edoniskaraqica@gmail.com';
    $from = 'medical.db2@gmail.com';
    $name = 'My Name';
 
    echo smtpmailer($to,$from, $name ,$subj, $msg);
 
    function smtpmailer($to, $from, $from_name = 'Example.com', $subject, $body, $is_gmail = true)
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
        if($is_gmail)
        {
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;  
            $mail->Username = 'medical.db2@gmail.com';  
            $mail->Password = 'limakasi202A';   
        }
        else
        {
            $mail->Host = 'smtp.mail.google.com';
            $mail->Username = 'medical.db2@gmail.com';  
            $mail->Password = 'limakasi202A';   
        }
        $mail->IsHTML(true);
        $mail->From="admin@example.com";
        $mail->FromName="Example.com";
        $mail->Sender=$from; // indicates ReturnPath header
        $mail->AddReplyTo($from, $from_name); // indicates ReplyTo headers
        $mail->AddCC('cc@site.com.com', 'CC: to site.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error = 'Mail error: '.$mail->ErrorInfo;
            return true;
        }
        else
        {
            $error = 'Message sent!';
            return false;
        }
    }
?>