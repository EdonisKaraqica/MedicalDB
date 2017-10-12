
<?php include( 'databaze.php');

$conn=mysqli_connect($servername, $username, $password,$dbname);
$conn=mysqli_connect($servername, $username, $password,$dbname);
if(isset($_GET['id'])){

$sql="SELECT * FROM tblpacientatstaff where pid='".$_GET['id']."'"; 
$res=mysqli_query($conn,$sql) or die( "Error"); 

while ($row=mysqli_fetch_assoc($res)) 
   { 
      $emri=$row['emri']; 
      $mbiemri=$row['mbiemri'];
      
      $pid=$row[ 'pid'];
      $limakid=$row[ 'limakid'];
      $ditelindja=$row[ 'ditelindja']; 
      $telefoni=$row[ 'nrtel']; 
      $adresa=$row[ 'adresa']; 
      $email=$row[ 'email']; 
      $vendlindja=$row[ 'vendlindja']; 
      $alergjite=$row['alergjite'];
      }
     
     
    }
    if(isset($_GET['id'])||isset($_GET['kidselect'])){
     $sql22="SELECT rid FROM tblrekordetstaff ORDER BY rid DESC LIMIT 1;";
     
      $res2=mysqli_query($conn,$sql22) or die( "Error");   
while ($row1=mysqli_fetch_assoc($res2)) 
   { 
      $rid=$row1['rid']; 
      
      }
    }else{
      $sql22="SELECT rid FROM tblrekordetpax ORDER BY rid DESC LIMIT 1;";
     
      $res2=mysqli_query($conn,$sql22) or die( "Error");   
while ($row1=mysqli_fetch_assoc($res2)) 
   { 
      $rid=$row1['rid']; 
      
      }

    }





 ?>

      <?php
       session_start();
       $username=$_SESSION['CurrentUser'];
       $sql1="SELECT emri,mbiemri,email,nrtel FROM tbldoktoret where username='".$username."'"; 
         $res1=mysqli_query($conn,$sql1) or die( "Error");
         while ($row1=mysqli_fetch_assoc($res1)) 
   { 
      $emriDok=$row1[ 'emri']; 
      $mbiemriDok=$row1['mbiemri'];
      $email=$row1[ 'email']; 
      $nrtel=$row1['nrtel'];
      } ?>

