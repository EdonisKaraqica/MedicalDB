<?php 

include("databaze.php");
$numri=$_POST['nrBarnave'];
$emri=$_POST['emriIlacit'];

$sql120="UPDATE tblstocks SET sasia = sasia - ".$numri." WHERE `emri` = '$emri'";
 $res13=mysqli_query($conn,$sql120) or die( "Error");
   //       while ($row1=mysqli_fetch_assoc($res13)) 
   // { 
   //    $barcode=$row1[ 'barcode']; 
   //    $emriBarnes=$row1['emri'];
   //    $sasia=$row1[ 'sasia']; 
   //    $data_prodhimit=$row1['data_prodhimit'];
   //    $data_skadimit=$row1['data_skadimit'];
   //    }

 ?>