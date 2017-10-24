<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'sherbimimjeksor';
// Create connection
//$conn = mysqli_connect($servername, $username, $password,$dbname);
	$connect=mysqli_connect($servername, $username, $password,$dbname);
	$sql="SELECT * FROM tblrekordetstaff";
	$result=mysqli_query($connect,$sql) or die( "Error");

	//select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did) as t1
	//viti
	//select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did and year(r.data_regjistrimit)='2017') as t1
	//muaji
	//select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did and month(r.data_regjistrimit)='09') as t1
//java
	//select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did and week(r.data_regjistrimit)='36') as t1
 //java + viti
	//select * from (SELECT r.rid,p.emri,p.mbiemri,d.emri as 'emri doktorit',d.mbiemri as 'mbiemri doktorit',r.shifra_veprimtarise,r.pozita_punes,r.anamneza_konstatimi,r.diagnoza,r.terapia,r.ku_udhezohet,r.data_regjistrimit,r.data_paraqitjes_serishme,r.cmimi from tblrekordetstaff as r INNER JOIN tblpacientatstaff as p INNER JOIN tbldoktoret as d WHERE p.pid=r.pid and r.did=d.did and week(r.data_regjistrimit)='36' and year(r.data_regjistrimit)='2017') as t1

 ?>



<html>
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(function() {
	$('#statistika').hide();
    $('#java').hide();
    $('#muaji').hide();
    $('#viti').hide();
    $('#type').change(function(){
        if($('#type').val() == 'Java') {
            $('#java').show();
        } else {
            $('#java').hide();
        }
        if($('#type').val() == 'Muaji') {
            $('#muaji').show();
        } else {
            $('#muaji').hide();
        }
        if($('#type').val() == 'Viti') {
            $('#viti').show();
        } else {
            $('#viti').hide();
        }
    });
});
</script>

</head>

<body>
<div style="margin:100px">
<form class="form-horizontal" method="get" action="export1.php">
<fieldset>

<!-- Form Name -->
<legend>Statistikat e raporteve te kontrolleve ne periudha kohore</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Shfaq statistikat sipas</label>
  <div class="col-md-4">
    <select id="type" name="selectbasic" class="form-control">
      <option value="">Zgjedhe</option>
      <option value="Java">Javes</option>
      <option value="Muaji">Muajit</option>
      <option value="Viti">Vitit</option>
    </select>
  </div>
</div>

</fieldset>
<div id="java">
	 <label class="col-md-4 control-label" for="selectbasic">Zgjedhe javen</label>
  <div class="col-md-4">

<input type="week" id="javainput" name="javainput" class="form-control" value="2017-W36">


<button type="submit" id="btnJava" name="btnJava" class="form-control">Kerko</button>


<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myWeek").value;
    document.getElementById("demo").innerHTML = x;
}
</script>

</div>
</div>

<!-- Select Basic -->



<div id="muaji">
	 <label class="col-md-4 control-label" for="selectbasic">Zgjedhe Muajin</label>
  <div class="col-md-4">

<input type="month" id="muajiinput" name="muajiinput" class="form-control" value="2017-09">


<button type="submit" id="btnMuaji" name="btnMuaji"  class="form-control">Kerko</button>


<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myWeek").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
</div>
</div>

<div id="viti">
	 <label class="col-md-4 control-label" for="selectbasic">Zgjedhe Vitin</label>


<div class="col-md-4">
    <select id="vitiinput" name="vitiinput" class="form-control">
    	<option value="2018">2018</option>
      <option selected="selected" value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>

    </select>
    <button type="submit" id="btnViti" name="btnViti"  class="form-control">Kerko</button>
  </div>





<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("myWeek").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
</div>
</div>


</fieldset>

</form>
</div>





</body>
</html>
