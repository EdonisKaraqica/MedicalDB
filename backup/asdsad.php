<?php $connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");
$sql = "select a.kid, b.emri, b.mbiemri, b.departamenti, b.njesia, a.data1, a.data2, a.approved, a.plotesuar_nga, a.approved_by from (tblkerkesat as a INNER JOIN tblpacientatstaff as b) where a.pid=b.pid";
$result = mysqli_query($connect, $sql);
?>
<html>
 <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <style>
  th{
    text-align: center;
    white-space: nowrap;
    font-size: 12px;
  }
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
    <h2 align="center">Kerkesa te pa-aprovuara per pushim mjekesor</h2><br />
    <form method="get" action="test2.php">
    <table class="table table-bordered">
     <tr>  <th>Numri</th>
       <th>Emri</th><th>Mbiemri</th><th>Departamenti</th><th>Njesia</th>
       <th>Fillimi</th><th>Fundi</th><th>E aprovuar?</th>
       <th>Aprovo</th>
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
        echo '
       <tr>
         <td>'.$row["kid"].'</td>
           <td>'.$row["emri"].'</td>
             <td>'.$row["mbiemri"].'</td>
                 <td>'.$row["departamenti"].'</td>
                     <td>'.$row["njesia"].'</td><td>'.$row["data1"].'</td>
                         <td>'.$row["data2"].'</td><td>'.$row["approved"].'</td>
         <td><button submit="submit" name="kidselect" value="' . $row["kid"] . '"' . '>Aprovo</button></td>
         </tr>';
     }
     ?>
    </table>
  </form>
    <br />

   </div>
  </div>
 </body>
</html>