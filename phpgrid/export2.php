<?php
session_start();
//export.php
$connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");
$output = '';
$output .= "<p style=\"";
$output .= "text-align:center\">";
$output .=  $_SESSION['chosenstats'] . "</p>";
if(isset($_POST["export"]))
{
 $query = $_SESSION['sqlsearch'];
 $query2 = $_SESSION['sqlsearch2'];



 //echo $query;
 //$query = "select emri,prindi,mbiemri,gjinia,ditelindja,adresa,data_regjistrimit,shifra_veprimtarise,ankesa,anamneza_konstatimi,diagnoza,terapia,ku_udhezohet,paraqitja_serishme,cmimi from tblrekordetpax where YEAR(data_regjistrimit)='2017'";
 $result = mysqli_query($connect, $query);
 $result2 = mysqli_query($connect, $query2);
 if(mysqli_num_rows($result) > 0)
 {
  //$output .= "<p style=\"";
  //$output .= "text-align:center\">";
  //$output .=  $_SESSION['chosenstats'] . "</p>";
  $output .= "<p style=\"font-size:12px;text-align:left;\">Regjistri per Staff:</p>";
  $output .= '
   <table class="table" border="1">
   <tr><th>Nr. i Dosjes</th>
     <th>Emri</th>
     <th>Mbiemri</th>
     <th>Emri i Dr.</th>
       <th>Mbiemri i Dr.</th><th>Gjinia</th>
       <th>Shifra e v.</th>
     <th>Pozita e punes</th><th>Anamneza & Konstatimi</th><th>Diagnoza</th>
     <th>Terapia</th><th>Ku udhezohet</th><th>Data</th><th>Paraqitja e serishme</th>
        <th>Cmimi</th>
                  </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <tr>
    <td>'.$row["rid"].'</td>
     <td>'.$row["pemri"].'</td>
       <td>'.$row["pmbiemri"].'</td>
        <td>'.$row["demri"].'</td>
        <td>'.$row["dmbiemri"].'</td>
        <td>'.$row["gjinia"].'</td>
         <td>'.$row["shifra_veprimtarise"].'</td><td>'.$row["pozita_punes"].'</td><td>'.$row["anamneza_konstatimi"].'</td>
             <td>'.$row["diagnoza"].'</td><td>'.$row["terapia"].'</td>
                 <td>'.$row["ku_udhezohet"].'</td><td>'.$row["data_regjistrimit"].'</td>
                     <td>'.$row["data_paraqitjes_serishme"].'</td>

     <td>'.$row["cmimi"].'</td></tr>
        ';


  }
  $output .= '</table>';
}
else{
  $output .= "<p style=\"font-size:12px;text-align:left;\">Regjistri per Staff:</p>";
  $output .= "Nuk ka asnje rekord te regjistruar gjate kesaj periudhe!";
}

if(mysqli_num_rows($result2) > 0)
{
  //e re

  //$output .= "<p style=\"";
  //$output .= "text-align:center\">";
  //$output .=  $_SESSION['chosenstats'] . "</p>";
  $output .= "<p style=\"font-size:12px;text-align:left;\">Regjistri per Pax:</p>";
  $output .= '
   <table class="table" border="1">
   <tr>
       <th>Nr. i Dosjes</th>
       <th>Emri</th>
       <th>Mbiemri</th>
       <th>Emri i Dr.</th>
       <th>Mbiemri i Dr.</th>
       <th>Gjinia</th>
       <th>Shifra e v.</th>
       <th>Anamneza & Konstatimi</th>
       <th>Diagnoza</th>
       <th>Terapia</th>
       <th>Ku udhezohet</th>
       <th>Data</th>
       <th>Paraqitja e serishme</th>
       <th>Cmimi</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result2))
  {
   $output .= '
   <tr>
    <td>'.$row["rid"].'</td>
     <td>'.$row["pemri"].'</td>
       <td>'.$row["pmbiemri"].'</td>
        <td>'.$row["demri"].'</td>
        <td>'.$row["dmbiemri"].'</td>
        <td>'.$row["gjinia"].'</td>
         <td>'.$row["shifra_veprimtarise"].'</td><td>'.$row["anamneza_konstatimi"].'</td>
             <td>'.$row["diagnoza"].'</td><td>'.$row["terapia"].'</td>
                 <td>'.$row["ku_udhezohet"].'</td><td>'.$row["data_regjistrimit"].'</td>
                     <td>'.$row["paraqitja_serishme"].'</td>

     <td>'.$row["cmimi"].'</td></tr>
        ';
  }
  $output .= '</table>';
}else{
  $output .= '<p style="font-size:12px;text-align:left;">Regjistri per Pax:</p>';
  $output .= 'Nuk ka asnje rekord te regjistruar gjate kesaj periudhe!';
}

  //e re
  $output .= '    <footer>
                    <p>E printuar nga Dr. ';
  $output .= $_SESSION['emri'] . " " . $_SESSION['mbiemri'];
  $output .= ' me <i>';
  $output .= date('d-m-Y  H:i:s');
  $output .='</i></p></footer>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename="'.$_SESSION['filename'].'.xls"');
  echo $output;
 }

?>
