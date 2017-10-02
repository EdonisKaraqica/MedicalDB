


<?php
if(isset($_GET['id']))
{
// if id is set then get the file with the id from database

$id    = $_GET['id'];
include 'databaze.php';
$conn=mysqli_connect($servername, $username, $password,$dbname);
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die('Error, query failed');
list($name, $type, $size, $content) =mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

exit;
}

?>
