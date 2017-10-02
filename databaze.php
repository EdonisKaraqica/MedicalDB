<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'sherbimimjeksor_rina';
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 /*else{
    echo "connected";
}
*/
// Create database
//$sql = "CREATE database medicaldb";
//if (mysqli_query($conn, $sql)) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database: " . mysqli_error($conn);
//}

mysqli_close($conn);
?>