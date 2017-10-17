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
if(isset($_POST['njesiaIlacit'])){
	if($_POST['njesiaIlacit']=='pako'){
	$sqlnjesiapako="UPDATE tblstocks as a SET sasia_pakove = (sasia_pakove - ".$numri."), totali = (totali - (" . $numri . "*sasia_copeve)) WHERE a.emri='" . $emri . "'";
  mysqli_query($conn,$sqlnjesiapako);

}
elseif($_POST['njesiaIlacit']=='copë'){

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

	//kur numri i copave tpakos se hapur eshte i barbarte me nr e cp/pako, dmth kur pako osht e re
  if($numricopeveperpako == $numripakostfundit){

      $sqlnjesiacope="UPDATE tblstocks as a SET a.sasia_pakove = (a.sasia_pakove - 1), a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.pako_hapur -" . $numri . " WHERE a.emri='" . $emri . "'";
      
      mysqli_query($conn,$sqlnjesiacope);

      //rimarrja e te dhenave per barnat
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
      //fundi rimarrjes


      if($numripakostfundit == 0){//ne qoftese pako e fundit u harxhu
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.pako_hapur=a.sasia_copeve WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
				
      }
			if($numripakostfundit < 0){//ne qoftese pako e fundit u harxhu, plus ka hy n'minus
					//echo abs($numripakostfundit);

					$numriimarrngapakoere = abs($numripakostfundit) % $numricopeveperpako;
					$numriimarrngapakoerepjestimi = (int)((abs($numripakostfundit))/($numricopeveperpako));
					//echo "<br/>";
					//echo $numriimarrngapakoere . " tjetra: " . $numriimarrngapakoerepjestimi;
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.sasia_pakove=a.sasia_pakove - " . $numriimarrngapakoerepjestimi . ",a.pako_hapur=a.sasia_copeve - " .$numriimarrngapakoere . " WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
			}

  }elseif ($numripakostfundit == 0) {
      $sqlnjesiacope="UPDATE tblstocks as a SET a.sasia_pakove = (a.sasia_pakove - 1), a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.sasia_copeve -" . $numri . " WHERE a.emri='" . $emri . "'";
     
      mysqli_query($conn,$sqlnjesiacope);

			//rimarrja e te dhenave per barnat
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
			//fundi rimarrjes

		

			if($numripakostfundit == 0){//ne qoftese pako e fundit u harxhu
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.pako_hapur=a.sasia_copeve WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
			}
			if($numripakostfundit < 0){//ne qoftese pako e fundit u harxhu, plus ka hy n'minus
					//echo abs($numripakostfundit);

					$numriimarrngapakoere = abs($numripakostfundit) % $numricopeveperpako;
					$numriimarrngapakoerepjestimi = (int)((abs($numripakostfundit))/($numricopeveperpako));
					//echo "<br/>";
					//echo $numriimarrngapakoere . " tjetra: " . $numriimarrngapakoerepjestimi;
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.sasia_pakove=a.sasia_pakove - " . $numriimarrngapakoerepjestimi . ",a.pako_hapur=a.sasia_copeve - " .$numriimarrngapakoere . " WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
			}
  }
  else{
      $sqlnjesiacope="UPDATE tblstocks as a SET a.totali = (a.totali - " . $numri . "), a.pako_hapur=a.pako_hapur -" . $numri . " WHERE a.emri='" . $emri . "'";
      mysqli_query($conn,$sqlnjesiacope);

			//rimarrja e te dhenave per barnat
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
			//fundi rimarrjes

	
			if($numripakostfundit == 0){//ne qoftese pako e fundit u harxhu
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.pako_hapur=a.sasia_copeve WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
					echo "u hap pako e re";
			}
			if($numripakostfundit < 0){//ne qoftese pako e fundit u harxhu, plus ka hy n'minus
					//echo abs($numripakostfundit);

					$numriimarrngapakoere = abs($numripakostfundit) % $numricopeveperpako;
					$numriimarrngapakoerepjestimi = (int)((abs($numripakostfundit))/($numricopeveperpako));
					//echo "<br/>";
					//echo $numriimarrngapakoere . " tjetra: " . $numriimarrngapakoerepjestimi;
					$queryperhapjenepakostre = "UPDATE tblstocks as a SET a.sasia_pakove=a.sasia_pakove - " . $numriimarrngapakoerepjestimi . ",a.pako_hapur=a.sasia_copeve - " .$numriimarrngapakoere . " WHERE a.emri='" . $emri . "'";
					mysqli_query($conn,$queryperhapjenepakostre);
			}
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
