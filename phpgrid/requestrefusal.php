<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);

$user = $_SESSION['CurrentUser'];

if(isset($_GET['id']))
{
$kid = $_GET['id'];

$sql = "UPDATE tblkerkesat set shqyrtuar=1, approved=0 where kid=" . $kid;

if(!mysqli_query($conn,$sql)){
  echo "Ndryshimi i tentuar ka deshtuar te behet ne databaze. Kontaktoni me administratorin per kete problem!";
}


echo '<script language="javascript">';
echo 'alert("Kerkesa per pushim eshte refuzuar!")';
echo '</script>';

echo '<script language="javascript">';
echo 'javascript:history.back();';
echo '</script>';

die();

}
?>
