<?php
session_start();
?>
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
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php
$passwordi="";
$passwordiErr=$nameErr="";
$name = $_SESSION['forgot'];

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
<h2 class="form-signin-heading">Change password</h2>
Username  <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
   <br>

Password <input type="password" class="form-control" name="passwordi" value="<?php echo $passwordi;?>">
    <br>

    Confirm Password <input type="password" class="form-control" name="passwordi" value="<?php echo $passwordi;?>">
    <br>
   <input type="Submit"  class="btn btn-lg btn-primary btn-block"  name="Save" value="Save" > 
 
<?php
if(isset($_POST['Save']))
{
//include('databaze.php');
$servername = getenv('mysql_server'); 
$username = getenv('mysql_username');
$password = getenv('mysql_password'); 
$dbname = "mysql";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name1 = "SELECT User FROM user Where User='$name'";
//echo $name1;
$result = $conn->query($name1);
$egziston = false;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $rowName = $row["User"];
    if ($rowName	==$name) 
	{
		
        $egziston = true;
    }
   }
} else {
    echo "<br><br>Please register first.";
}

if($egziston) 
{
	$new_password=$_POST['passwordi'];
	$sql="update User set authentication_string=Password('$new_password') WHERE user='$name'";
 if ($conn->query($sql) === TRUE) 
 {	 
echo "<br>Succesfully changed<br>";
}
else
{
 echo "Password not changed";
}
$conn->close();
}
}
?>
  </form>
  
  </div>
