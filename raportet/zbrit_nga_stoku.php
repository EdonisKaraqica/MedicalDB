<?php 

include("databaze.php");
if(isset($_POST['nrBarnave']))
{
$numri=$_POST['nrBarnave'];
}
if(isset($_POST['emriIlacit']))
{
$emri=$_POST['emriIlacit'];
}
if(isset($_POST['njesia'])){
	if($_POST['njesia']=='pako'){
	$sql120="UPDATE tblstocks SET sasia_pakove = sasia_pakove - ".$numri." WHERE `emri` = '$emri'";
}
else{
		$sql120="UPDATE tblstocks SET sasia_copeve = sasia_copeve - ".$numri." WHERE `emri` = '$emri'";

}
 $res13=mysqli_query($conn,$sql120) or die( "Error");
}
   //       while ($row1=mysqli_fetch_assoc($res13)) 
   // { 
   //    $barcode=$row1[ 'barcode']; 
   //    $emriBarnes=$row1['emri'];
   //    $sasia=$row1[ 'sasia']; 
   //    $data_prodhimit=$row1['data_prodhimit'];
   //    $data_skadimit=$row1['data_skadimit'];
   //    }

 ?>