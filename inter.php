<?php
$ditelindja=date('Y/m/d');
echo $ditelindja;

$viti = substr($ditelindja,0,4);
echo $viti;
$muaji = substr($ditelindja,5,2);
echo $muaji;
$dita = substr($ditelindja,8,2);
echo $dita;

$ditelindja = $dita . "-" . $muaji . "-" . $viti;

echo $ditelindja;
?>
