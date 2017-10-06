<?php 

?>
<html>
<head>

<style>

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
<form>
                     <div class="card-content">
                        <div class="form-group">
                           <div class="row center-align">
                              <label class="col s1" for="Emri"> Emri
                              <br> <small>(name):</small>
                              </label>
                              <div class="input-field col s5">
                                 <input id='Emri' name='emri' type='text' placeholder='' value='<?php  echo $emri." ".$mbiemri; ?>' size='100' class='form-control input-md'>
                                 
                              </div>
                              <div class="form-group center-align">
                                 <label class="col s1" for="Emri">Telefoni
                                 <br><small>(Phone):</small>
                                 </label>
                                 <div class="input-field col s5">
                                    <input id="Emri" name="telefoni" type="text" placeholder="" value="<?php echo $telefoni; ?>" size="120" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group center-align">
                           <div class="row">
                              <label class="col s1" for="Emri">Numri ID
                              <br><small>(ID no):</small>
                              </label>
                              <div class="input-field col s5">
                                 <input id="Emri" name="numriID" type="text" placeholder="" value="<?php echo $limakid; ?>" class="form-control input-md">
                              </div>
                              <div class="form-group center-align">
                                 <label class="col s1" for="Emri">Adresa
                                 <br><small>(Address):</small>
                                 </label>
                                 <div class="input-field col s5">
                                    <input id="Emri" name="adresa" type="text" placeholder="" value="<?php echo $adresa; ?>" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row center-align">
                              <label class="col s1" for="Emri">Ditëlindja
                              <br><small>(DOB)</small>
                              </label>
                              <div class="input-field col s5">
                                 <input id="Emri" name="ditelindja" type="text" placeholder="" value="<?php echo $ditelindja; ?>" class="form-control input-md">
                              </div>
                              <div class="form-group center-align">
                                 <label class="col s1" for="Emri">Email<small>:</small>
                                 <br>
                                 </label>
                                 <div class="input-field col s5">
                                    <input id="Emri" name="email" type="text" placeholder="" value="<?php echo $email; ?>" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row center-align">
                              <label class="col s1" for="Emri">Vendlindja
                              <br><small>(Place of birth):</small>
                              </label>
                              <div class="input-field col s5">
                                 <input id="Emri" name="vendlindja" type="text" placeholder="" value="<?php echo $vendlindja; ?>" class="form-control input-md">
                              </div>
                              <div class="form-group center-align">
                                 <label class="col s1" for="height">Numri Dosjes
                                 <br><small>(File No):</small>
                                 </label>
                                 <div class="input-field col s5">
                                    <input id="Emri" name="nrDosjes" type="text" placeholder="" value="<?php echo $rid+1; ?>" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row center-align">
                              <label class="col s1" for="Emri">Gjinia
                              <br> <small>(Gender):</small>
                              </label>
                              <div class="input-field col  s5">
                                 <input id="Emri" name="gjinia" type="text" placeholder="" class="form-control input-md">
                              </div>
                              <div class="form-group center-align">
                                 <label class="col s1" for="Emri">Njësia
                                 <br><small>(Unit):</small>
                                 </label>
                                 <div class="input-field col s5">
                                    <input id="Emri" name="njesia" type="text" placeholder="" class="form-control input-md">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <?php if(!$alergjite==NULL){ ?>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Alergjitë
                        <br><small>(Allergy):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="alergjite" type="text" placeholder="" value="<?php echo $alergjite; ?>" size="400" class="form-control input-md">
                        </div>
                     </div><?php }else{?>
                     <div class="form-group">
                        <label class="col-md-1 control-label" for="Emri">Alergjitë
                        <br><small>(Allergy):</small>
                        </label>
                        <div class="input-field col-md-11">
                           <input id="Emri" name="alergjite" type="text" placeholder="" value="" size="400" class="form-control input-md">
                        </div>
                     </div><?php }?>
                     </form>
          </body>
   </html>