<?php 
include("databaze.php");
session_start();

$rap="";

$Rp="";

$udhPer="";
$gjPrez="";
$terapiaAp="";

$udhPerLab="";
 //$diagnozaLab=$row['diagnozaLab'];
$gjPrezLab="";
$terLab="";

$udhezohetPerRent="";
$gjPrezenteRent="";
$terapiaApRent="";

$origjina="";
$destinacioni="";
$shenime="";

$qellimiLar="";
$prej="";
$deri="";

$enti="";
$fillimi="";
$fundi="";
$numri="";
$komentRaport="";

$id=$_GET['rid'];

$sql="SELECT * FROM tblrekordetstaff where rid=".$id;

$res=mysqli_query($conn,$sql) or die( "Error"); 
while ($row=mysqli_fetch_assoc($res)) 
   { 
      

      $ankesa=$row['ankesa']; 
      $anamnezaSemundjes=$row['anamnezaesemundjes'];
      $anFamiljes=$row['anamnezaefamiljes'];
      $ta=$row['ta'];
      $pulsi=$row['pulsi'];
      $spo2=$row['spo2'];
      $koment=$row['komenti'];
      $laboratori=$row['laboratori'];
      $diagnoza=$row['diagnoza'];
      $trajtimi=$row['trajtimi'];
      $perfundimi=$row['perfundimi'];

      $raportimjeksorid=$row['raportimjeksorid'];
      $raportinderprerjesseperkohshmeperpuneID=$row['raportinderprerjesseperkohshmeperpuneID'];
      $raportudhetimiperpasagjerid=$row['raportudhetimiperpasagjerid'];
      $largimngapunaid=$row['largimngapunaid'];
      $receteid=$row['receteid'];
      $udhezimperekzaminimelaboratorikeid=$row['udhezimperekzaminimelaboratorikeid'];
      $udhezimperekzaminimerentgenologjikeid=$row['udhezimperekzaminimerentgenologjikeid'];
      $udhezimperkonsultimeid=$row['udhezimperkonsultimeid'];

      
      }

      $sql1="SELECT * FROM ((tblrekordetstaff as t1 inner join tbldoktoret as t2 on t1.did=t2.did) INNER JOIN tblpacientatstaff as c on t1.pid = c.limakid";
        

        if (!empty($raportimjeksorid)) {
            $sql1=$sql1." INNER JOIN raportimjeksor as t4 on t1.raportimjeksorid = t4.ID";
        }
        if (!empty($receteid)) {
            $sql1=$sql1." INNER JOIN recete as r on t1.receteid = r.ID";
        }
        if (!empty($udhezimperkonsultimeid)) {
            $sql1=$sql1." INNER JOIN udhezimperkonsultime as t5 on t1.udhezimperkonsultimeid = t5.ID";
        }
        if (!empty($udhezimperekzaminimelaboratorikeid)) {
            $sql1=$sql1." INNER JOIN udhezimperekzaminimelaboratorike as t6 on t1.udhezimperekzaminimelaboratorikeid = t6.ID";
        }
        if (!empty($udhezimperekzaminimerentgenologjikeid)) {
            $sql1=$sql1." INNER JOIN udhezimperekzaminimerentgenologjike as t7 on t1.udhezimperekzaminimerentgenologjikeid = t7.ID";
        }
        if (!empty($largimngapunaid)) {
            $sql1=$sql1." INNER JOIN largimngapuna as t8 on t1.largimngapunaid = t8.ID";
        }
        if (!empty($raportinderprerjesseperkohshmeperpuneID)) {
            $sql1=$sql1." INNER JOIN raportinderprerjesseperkohshmeperpune as t9 on t1.raportinderprerjesseperkohshmeperpuneID = t9.ID";
        }
        if (!empty($raportudhetimiperpasagjerid)) {
            $sql1=$sql1." INNER JOIN raportudhetimiperpasagjer as t10 on t1.raportudhetimiperpasagjerid = t10.ID";
        }
        

        $sql1=$sql1.")";


      $res1=mysqli_query($conn,$sql1) or die("Error"); 













// $sql1="SELECT * FROM ((tblrekordetstaff as t1 inner join tbldoktoret as t2 on t1.did=t2.did) INNER JOIN tblpacientatstaff as c on t1.pid = c.limakid INNER JOIN recete as r on t1.receteid = r.ID INNER JOIN raportimjeksor as t4 on t1.raportimjeksorid = t4.ID INNER JOIN udhezimperkonsultime as t5 on t1.udhezimperkonsultimeid = t5.ID INNER JOIN udhezimperekzaminimelaboratorike as t6 on t1.udhezimperekzaminimelaboratorikeid = t6.ID INNER JOIN udhezimperekzaminimerentgenologjike as t7 on t1.udhezimperekzaminimerentgenologjikeid = t7.ID INNER JOIN largimngapuna as t8 on t1.largimngapunaid = t8.ID INNER JOIN raportinderprerjesseperkohshmeperpune as t9 on t1.raportinderprerjesseperkohshmeperpuneID = t9.ID) where t1.rid=95";











