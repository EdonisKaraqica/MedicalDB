<?php ?>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta charset="utf-8">
    <script src='http://code.jquery.com/jquery-1.7.1.min.js'></script>
   <style>
      .buttonsize
      {
      font-size: 15px;
      width: 200px;
      height:50px;
      margin-left:70px;
      background-color: #33a8ff;
      }
      .fontdesign
      {
      font-family: Roboto;
      font-size: 15px;
      color:grey;
      margin-top: -50px;

      }
      .buttoncolor
      {
      margin-left: 70px;
      width: 200px;
      color:#2196f3;
      }
      .cardposition
      {
        margin-top:30px;
        height:1000px;
        width:1000px;
        margin-left:200px;
      }
      .cardcontentposition
      {
        padding:80px;
      }
       .input-field input:focus + label {
   color: blue !important;
 }
 /* label underline focus color */
 .row .input-field input:focus {
   border-bottom: 1px solid blue !important;
   box-shadow: 0 1px 0 0 blue !important
 }
   </style>

</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rezultatet = null;

if (isset($_POST['kerko'])) {

$perdoruesi=$_POST['text'];
$sql="SELECT pid, emri, mbiemri, departamenti FROM tblpacientatstaff WHERE emri='$perdoruesi' OR mbiemri='$perdoruesi' OR departamenti='$perdoruesi' OR CONCAT(emri,' ', mbiemri)='$perdoruesi' OR CONCAT(emri,' ', mbiemri,' ',departamenti)='$perdoruesi' OR  CONCAT(mbiemri,' ', emri)='$perdoruesi' OR CONCAT(emri,' ', departamenti)='$perdoruesi' OR CONCAT(mbiemri,' ', departamenti)='$perdoruesi' OR CONCAT(departamenti,' ', emri)='$perdoruesi' OR  CONCAT(departamenti,' ', mbiemri)='$perdoruesi' OR CONCAT(mbiemri,' ', emri,' ',departamenti)='$perdoruesi' OR CONCAT(mbiemri,' ', departamenti,' ', emri)='$perdoruesi' OR CONCAT(departamenti,' ', emri,' ', mbiemri)='$perdoruesi' OR CONCAT(departamenti,' ', mbiemri,' ',emri)='$perdoruesi' OR CONCAT(emri,' ', departamenti,' ',mbiemri)='$perdoruesi'";

$result = $conn->query($sql);
$rezultatet = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      array_push($rezultatet,$row);


    }
} else {

}
$conn->close();

}
?>
<div class="row">
  <div class="cardposition">
   <div class="col s12 m7">
      <div class="card">

         <div class="cardcontentposition">

            <p class="fontdesign"><b>Kërko punëtorin (Search for staff):</b></p>

         <div class="card-content">

            <form name="form" class="form-horizontal" method="post" >
               <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
               <br><br>
               <br><br>
                <div class="input-field">
              <input type="text" id="text1" placeholder="Kerko sipas emrit, mbiemrit dhe departamentit"  name="text" style=""  size="100" class="form-control input-md">
                </div>
  <!--             <div class="form-group">
  -->            <label class="col-md-3 control-label" for="singlebutton"></label>
<!--<div class="col-md-4">-->
                     <button name="kerko" class="waves-effect waves-light btn white buttoncolor" id="krijoraportin">Kerko <small>(Search)</small>
                     <i class="material-icons right">search</i></button>
<!--</div>-->
               <!--</div>-->
         </div>
         </div>
         </form>
         <?php if ($rezultatet) { ?>
           <!--<div>
           --><table class="centered responsive-table highlight">
              <thead style="color:grey;font-size:15px;">
                 <th>Emri <small>(Name)</small></th>
                 <th>Mbiemri <small>(Last Name)</small></th>
                 <th>Departamenti <small>(Departament)</small></th>
                 <th></th>
                </thead>
                <tbody>
                  <?php
                    foreach ($rezultatet as $rez) {
                      ?>
                      <tr>
                        <td><?= $rez['emri'] ?></td>
                        <td><?= $rez['mbiemri'] ?></td>
                        <td><?= $rez['departamenti'] ?></td>
                        <td><a href="kerkesaperpushim.php?id=<?= $rez['pid'] ?>">Krijo kerkesen <small>(Submit)</small></a></td>
                      </tr>
                      <?php
                    }
                  ?>
                  <tr>
                  </tr>
                </tbody>
             </table>
           <!--</div>-->
         <?php } ?>
      </div>
   </div>
</div>
</div>


</body>
