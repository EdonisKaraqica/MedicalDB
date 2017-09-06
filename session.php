<?php
session_start();

if(isset($_SESSION['CurrentUser']))
{
	echo"Miresevini ".$_SESSION['CurrentUser']." .Ky eshte profili juaj.<br>Log out:<br>";
echo "<a href='logout.php'>Logout</a>";
}
else
{
	echo"Ju nuk jeni loguar.Log in:<br>";
	echo"<a href='login.php'>Login</a>";
}
?>

