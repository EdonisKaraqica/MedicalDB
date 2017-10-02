<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'sherbimimjeksor';
$connect=mysqli_connect($servername, $username, $password,$dbname);

$kid = $_GET['kidselect'];
//echo $_SESSION['CurrentUser'];
//echo $teksti;



$sql = "SELECT * from tblkerkesat where kid='" . $kid . "'";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_array($query);

//echo $result["kid"];

$pid=$result["pid"]; //useri per te cilin eshte bere kerkesa
$plotesuar_nga=$result["plotesuar_nga"]; //useri i cili e ka futur kerkesen(ndonje supervisor apo manager)
$data1 = $result["data1"]; //fillimi i pushimit
$data2 = $result["data2"]; //fundi i pushimit

$approved = $result["approved"]; //kjo duhet me u bo =1 kur doktori e bon aprovimin
echo $approved;



?>

<a href="www.google.com" onclick="alert('sdasd');">Inter</a>
