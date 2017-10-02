<?php
session_start();
//export.php
$connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");
$output = '';
if(isset($_POST["export"]))
{
 $query = $_SESSION['sqlsearch'];
 //echo $query;
 $query = "select emri,prindi,mbiemri,gjinia,ditelindja,adresa,data_regjistrimit,shifra_veprimtarise,ankesa,anamneza_konstatimi,diagnoza,terapia,ku_udhezohet,paraqitja_serishme,cmimi from tblrekordetpax where YEAR(data_regjistrimit)='2017'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
                    <tr>

       <th>Emri</th>
       <th>Prindi</th><th>Mbiemri</th><th>Gjinia</th><th>Ditelindja</th>
       <th>Adresa</th><th>Data e Regjistrimit</th><th>Shifra e Veprimtarise</th>
       <th>Ankesa</th><th>Anamneza dhe konstatimi</th><th>Diagnoza</th><th>Terapia</th>
        <th>Ku udhezohet</th>  <th>Paraqitja e serishme</th>  <th>Cmimi</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
          <td>'.$row["emri"].'</td>
           <td>'.$row["prindi"].'</td><td>'.$row["mbiemri"].'</td><td>'.$row["gjinia"].'</td>
             <td>'.$row["ditelindja"].'</td><td>'.$row["adresa"].'</td><td>'.$row["data_regjistrimit"].'</td>
                 <td>'.$row["shifra_veprimtarise"].'</td><td>'.$row["ankesa"].'</td>
                     <td>'.$row["anamneza_konstatimi"].'</td><td>'.$row["diagnoza"].'</td>
                         <td>'.$row["terapia"].'</td><td>'.$row["ku_udhezohet"].'</td><td>'.$row["paraqitja_serishme"].'</td>
         <td>'.$row["cmimi"].'</td></tr>
        ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
