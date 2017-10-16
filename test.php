<?php  
include("databaze.php");
// $sql12="select * from tblstocks";
//  $res1=mysqli_query($conn,$sql12) or die( "Error");
//          while ($row1=mysqli_fetch_assoc($res1)) 
//    { 
//     $json[] = $row1['emri'];
//       $barcode=$row1[ 'barcode']; 
//       $emriBarnes=$row1['emri'];
//       $sasia=$row1[ 'sasia']; 
//       $data_prodhimit=$row1['data_prodhimit'];
//       $data_skadimit=$row1['data_skadimit'];
//       }
?>
<!DOCTYPE html>
  <html>
    <head>
   
      
      <script type="text/javascript">
       $(document).ready(function() {
    $('select').material_select();
  });



       </script>
    <script>
// function myFunction() {


//     var x = document.createElement("INPUT");
//     x.setAttribute("type", "text");
//     x.setAttribute("value", "Hello World!");
//     document.body.appendChild(x);
  
// }
function myFunction() {
    if(document.getElementById('selectid').value == "tjeter") {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("value", "");
    x.setAttribute("placeholder", "Shenoni ilaç tjeter");
    x.setAttribute("class", "input-field col s12");
    document.getElementById("myDIV").appendChild(x);
  }
}
</script>

</head>
<body>

  

 

          <div class="input-field col s4">
            <input name="nrBarnave" type="number" placeholder="Sasia">
            
          </div>
        <div class="input-field col s4">
    <select name="njesia">
      <option value="" disabled selected>Njësia</option>
      <option name="cop" value="cop">cop</option>
      <option name="pako" value="pako">pako</option>
    </select>
  </div>
    </body>
  </html>

  <?php 


   ?>