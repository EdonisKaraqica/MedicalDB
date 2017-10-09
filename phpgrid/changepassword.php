<?php
//require("../databaze.php");
session_start();
$username=$_SESSION['CurrentUser'];
$oldpwd = $_POST["oldpwd"];
$newpwd = $_POST["newpwd"];
$newpwd2 = $_POST["newpwd2"];
$tabela = $_SESSION['tabela'];

$servername = "localhost";
$uname = "root";
$srvpwd = "";
$dbname = 'sherbimimjeksor';
// Create connection
$conn = mysqli_connect($servername, $uname, $srvpwd,$dbname);
$oldpwd = md5($oldpwd); //hashimi i passwordit aktual
$sqloldpwd = "SELECT hashedpwd from " . "$tabela" . " where username='" . "$username" . "'";
$tblpwd = mysqli_query($conn,$sqloldpwd) or die("Error");
$pwdrow = mysqli_fetch_assoc($tblpwd);
$oldpwdvalue = $pwdrow['hashedpwd']; //marrja e pwd-se nga db


if($oldpwd != $oldpwdvalue)
{
  ?>
  <body>
  <h2 style="font-family:'Book Antiqua'">Fjalekalimi aktual nuk eshte i sakte!</h2>
  <h3 style="font-family:'Book Antiqua'"><a href="javascript:history.back()"><b>Kthehu prapa</b></a></h3>
  </body>
  <?php
}
else{

  if(($newpwd != $newpwd2) || (strlen($newpwd) < 6))
  {
    //echo strlen($newpwd) ?>
  <body>
  <h2>Fjalekalimi i ri me fjalekalimin e konfirmuar nuk jane te njejte! Fjalekalimi duhet te kete se paku 6 karaktere!</h2>
  <h3><a href="javascript:history.back()"><b>Kthehu prapa</b></a></h3>
  </body>
  <?php
  }
  else {
    $newpwd = md5($newpwd);
    $salt = randomNumber(4);


    $sqlchangepwd = "UPDATE " . $tabela . " SET hashedpwd ='" . $newpwd . "', salt='" . $salt . "' WHERE " . $tabela . ".username='" . $username . "'";

    //echo $sqlchangepwd;

    if(!mysqli_query($conn,$sqlchangepwd)){
      echo "ERROR: Could not able to execute $sqlchangepwd. " . mysqli_error($conn);
    }
    else{
      echo '<script language="javascript">';
  		echo 'alert("Fjalekalimi eshte ndryshuar me sukses!")';
  		echo '</script>';

      if($tabela == "tbldoktoret") //fillimi
      {
?>
      <script type="text/javascript">
        function load()
        {

        window.location.href = "../mdl-template-dashboard/home.php";

        }
        </script>
    	<body onload="load()">
        </body>
<?php
      }
      else{

        ?>
              <script type="text/javascript">
                function load()
                {

                window.location.href = "../mdl-template-dashboard/userhome.php";

                }
                </script>
            	<body onload="load()">
                </body>
        <?php

      }
    }//fundi

  }

}


function randomNumber($length) {
  $result = '';

  for($i = 0; $i < $length; $i++) {
      $result .= mt_rand(0, 9);
  }

  return $result;
  }

 ?>
