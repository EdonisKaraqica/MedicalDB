<html>
<style>
@import "bourbon";

body {
	font-size: 13px;
	line-height: 20px;
	background: url('https://dl.dropbox.com/u/65958930/OLR/dust.png') center center;
	text-align: enter;
}

.wrapper {
	margin-top: 80px;
  margin-bottom: 80px;
}
.buton{
    background-color: #808080;
    color: #808080;
    border-color: #808080;
}
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
}


</style>
<body>
<?php
session_start();
if (isset($_SESSION["CurrentUser"]))	{
	//header("atdheu.php");
}
?>
<head>
<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<!--  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<?php

include('databaze.php');
$passwordiErr=$nameErr="";
$passwordi=$name="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["name"]))
	   {
     $nameErr = "<i>Kerkohet emri</i>";

   }
   else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "<i>Lejohen vetem shkronjat dhe zbrazetirat<i>";
     }
   }
   if (empty($_POST["passwordi"]))
	   {
     $passwordiErr = "<i>Kerkohet passwordi</i>";

   }
   else {
     $passwordi = test_input($_POST["passwordi"]);
   }
}
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
  <div class="wrapper">
<form method="post" action="" class="form-signin">
    <div></div>
<h2 class="form-signin-heading">Please login</h2>
Username  <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
   <br>

Password <input type="password" class="form-control" name="passwordi" value="<?php echo $passwordi;?>">
   <br>
   <input type="submit"  class="btn btn-lg btn-primary btn-block " style="background-color:#424242; border-color: #424242; name="Submit" value="Login" />
   <input type="Submit"  class="btn btn-lg btn-primary btn-block" style="background-color:#424242; border-color: #424242; " name="ForgotPassword" value="Forgot Password?"/>
    <?php
   if($_SERVER['REQUEST_METHOD']=='POST')
{
	$name=$_POST["name"];
	$passwordi=$_POST['passwordi'];
    Kycu($name,$passwordi);
	$_SESSION['forgot'] = $name;
}
   ?>
<?php
if(isset($_POST['Submit']))
{
if(empty($name) || empty($passwordi))
	{
		echo "<br><br>Mbush fushat e mesiperme";
	}

}
else if(isset($_POST['ForgotPassword']))
{
  ?>
  <script type="text/javascript">
    function load()
    {
    window.location.href = "forgotpassword.php";

    }
    </script>
	<body onload="load()">
    </body>
  <?php
}
//Funksioni //Sesioni
function Kycu($name,$passwordi)
{
include('databaze.php');
$_SESSION['CurrentUser']=$name;
$conn = mysqli_connect($servername, $username, $password,$dbname);
//besarbb
$passwordi=md5($passwordi);
$saltquery="select salt from tbldoktoret where username='".$name."'";
//echo $saltquery;
$salt=mysqli_query($conn,$saltquery) or die("Error");
$saltrow = mysqli_fetch_assoc($salt);
$salti = $saltrow['salt'];;
echo $salti; //ktu e kem marr saltin e user-it prej databaze
$saltedhash = md5($passwordi,$salti); //ktu i kem bo saltedhash = inputpasshash+salt
//besarbb
$sql = "SELECT username FROM tbldoktoret Where username='$name' and hashedpwd='$passwordi'";
$res=mysqli_query($conn,$sql) or die("Error");
//$result = $conn->query($name1);
$row = mysqli_fetch_assoc($res);
$loguar = $res->num_rows > 0;
$_SESSION['username']=$row['username'];
if ($loguar) {

?>
<script type="text/javascript">
    function load()
    {
    window.location.href = "mdl-template-dashboard/home.php";

    }
    </script>
	<body onload="load()">
    </body>
<?php


}else{

	echo "<br>Gabim ne username ose password<br>";
}
$conn->close();

}

  ?>
  </form>
</div>
</body>
</html>
