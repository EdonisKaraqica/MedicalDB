                     <?php 
                     $kid=$_GET['kidselect'];
                     $connect = mysqli_connect("localhost", "root", "", "sherbimimjeksor");
                     $sql = "select a.data1, a.data2 from tblkerkesat as a where a.kid=".$kid;
                     $result = mysqli_query($connect, $sql);
                     while ($row=mysqli_fetch_assoc($result)) 
                        { 
                           $fillimi=$row[ 'data1']; 
                           $mbarimi=$row[ 'data2'];
                        }
                        
                     ?>
                          <li class="step">
                                    <div class="step-title waves-effect waves-dark">Raport i ndërprerjes së përkohëshme për punë</div>
                                    <div class="step-content" style="height:auto">
                                       <div class="row">
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Enti shëndetësor
                                             <br> <small>(Health entity):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="enti" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>

                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Dita e parë
                                             <br><small>(First day):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                          
                                                <input name="fillimi" id="fillimi" type="text" value="<?php echo $fillimi;?>" class="form-control datepicker">
                                             </div>
                                              


                                          </div>
                                           <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Dita e fundit
                                             <br><small>(Last day):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                          
                                                <input name="fundi" id="fundi" type="text" value="<?php echo $mbarimi;?>" class="form-control datepicker">
                                             </div>
                                          </div>
                                           <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Numri i ditëve pushim
                                             <br><small>(Number of days off):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                          
                                                <input name="numri" id="numri" type="text" class="">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-1 control-label" for="Emri">Koment
                                             <br> <small>(Comment):</small>
                                             </label>
                                             <div class="input-field col-md-10">
                                                <input id="receta" name="komentRaport" type="text" placeholder="" value="" size="100" class="form-control input-md">
                                             </div>
                                          </div>

                                       </div>
                                       
                                       <div class="step-actions">
                                           <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
                                          <tr> 
                                          <td width="246">
                                          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                          <input name="userfile3" type="file" id="userfile3"> 
                                          </td>
                                          <!-- <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
                                           --></tr>
                                          </table>
                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                       </div>
                                    </div>
                                 </li>