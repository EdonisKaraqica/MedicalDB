<?php
require_once 'C:\Windows\SysWOW64\vendor\autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";


$conn = new mysqli($servername, $username, $password, $dbname);

$kid=$_GET['kidselect'];


$plotesuar = "SELECT plotesuar_nga FROM tblkerkesat WHERE kid=$kid";
$res=mysqli_query($conn,$plotesuar) or die( "Error");

while ($row=mysqli_fetch_assoc($res))
{
    $plotesuar_nga=$row['plotesuar_nga'];

}

$email2 = "SELECT email FROM tblpacientatstaff WHERE pid=$plotesuar_nga";
$res1=mysqli_query($conn,$email2) or die( "Error");

while ($row=mysqli_fetch_assoc($res1))
{
    $email=$row['email'];

}




// $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
// ->setUsername('ek1555a@gmail.com')
// ->setPassword('fiek123456A');

// $mailer = new Swift_Mailer($transport);
// $url = "Kerkesa juaj per pushim mjekesor eshte aporovuar";
// $message = (new Swift_Message('Aprovimi i kerkeses per pushim mjekesor'))
// ->setFrom(['medical.db2@gmail.com' => 'noreply@limak.medical'])
// ->setTo("edoniskaraqica@gmail.com")
// ->setBody('$url');

// $result = $mailer->send($message);

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername('medical.db2@gmail.com')
  ->setPassword('limakasi202A')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Kerkesa per pushim mjeksor'))
  ->setFrom(['ek1555a@gmail.com' => 'noreply@medical.db'])
  ->setTo($email)
  ->setBody('Kerkesa juaj per pushim mjeksor eshte aprovuar!')
  ;

// Send the message
$result = $mailer->send($message);

?>