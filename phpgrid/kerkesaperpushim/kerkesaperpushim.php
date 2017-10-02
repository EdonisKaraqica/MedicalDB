<html lang="en">
 <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);

$pid = $_GET['id'];
$user = $_SESSION['CurrentUser'];


//echo $user;
//echo $_SESSION['CurrentUser'];

$sqlpacienti = "select emri, mbiemri, departamenti, njesia from tblpacientatstaff where pid='" . $pid . "'";
$sqlpacres = mysqli_query($conn,$sqlpacienti);
$res=mysqli_fetch_array($sqlpacres);

$emri = $res["emri"];
$mbiemri = $res["mbiemri"];
$dept = $res["departamenti"];
$njesia = $res["njesia"];

$_SESSION["emri"] = $emri;
$_SESSION["mbiemri"] = $mbiemri;
$_SESSION["departamenti"] = $dept;
$_SESSION["njesia"] = $njesia;
$_SESSION['pid'] = $pid;
?>

<div class="wrapper">


<!-- Form Name -->


<!-- Text input-->
<form class="form-horizontal" method="post" action="kerkesaprocess.php">
<fieldset>

<!-- Form Name -->
<legend>Kërkesë Për Pushim Mjekësor</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="em">Emri Mbiemri</label>
  <div class="col-md-2">
  <input id="em" name="em" type="text" placeholder="" class="form-control input-md" value="<?php echo $res["emri"]; echo " "; echo $res["mbiemri"]; ?>">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="departamenti">Departamenti</label>
  <div class="col-md-2">
  <input id="njesia" name="departamenti" type="text" placeholder="" class="form-control input-md" value="<?php echo $res["departamenti"];?>">

  </div>
</div>

<!-- Text input-->
<div class="form-group" method="post" action="kerkesaprocess.php">
  <label class="col-md-4 control-label" for="njesia">Njësia</label>
  <div class="col-md-2">
  <input id="njesia" name="njesia" type="text" placeholder="" class="form-control input-md" value="<?php echo $res["njesia"];?>">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="arsyetimi">Arsyetimi</label>
  <div class="col-md-4">
    <textarea class="form-control" id="arsyetimi" name="arsyetimi"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataprej">Data Nga:</label>
  <div class="col-md-2">
  <input id="dataprej" name="dataprej" type="date" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dataderi">Deri:</label>
  <div class="col-md-2">
  <input id="dataderi" name="dataderi" type="date" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnDergo"></label>
  <div class="col-md-4">
    <button id="btnDergo" name="btnDergo" class="btn btn-primary">Dërgo Kërkesë</button>
  </div>
</div>

</fieldset></div>
</form>
</html>
