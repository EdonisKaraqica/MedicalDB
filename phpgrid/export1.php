<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");

if($connect){
  echo "inter";
}
else{echo "milan";}

$sqluserinfo = "select emri,mbiemri from tbldoktoret where username='" . $_SESSION['CurrentUser'] . "'";
echo $sqluserinfo;

$users = mysqli_query($connect, $sqluserinfo);
$userinfo = mysqli_fetch_array($users);

$firstname = $userinfo['emri'];
$lastname = $userinfo['mbiemri'];

$_SESSION['emri'] = $firstname;
$_SESSION['mbiemri'] = $lastname;

echo $firstname; echo $lastname;

if(isset($_GET['btnMuaji'])){
  $muaji = $_GET['muajiinput'];
  //echo $muaji;
  $muajiviti = substr($muaji,0,4);
  //echo $javaviti; //viti
  $muajimuaji = substr($muaji,5,2);

  switch ($muajimuaji) {
    case "01":
        $muajitext = "Janar";
        break;
    case "02":
        $muajitext = "Shkurt";
        break;
    case "03":
        $muajitext = "Mars";
        break;
    case "04":
        $muajitext = "Prill";
        break;
    case "05":
        $muajitext = "Maj";
        break;
    case "06":
        $muajitext = "Qershor";
        break;
    case "07":
        $muajitext = "Korrik";
        break;
    case "08":
        $muajitext = "Gusht";
        break;
    case "09":
        $muajitext = "Shtator";
        break;
    case "10":
        $muajitext = "Tetor";
        break;
    case "11":
        $muajitext = "Nentor";
        break;
    case "12":
        $muajitext = "Dhjetor";
        break;
    default:
        echo "e zgjedhur:";
}

  //echo $muajiviti . $muajimuaji;
  $sql = "select
					a.rid,
					b.emri as pemri,
                    b.mbiemri as pmbiemri,
                    b.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


				 from ((tblrekordetstaff as a
                      INNER JOIN tblpacientatstaff as b on a.pid=b.pid)
                      INNER JOIN tbldoktoret as c on a.did=c.did) where month(a.data_regjistrimit)='" . $muajimuaji . "' and year(data_regjistrimit)='" . $muajiviti . "'";


  $sql2 = "select
          					a.rid,
          					a.emri as pemri,
                    a.mbiemri as pmbiemri,
                    a.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


				 from (tblrekordetpax as a

                      INNER JOIN tbldoktoret as c on a.did=c.did) where month(a.data_regjistrimit)='" . $muajimuaji . "' and year(data_regjistrimit)='" . $muajiviti . "'";




  $_SESSION['sqlsearch'] = $sql;
  $_SESSION['sqlsearch2'] = $sql2;
  $_SESSION['chosenstats'] = "<p style=\"font-size:30px; text-align:center;\">Regjistri per muajin <u>" . $muajitext . "-" . $muajiviti . ":</u></p>";
  echo $_SESSION['chosenstats'];
  $_SESSION['filename']="Regjistri-" . $muajiviti . "-" . $muajimuaji;

}
else if(isset($_GET['btnJava'])){
  $java = $_GET['javainput'];
  echo $java;
  $javaviti = substr($java,0,4);
  //echo $javaviti; //viti
  $javajava = substr($java,6,2);
  //echo $javajava; //java
  //$sql = "select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did and week(r.data_regjistrimit)='36' and year(r.data_regjistrimit)='2017') as t1";
  //echo $sql;
  $sql = "select
					a.rid,
					b.emri as pemri,
                    b.mbiemri as pmbiemri,
                    b.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


				 from ((tblrekordetstaff as a
                      INNER JOIN tblpacientatstaff as b on a.pid=b.pid)
                      INNER JOIN tbldoktoret as c on a.did=c.did) where week(a.data_regjistrimit)='" . $javajava . "' and year(data_regjistrimit)='" . $javaviti . "'";


  $sql2 = "select
          					a.rid,
          					a.emri as pemri,
                    a.mbiemri as pmbiemri,
                    a.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


				 from (tblrekordetpax as a

                      INNER JOIN tbldoktoret as c on a.did=c.did) where week(a.data_regjistrimit)='" . $javajava . "' and year(data_regjistrimit)='" . $javaviti . "'";

    $_SESSION['sqlsearch'] = $sql;
    $_SESSION['sqlsearch2'] = $sql2;
    $_SESSION['chosenstats'] = "<p style=\"font-size:30px; text-align:center;\">Regjistri per javen <u>" . $javajava . " te vitit " . $javaviti . ":</u></p>";
    echo $_SESSION['chosenstats'];
    $_SESSION['filename']="Regjistri-" . $javaviti . "-Java-" . $javajava;
}
else{
  $viti = $_GET['vitiinput'];

  $sql = "select
          a.rid,
          b.emri as pemri,
                    b.mbiemri as pmbiemri,
                    b.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


         from ((tblrekordetstaff as a
                      INNER JOIN tblpacientatstaff as b on a.pid=b.pid)
                      INNER JOIN tbldoktoret as c on a.did=c.did) where year(data_regjistrimit)='" . $viti . "'";


  $sql2 = "select
                    a.rid,
                    a.emri as pemri,
                    a.mbiemri as pmbiemri,
                    a.gjinia,
                    concat(c.emri, \" \", c.mbiemri) as kontrolloi,
                    a.ankesa,
                    a.shifra_veprimtarise as shv,
                    a.anamnezaesemundjes as anamneza,
                    a.diagnoza,
                    a.trajtimi,
                    a.perfundimi,
                    a.data_regjistrimit as data


         from (tblrekordetpax as a

                      INNER JOIN tbldoktoret as c on a.did=c.did) where year(data_regjistrimit)='" . $viti . "'";



    $_SESSION['sqlsearch'] = $sql;
    $_SESSION['sqlsearch2'] = $sql2;
  $_SESSION['chosenstats'] = "<p style=\"font-size:30px; text-align:center;\">Regjistri per vitin <u>" . $viti . ":</u></p>";
  echo $_SESSION['chosenstats'];
  $_SESSION['filename']="Regjistri-" . "Viti-" . $viti;
}


//$sql = "SELECT * FROM tblrekordetpax";
$result = mysqli_query($connect, $sql);
$result2 = mysqli_query($connect, $sql2);
?>
<html>
 <head>
  <title>Shkarkimi i te dhenave ne Excel Sheet</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
  tr{
    text-align: center;
    white-space: nowrap;
    font-size: 12px;
  }
  td{
    text-align: center;
    white-space: nowrap;
    font-size: 12px;
  }
  </style>

 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <br />
   <div class="table-responsive">
    <!--<h2 align="center">Export MySQL data to Excel in PHP</h2><br />-->
    <p>Regjistri per Staff:</p>
    <table class="table table-bordered">
     <tr><th>Nr. i Dosjes</th>
         <th>Emri</th>
         <th>Mbiemri</th>
         <th>Gjinia</th>
         <th>Ankesa</th>
         <th>Shifra e v.</th>
         <th>Anamneza</th>
         <th>Diagnoza</th>
         <th>Trajtimi</th>
         <th>Perfundimi</th>
         <th>Data</th>
         <th>Kontrolloi</th>
      </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
        echo '
       <tr>
        <td>'.$row["rid"].'</td>
         <td>'.$row["pemri"].'</td>
           <td>'.$row["pmbiemri"].'</td>
            <td>'.$row["gjinia"].'</td>

            <td>'.$row["ankesa"].'</td>
              <td>'.$row["shv"].'</td>
              <td>'.$row["anamneza"].'</td>
              <td>'.$row["diagnoza"].'</td>

                   <td>'.$row["trajtimi"].'</td>

                     <td>'.$row["perfundimi"].'</td>

                        <td>'.$row["data"].'</td>
                         <td>'.$row["kontrolloi"].'</td>

         </tr>
        ';
     }
     ?>
    </table>
    <br /><p>Regjistri per Pax:</p>

    <table class="table table-bordered">
     <tr>
       <th>Nr. i Dosjes</th>
           <th>Emri</th>
           <th>Mbiemri</th>
           <th>Gjinia</th>
           <th>Ankesa</th>
           <th>Shifra e v.</th>
           <th>Anamneza</th>
           <th>Diagnoza</th>
           <th>Trajtimi</th>
           <th>Perfundimi</th>
           <th>Data</th>
           <th>Kontrolloi</th>
        </tr>

        <?php
        while($row = mysqli_fetch_array($result2))
        {
           echo '
          <tr>
           <td>'.$row["rid"].'</td>
            <td>'.$row["pemri"].'</td>
              <td>'.$row["pmbiemri"].'</td>
               <td>'.$row["gjinia"].'</td>
               <td>'.$row["ankesa"].'</td>
               <td>'.$row["shv"].'</td>
               <td>'.$row["anamneza"].'</td>
               <td>'.$row["diagnoza"].'</td>
               <td>'.$row["trajtimi"].'</td>
               <td>'.$row["perfundimi"].'</td>
               <td>'.$row["data"].'</td>
               <td>'.$row["kontrolloi"].'</td>
            </tr>
           ';
          }
        ?>
       </table>



    <form method="post" action="export2.php">
     <input type="submit" name="export" id="btnexport" class="btn btn-success" value="Shkarko ne Excel file" />
    </form>
   </div>
  </div>
 </body>
</html>
