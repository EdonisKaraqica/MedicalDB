<?php 
include("databaze.php");
// $sql="SELECT * FROM ((tblrekordetstaff as a
// INNER JOIN tblpacientatstaff as b on a.pid = b.pid)
// INNER JOIN tbldoktoret as c on a.did = c.did)";
$sql="SELECT * FROM ((tblrekordetstaff as t1 inner join tbldoktoret as t2 on t1.did=t2.did)
	INNER JOIN tblpacientatstaff as c on t1.pid = c.limakid) where t1.rid=92";

$res=mysqli_query($conn,$sql) or die( "Error"); 

while ($row=mysqli_fetch_assoc($res)) 
   { 
      $emri=$row['emri']; 
      $telefoni=$row['nrtel']; 
      $numriid=$row['limakid']; 
      $adresa=$row['adresa']; 
      $ditelindja=$row['ditelindja']; 
      $email=$row['email']; 
      $vendlindja=$row['vendlindja']; 
      // $numriDosjes=$row['emri']; 
      $gjinia=$row['gjinia']; 
      $njesia=$row['njesia']; 
      $alergjite=$row['alergjite']; 
      $ankesa=$row['ankesa']; 
      

      
      
      }

      echo $emri;

?>

