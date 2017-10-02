

<?php 
//require 'C:/xampp/htdocs/FPDF/fpdf.php';
require('dianapdf.php');
require_once("databaze.php");
// session_start();
// include("ruajtjanedb.php");
$_SESSION['uploadid']='null';

if((isset($_POST['action'])||isset($_GET['kidselect'])) && ($_FILES['userfile']['size'] > 0))
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
// include 'library/config.php';
// include 'library/opendb.php';
$conn=mysqli_connect($servername, $username, $password,$dbname); 

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
//besarbi
$sqlupid = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
 $result = $conn->query($sqlupid);



        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $uploadid=$row['id'];
            }
        } else {
            echo "0 results";
        }
        // echo $uploadid+1;
        $_SESSION['uploadid']=$uploadid+1;

mysqli_query($conn,$query) or die('Error, query failed'); 
}



if(isset($_POST['action']) && $_FILES['userfile1']['size'] > 0)
{
$fileName1 = $_FILES['userfile1']['name'];
$tmpName1  = $_FILES['userfile1']['tmp_name'];
$fileSize1 = $_FILES['userfile1']['size'];
$fileType1 = $_FILES['userfile1']['type'];

$fp1      = fopen($tmpName1, 'r');
$content1 = fread($fp1, filesize($tmpName1));
$content1 = addslashes($content1);
fclose($fp1);

if(!get_magic_quotes_gpc())
{
    $fileName1 = addslashes($fileName1);
}
// include 'library/config.php';
// include 'library/opendb.php';
$conn1=mysqli_connect($servername, $username, $password,$dbname); 

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName1', '$fileSize1', '$fileType1', '$content1')";

$sqlupid = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
 $result = $conn->query($sqlupid);



        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $uploadid=$row['id'];
            }
        } else {
            echo "0 results";
        }
        // echo $uploadid+1;
        $_SESSION['uploadid']=$uploadid+1;

mysqli_query($conn,$query) or die('Error, query failed'); 
}



if($_FILES['userfile3']['size'] > 0)
{
$fileName3 = $_FILES['userfile3']['name'];
$tmpName3 = $_FILES['userfile3']['tmp_name'];
$fileSize3 = $_FILES['userfile3']['size'];
$fileType3 = $_FILES['userfile3']['type'];

$fp3      = fopen($tmpName3, 'r');
$content3 = fread($fp3, filesize($tmpName3));
$content3 = addslashes($content3);
fclose($fp3);

if(!get_magic_quotes_gpc())
{
    $fileName3 = addslashes($fileName3);
}
// include 'library/config.php';
// include 'library/opendb.php';
$conn3=mysqli_connect($servername, $username, $password,$dbname); 

$query3 = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName3', '$fileSize3', '$fileType3', '$content3')";
$sqlupid = "SELECT id FROM upload ORDER BY id DESC LIMIT 1";
 $result = $conn->query($sqlupid);



        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $uploadid=$row['id'];
            }
        } else {
            echo "0 results";
        }
        // echo $uploadid+1;
        $_SESSION['uploadid']=$uploadid+1;


mysqli_query($conn3,$query3) or die('Error, query failed'); 
}


if(isset($_POST['udhetar'])){
    require("ruajtjanedbpax.php");
    $pdf = new createPDF(
            $_POST
        //$_POST['first_name'],   // html text to publish
    
        /*$_POST['last_name'],  // article title
        $_POST['gender'],    // article URL
        $_POST['mobile'], // author name
        $_POST['dob'],
        $_POST['mobile'],
        $_POST['email'],    
        time()
          */
    );
    $pdf->run();


     $filePath = "myPdf.pdf";
    $pdf=new FPDF('p');
    $pdf->Output($filePath,'I');
}else
{
require("ruajtjanedb.php");
$pdf = new createPDF(
            $_POST
        //$_POST['first_name'],   // html text to publish
    
        /*$_POST['last_name'],  // article title
        $_POST['gender'],    // article URL
        $_POST['mobile'], // author name
        $_POST['dob'],
        $_POST['mobile'],
        $_POST['email'],    
        time()
          */
    );
    $pdf->run();


     $filePath = "myPdf.pdf";
    $pdf=new FPDF('p');
    $pdf->Output($filePath,'I');
}




    /////////////
    
    
     


?>


