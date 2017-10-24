<?php

$connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");
$sql = "select a.kid, b.emri, b.mbiemri, b.departamenti, b.njesia, a.data1, a.data2, a.arsyetimi, a.shqyrtuar, a.approved, a.plotesuar_nga, a.approved_by from (tblkerkesat as a INNER JOIN tblpacientatstaff as b) where a.pid=b.pid";
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
   <script>
function confirmation() {
    return confirm("A jeni të sigurt që të refuzoni kërkesën? (Are you sure to reject the application?)");
}
</script>
  <div class="container">
   <br />
   <br />
   <br />
   <div class="table-responsive">
    <h2 align="center" style="font-size:20px; text-align:center;"><b>Kërkesat e pa-shqyrtuara për pushim mjekësor</b></br>(Un-reviewed requests for medical leave)</h2><br />
    <form method="get" action="raportet/raportet1.php">
    <table class="table table-bordered">
     <tr>   <th>Numri<br/><small>Nr.</small></th>
           <th>Emri<br/><small>Name</small></th>
           <th>Mbiemri<br/><small>Surname</small></th>
           <th>Departamenti<br/><small>Department</small></th>
           <th>Njesia<br/><small>Unit</small></th>
           <th>Fillimi<br/><small>Start</small></th>
           <th>Fundi<br/><small>End</small></th>
           <th>Arsyetimi<br/><small>Reason</small></th>
           <th>Aprovo<br/><small>Approve</small></th>
           <th>Refuzo<br/><small>Refuse</small></th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      if(!$row['shqyrtuar']==1)
        echo '
       <tr>
         <td>'.$row["kid"].'</td>
           <td>'.$row["emri"].'</td>
             <td>'.$row["mbiemri"].'</td>
                 <td>'.$row["departamenti"].'</td>
                     <td>'.$row["njesia"].'</td><td>'.$row["data1"].'</td>
                         <td>'.$row["data2"].'</td><td>'.$row["arsyetimi"].'</td>
         <td><button submit="submit" name="kidselect" value="' . $row["kid"] . '"' . '>Aprovo (Approve)</button></td>
         <td><a style="color:red" href="phpgrid/requestrefusal.php?id=' . $row["kid"] . '" onclick="return confirmation()")>Refuzo (Reject)</a></td></tr>';
     }
     ?>
    </table>
  </form>
    <br />

   </div>
  </div>
 </body>
</html>
