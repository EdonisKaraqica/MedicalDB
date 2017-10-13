<?php

include("databaze.php");
if(isset($_POST['nrBarnave']))
{
$numri=$_POST['nrBarnave']; //numri qe e jep...
}
if(isset($_POST['emriIlacit']))
{
$emri=$_POST['emriIlacit'];
}
if(isset($_POST['njesia'])){
	if($_POST['njesia']=='pako'){
	$sqlnjesiapako="UPDATE tblstocks as a SET sasia_pakove = (sasia_pakove - ".$numri."), totali = (totali - (" . $numri . "*sasia_copeve)) WHERE a.emri='" . $emri . "'";
  mysqli_query($conn,$sqlnjesiapako);

}
elseif($_POST['njesia']=='cop'){

  $sqlbarna = "SELECT * from tblstocks as a where a.emri='" . $emri . "'";
  //echo $sqlbarna;
  $tedhenatebarnave = mysqli_query($conn, $sqlbarna);
  if (!$tedhenatebarnave) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  $barnaezgjedhur = mysqli_fetch_array($tedhenatebarnave);
  $numripakove = $barnaezgjedhur["sasia_pakove"];
  $numricopeveperpako = $barnaezgjedhur["sasia_copeve"];
  $numritotalicopeve = $barnaezgjedhur["totali"];
  $numripakostfundit = $barnaezgjedhur["pako_hapur"];

  //echo $numripakove;

  if($numricopeveperpako == $numripakostfundit){

      $sqlnjesiacope="UPDATE tblstocks as a SET a.sasia_pakove = (a.sasia_pakove - 1), a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.pako_hapur -" . $numri . " WHERE a.emri='" . $emri . "'";
      //echo $sqlnjesiacope;
      mysqli_query($conn,$sqlnjesiacope);



      if($numripakostfundit == 0){//ne qoftese pako e fundit u hargju
        $sqlnjesiacope="UPDATE tblstocks as a SET a.sasia_pakove = (a.sasia_pakove - 1), a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.pako_hapur -" . $numri . " WHERE a.emri='" . $emri . "'";
        //echo $sqlnjesiacope;
        mysqli_query($conn,$sqlnjesiacope);
      }

  }elseif ($numripakostfundit == 0) {
      $sqlnjesiacope="UPDATE tblstocks as a SET a.sasia_pakove = (a.sasia_pakove - 1), a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.sasia_copeve -" . $numri . " WHERE a.emri='" . $emri . "'";
      //echo $sqlnjesiacope;
      mysqli_query($conn,$sqlnjesiacope);
  }
  else{
      $sqlnjesiacope="UPDATE tblstocks as a SET a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.pako_hapur -" . $numri . " WHERE a.emri='" . $emri . "'";
      //echo $sqlnjesiacope;
      mysqli_query($conn,$sqlnjesiacope);
  }


  //$sqlnjesiapako="UPDATE tblstocks as a SET totali = (totali - ".$numri."), totali = (totali - (" . $numri . "*sasia_copeve)) WHERE a.emri='" . $emri . "'";


}

 //$res13=mysqli_query($conn,$sql120) or die( "Error");
 //$sql444="UPDATE tblstocks SET totali = sasia_copeve*sasia_pakove WHERE `emri` = '$emri'";
 //$res132=mysqli_query($conn,$sql444) or die( "Error");
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
