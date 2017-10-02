<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);
$perdoruesi = $_SESSION["CurrentUser"];


$perdoruesisql = "select pid,departamenti,njesia,manager,supervisor from tblpacientatstaff where username='" . $perdoruesi ."'";
$result = mysqli_query($conn, $perdoruesisql);
$pidplotesuesi = mysqli_fetch_array($result);

//me CAPITAL = perdoruesi i programit
$plotesuar_nga = $pidplotesuesi["pid"];
$A_ESHTE_MANAGER = $pidplotesuesi["manager"];
$A_ESHTE_SUPERVISOR = $pidplotesuesi["supervisor"];
$USR_DEPT = $pidplotesuesi["departamenti"];
$USR_NJESIA = $pidplotesuesi["njesia"];

echo $plotesuar_nga = $pidplotesuesi["pid"];
echo $A_ESHTE_MANAGER = $pidplotesuesi["manager"];
echo $A_ESHTE_SUPERVISOR = $pidplotesuesi["supervisor"];
echo $USR_DEPT = $pidplotesuesi["departamenti"];
echo $USR_NJESIA = $pidplotesuesi["njesia"];

if($USR_DEPT == "ICT"){
  echo '<script language="javascript">';
  echo 'alert("safasfasf!")';
  echo '</script>';
}
else{
  echo '<script language="javascript">';
  echo 'alert("Kerkesa NUK eshte regjistruar!")';
  echo '</script>';
}


//me lowercase = puntori per tcilin behet kerkesa
$pid = $_SESSION["pid"];
//echo $_GET["id"];
$pemri = $_SESSION["emri"];
$pmbiemri = $_SESSION["mbiemri"];
$pdept = $_POST["departamenti"];
$pnjesia = $_POST["njesia"];




$arsyetimi = $_POST["arsyetimi"];
$data1 = $_POST["dataprej"];
$data2 = $_POST["dataderi"];

//echo $arsyetimi . "<br>";
//echo $data1 . "<br>";
//echo $data2 . "<br>";

$sql = "INSERT into tblkerkesat(pid, plotesuar_nga, data1, data2, approved, arsyetimi)
        VALUES ('" . $pid . "','" . $plotesuar_nga . "','" . $data1 . "','" . $data2 . "','0','" . $arsyetimi . "')";

if(mysqli_query($conn,$sql)){
  echo '<script language="javascript">';
  echo 'alert("Kerkesa eshte regjistruar me sukses!")';
  echo '</script>';
}
else{
  echo '<script language="javascript">';
  echo 'alert("Kerkesa NUK eshte regjistruar!")';
  echo '</script>';
}



?>