<html>
   <head>
    <style>
    div.step-content
    {
      height:auto;
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
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Materializecss compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <!--Import Materialize-Stepper CSS -->
      <link rel="stylesheet" href="stepper/materialize-stepper.min.css">
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="materialize/js/materialize.min.js"></script>
      <script src="stepper/materialize-stepper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script type="text/javascript">
         submitForms = function() {
             document.forms["form1"].submit();
         }

         submitForms2 = function() {
             document.forms["form2"].submit();
         }
         
         function anyThing() {
             setTimeout(function() {
                 $('.stepper').nextStep();
             }, 150);
         }
         
         $(function() {
             $('.stepper').activateStepper();
         });
         $(document).ready(function () {
          $('.datepicker').datepicker();
        });
         

$(document).ready(function(){
    $('input.timepicker').timepicker({});
});


  // $('#timepicker').pickatime({
  //   autoclose: false,
  //   twelvehour: false,
  //   afterDone: function(Element, Time) {
  //       console.log(Element, Time);
  //   }
  // });

      </script>
   </head>
   <body>
 
      <?php $currentDate = date("Y/m/d") ?>
      <form name="form1" method="post" action="ushtrime1.php" target="_blank" enctype="multipart/form-data" class="form-horizontal" style="margin:50px;">
         
<!-- Kto nevoiten per te dhenat personale -->
         <input type="hidden" name="username" value="<?php echo $username;?>">
         <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
         <input type="hidden" name="emriDok" value="<?php echo $emriDok; ?>">
         <input type="hidden" name="mbiemriDok" value="<?php echo $mbiemriDok; ?>">
         <input type="hidden" name="emailDok" value="<?php echo $email; ?>">
         <input type="hidden" name="nrtel" value="<?php echo $nrtel; ?>">

<!-- Kto nevoiten per raportin e fundit lidhur me pushimin afatgjate -->
          <input type="hidden" name="data1" value="<?php echo $data1;?>">
         <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
         <input type="hidden" name="emriDok" value="<?php echo $emriDok; ?>">
         <input type="hidden" name="mbiemriDok" value="<?php echo $mbiemriDok; ?>">
         <input type="hidden" name="emailDok" value="<?php echo $email; ?>">
         <input type="hidden" name="nrtel" value="<?php echo $nrtel; ?>">

         <div class="row ">
            <div class="col s12 ">
               <div class="card">
                  <div style="clear:left; float:left">
                     <div>
                        <!-- <img src="LimakLogo.jpg" style="height:100px;width:150px";> -->
                        <h4 class="center-align" style="color:blue"> Raport Mjekësor <small>Medical Report</small></h4>
                     </div>
                     <br>
                     <?php if(isset($_GET['id']))
                     {
                        include("staff.php");
                     }elseif (isset($_GET['kidselect'])) {
                      $sql2 = "UPDATE tblkerkesat set approved=1,shqyrtuar=1 where kid='" . $_GET['kidselect'] . "'";
                      $query2 = mysqli_query($conn,$sql2);
                      include("../aprovimi_me_email.php");
                       include("staff_nga_kerkesat.php");

                     }
                     else{
                        include("pax.php");
                     }
                     ?>
                     <!-- Text input-->
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Ankesa
                        <br><small>(Complaint):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="ankesa" type="text" placeholder="" size="515" class="form-control input-md">
                        </div>
                     </div>



                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Anamneza e semundjes
                        <br> <small>(Disease Anamnesis):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="anamneza" type="text" placeholder="" size="515" class="form-control input-md">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Anamneza e familjes
                        <br><small>(Family Anamnesis):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="anFamiljes" type="text" placeholder="" size="400" class="form-control input-md">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Ekzaminimi fizikal
                        <br> <small>(Physical examination):</small>
                        </label>
                       <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">TA:
                                             </label>
                                             <div class="input-field col-md-2">
                                                <input type="text"" name="ta"  pattern="[0-9]"  id="ta title="TA duhet te permbaj vetem numra"  placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                              <label class="col-md-1 control-label" for="Emri">Pulsi: 
                                             </label>
                                             <div class="input-field col-md-2">
                                                <input type="text"  name="pulsi" pattern="[0-9]" id="pulsi" placeholder="" value="" size="100"   title="Pulsi duhet te permbaj vetem numra" class="form-control input-md">
                                             </div>
                                             <label class="col-md-1 control-label" for="Emri">SPO<sub>2</sub>: 
                                             </label>
                                             <div class="input-field col-md-2">
                                                <input type="text" name="spo2" pattern="[0-9]" id="spo2" placeholder="" value="" size=" 100"  title="SPO2 duhet te permbaj vetem numra"  class="form-control input-md">
                                             </div>
                                              <label class="col-md-2 control-label" for="Emri">Koment
                        <br><small>(Comment):</small>
                        </label>
                        <div class="input-field col-md-8" style="margin-left: 13px;" >
                           <input id="Emri" name="koment" type="text" placeholder="" size="400" class="form-control input-md">
                        </div>
                        </div>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Laboratori
                        <br><small>(Laboratory):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="laboratori" type="text" placeholder="" size="400" class="form-control input-md">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Diagnoza
                        <br><small>(Diagnosis):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="diagnoza" type="text" placeholder="" size="400" class="form-control input-md">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Trajtimi
                        <br><small>(Medical Treatment):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="trajtimi" type="text" placeholder="" size="10" class="form-control input-md">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Përfundimi
                        <br><small>(Conclusion):</small>
                        </label>
                        <div class="input-field col-md-11">

                           <input id="Emri" name="perfundimi" type="text" placeholder="" size="400" class="form-control input-md">
                        </div>
                     </div>
                     
                  
                     <div class="section">
                        <div class="row">
                           <div class="col s12">
                              <ul class="stepper">
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">Raporti Mjekesor</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Raporti
                                             <br> <small>(Report):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="Emri" name="rap" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step-actions">
                                          <button name="" class="waves-effect waves-dark btn next-step blue" data-feedback="anyThing">Continue</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">Recete</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                        
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Rp<small>:</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                              

                                                <input id="receta" name="rp" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri"><small>:</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                              
                                                <?php include("zgjedh_barnat.php"); ?>
                                             </div>
                                          </div>

                                         


                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                          
                                         
                                           
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">Udhezim per konsultime</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Udhëzohet për
                                             <br> <small>(Guided for):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="udhPer" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Gjendja prezente
                                             <br> <small>(Present condition):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="gjPrez" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Terapia e aplikuar
                                             <br><small>(Applied therapy):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="terapiaAp" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">Udhezim per ekzaminime laboratorike</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Udhëzohet për
                                             <br> <small>(Guided for):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="udhPerLab" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <!-- <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Diagnoza
                                             <br><small>(Diagnosis):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="diagnozaLab" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div> -->
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Gjendja prezente
                                             <br> <small>(Present condition):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="gjPrezLab" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Terapia e aplikuar
                                             <br><small>(Applied therapy):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="terLab" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step-actions">
                                       <div class="input-field">
                                          <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                       </div>
                                          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                              <div class="file-field input-field" style="margin:10px;">
                                                  <div class="btn">
                                                      <span>File</span>
                                                      <input type="file"  name="userfile" id="userfile">
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                      <input class="file-path validate" type="text" placeholder="Upload files">
                                                  </div>
                                              </div>
                                          <button class="waves-effect waves-dark btn-flat previous-step" style="margin-top: 10px;">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">Udhezim per ekzaminime rentgenologjike</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Udhëzohet për
                                             <br> <small>(Guided for):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="udhezohetPerRent" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <!-- <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Diagnoza
                                             <br><small>(Diagnosis):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="diagnozaRent" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div> -->
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Gjendja prezente
                                             <br> <small>(Present condition):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="gjPrezenteRent" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Terapia e aplikuar
                                             <br><small>(Applied therapy):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="terapiaApRent" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                       <li class="step">
                                    <div class="step-title waves-effect waves-dark">Raport udhetimi per pasagjer</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Origjina
                                             <br> <small>(Origin):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="origjina" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Destinimi
                                             <br><small>(Destination):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="destinacioni" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Shenime
                                             <br> <small>(Notes):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="shenime" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="step-actions">
                                        <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                           <div class="file-field input-field" style="margin-top: -5px;">
                                               <div class="btn">
                                                   <span>File</span>
                                                   <input type="file"  name="userfile1" id="userfile1"">
                                               </div>
                                               <div class="file-path-wrapper">
                                                   <input class="file-path validate" type="text" placeholder="Upload files">
                                               </div>
                                           </div>
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                                <?php if((isset($_GET['id']))||(isset($_GET['kidselect']))){echo '
                                  <li class="step" id="divId">
                                    <div class="step-title waves-effect waves-dark">Leje per largim nga vendi i punes</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Qellimi i largimit
                                             <br> <small>(Reason of leave):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="qellimiLar" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Koha e largimit
                                             <br><small>(Time of leave):</small>
                                             </label>
                                              <label class="col-md-1 control-label" for="Emri">Prej
                                             <br> <small>(From):</small>
                                             </label>
                                             <div class="input-field col-md-4">
                                          
                                                <input name="prej" style="" id="timepicker" type="text" class="form-control timepicker" >
                                             </div>
                                              <label class="col-md-1 control-label" for="Emri">Deri 
                                             <br> <small>(To):</small>
                                             </label>
                                         
                                             <div class="input-field col-md-4">
                                                   <input name="deri" id="deri" type="text" class="form-control timepicker">
                                             </div>
                                          </div>
                                       </div>
                                       
                                       <div class="step-actions">
                                         <button class="waves-effect waves-dark btn next-step blue">CONTINUE</button>
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>
                                 
<!-- Nese nevoitet qe doktori me plotesu vet pushimin ateher ai e merr direkt prej fajllit nderprerje_pune.php -->
                                   
                                   
                                   
                                   '; 
                                  if(isset($_GET['kidselect'])) {
                                      include("nderprerje_pune.php");
                                  } else {
                                      include("nderprerje_pune1.php");
                                  }
                                   
                                     ?>

                          </div>
                          <?php }else{
                            // if(isset($_GET['kidselect'])) {
                            //           include("nderprerje_pune.php");
                            //       } else {
                            //           include("nderprerje_pune1.php");
                            //       }

                          ?>
                          <input style="display:none" type="file" name="userfile3" value="">
                           <input type="hidden" name="qellimiLar" value="">
                           <input type="hidden" name="prej" value="">
                           <input type="hidden" name="deri" value="">
                           <input type="hidden" name="enti" value="">
                           <input type="hidden" name="fillimi" value="">
                           <input type="hidden" name="fundi" value="">
                           <input type="hidden" name="numri" value="">
                           <input type="hidden" name="komentRaport" value="">
                           <input type="hidden" name="fillimi" value="">
                           <input type="hidden" name="fillimi" value="">



                          <style type="text/css">#divId{
                          
                          }</style>
                          <?php
                          }?>
                              </ul>
                           </div>
                        </div>
                     </div>                   
      </form>
      
      <div class="center-align">
      <button class="btn waves-effect waves-light z-depth-5" type="submit" value="Gjenero Raportin" onclick="submitForms()" name="action">Gjenero raportin<i class="material-icons right">send</i>
      </button>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- <input type="button" class="btn primary" style="float:right" value="Gjenero Raportin" onclick="submitForms()" /> -->

   </body>
</html>