while ($row=mysqli_fetch_assoc($res1)) 
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
      $anamnezaSemundjes=$row['anamnezaesemundjes'];
      $anFamiljes=$row['anamnezaefamiljes'];
      $ta=$row['ta'];
      $pulsi=$row['pulsi'];
      $spo2=$row['spo2'];
      $koment=$row['komenti'];
      $laboratori=$row['laboratori'];
      $diagnoza=$row['diagnoza'];
      $trajtimi=$row['trajtimi'];
      $perfundimi=$row['perfundimi'];

if (!empty($raportimjeksorid)) {
      $rap=$row['Raporti'];
    }
    if (!empty($receteid)) {

      $Rp=$row['Rp'];
    }
if (!empty($udhezimperkonsultimeid)) {
      $udhPer=$row['Udhezohetper'];
      $gjPrez=$row['Gjendjaprezente'];
      $terapiaAp=$row['Terapiaeaplikuar'];
    }

    if (!empty($udhezimperekzaminimelaboratorikeid)) {

      $udhPerLab=$row['Udhezohetper'];
       //$diagnozaLab=$row['diagnozaLab'];
       $gjPrezLab=$row['Gjendjaprezente'];
       $terLab=$row['Terapiaeaplikuar'];
     }


     if (!empty($udhezimperekzaminimerentgenologjikeid)) {

       $udhezohetPerRent=$row['Udhezohetper'];
       $gjPrezenteRent=$row['Gjendjaprezente'];
       $terapiaApRent=$row['Terapiaeaplikuar'];
     }

     if (!empty($raportudhetimiperpasagjerid)) {

       $origjina=$row['Origjina'];
       $destinacioni=$row['Destinimi'];
       $shenime=$row['Shenime'];
     }

       if (!empty($largimngapunaid)) {

       $qellimiLar=$row['qellimiilargimit'];
       $prej=$row['Prej'];
       $deri=$row['Deri'];
     }

//        $enti=$row['Entishendetesor'];
//        $fillimi=$row['Ditaepare'];
//        $fundi=$row['Ditaefundit'];
//        $numri=$row['Numriiditvepushim'];
//        $komentRaport=$row['komenti'];
      
      

      
      
      }
      // echo $Rp;

      $_SESSION['emri']=$emri;
      
      $_SESSION['telefoni']=$telefoni;
      $_SESSION['numriid']=$numriid;
      $_SESSION['adresa']=$adresa;
      $_SESSION['ditelindja']=$ditelindja;
      $_SESSION['email']=$email;
      $_SESSION['vendlindja']=$vendlindja;
      $_SESSION['gjinia']=$gjinia;
      $_SESSION['njesia']=$njesia;
      $_SESSION['alergjite']=$alergjite;

      $_SESSION['ankesa']=$ankesa;
      $_SESSION['anamnezaSemundjes']=$anamnezaSemundjes;
      $_SESSION['anFamiljes']=$anFamiljes;
      $_SESSION['ta']=$ta;
      $_SESSION['pulsi']=$pulsi;
      $_SESSION['spo2']=$spo2;
      $_SESSION['koment']=$koment;
      $_SESSION['laboratori']=$laboratori;
      $_SESSION['diagnoza']=$diagnoza;
      $_SESSION['trajtimi']=$trajtimi;
      $_SESSION['perfundimi']=$perfundimi;
      $_SESSION['rap']=$rap;
       $_SESSION['Rp']=$Rp;;
      $_SESSION['udhPer']=$udhPer;
      $_SESSION['gjPrez']=$gjPrez;
      $_SESSION['terapiaAp']=$terapiaAp;
      $_SESSION['udhPerLab']=$udhPerLab;
      $_SESSION['gjPrezLab']=$gjPrezLab;
      $_SESSION['terLab']=$terLab;
      $_SESSION['udhezohetPerRent']=$udhezohetPerRent;
      $_SESSION['gjPrezenteRent']=$gjPrezenteRent;
      $_SESSION['terapiaApRent']=$terapiaApRent;
      $_SESSION['origjina']=$origjina;
      $_SESSION['destinacioni']=$destinacioni;
      $_SESSION['shenime']=$shenime;
      $_SESSION['qellimiLar']=$qellimiLar;
      $_SESSION['prej']=$prej;
      $_SESSION['deri']=$deri;
      $_SESSION['enti']=$enti;
      $_SESSION['fillimi']=$fillimi;
      $_SESSION['fundi']=$fundi;
      $_SESSION['deri']=$deri;
      $_SESSION['numri']=$numri;
      $_SESSION['komentRaport']=$komentRaport;



?>
<?php
       session_start();
       $username=$_SESSION['CurrentUser'];
       $sql1="SELECT emri,mbiemri,email,nrtel FROM tbldoktoret where username='".$username."'"; 
         $res1=mysqli_query($conn,$sql1) or die( "Error");
         while ($row1=mysqli_fetch_assoc($res1)) 
      { 
          $emriDok=$row1['emri']; 
          $mbiemriDok=$row1['mbiemri'];
          $email=$row1[ 'email']; 
          $nrtel=$row1['nrtel'];

      } 
      $_SESSION['emriDok']=$emriDok;
      $_SESSION['mbiemriDok']=$mbiemriDok;
      $_SESSION['emailDok']=$email;
      $_SESSION['nrtel']=$nrtel;
      $_SESSION['emriDok']=$emriDok;
            $currentDate = date("Y/m/d")



      ?>
<form action="ushtrime2.php" method="post">
           <input type="hidden" name="data" value="<?php echo $currentDate; ?>">


<input type="submit">
</form>

