<html>
<body>
<?php
session_start();
if (isset($_SESSION["CurrentUser"])) {
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
    <link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<?php

include('databaze.php');
$passwordiErr = $nameErr = "";
$passwordi = $name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "<i>Kerkohet emri</i>";

    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "<i>Lejohen vetem shkronjat dhe zbrazetirat<i>";
        }
    }
    if (empty($_POST["passwordi"])) {
        $passwordiErr = "<i>Kerkohet passwordi</i>";

    } else {
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
<div class="alignment">
    <img src="raportet/limak_logo.png" alt="Mountain View" style="width:400px;height:100px;">
</div>

<p class="alignment" style="color:#336699;font-weight:bold;">LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C</p>
<p class="alignment">Sherbimi Mjekesor/Medical Service</p>
<div class="wrapper">
    <form method="post" action="" class="form-signin">

        <h4 class="form-signin-heading alignment">Kyçu
            <small>(Login)</small>
        </h4>
        Emri i përdoruesit
        <small>(Username)</small>
        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        <br>

        Fjalëkalimi
        <small>(Password)</small>
        <input type="password" class="form-control" name="passwordi" value="<?php echo $passwordi; ?>">
        <br>
        <button type="submit" class="btn btn-primary btn-block" name="Submit"> Kyçu
            <small>(Login)</small>
        </button>
        <button type="Submit" class="btn btn-primary btn-block" name="ForgotPassword">Keni harruar fjalëkalmin?
            <small>(Forgot password?)</small>
        </button>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["name"];
            $passwordi = $_POST['passwordi'];
            Kycu($name, $passwordi);
            $_SESSION['forgot'] = $name;
        }
        ?>
        <?php
        if (isset($_POST['Submit'])) {
            if (empty($name) || empty($passwordi)) {
                echo "<br><br>Mbush fushat e mesiperme";
                exit();
            }

        } else if (isset($_POST['ForgotPassword'])) {
            ?>
            <?php
            header('Location: forgotpassword.php');
            exit();
        }
        //Funksioni //Sesioni
        function Kycu($name, $passwordi)
        {
            include('databaze.php');
            $_SESSION['CurrentUser'] = $name;
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT username,hashedpwd,salt FROM tbldoktoret Where username='$name'";
            $res = mysqli_query($conn, $sql) or die("Error");

            if ($res->num_rows != 0) {
                $passwordi = md5($passwordi);
                $saltquery = "select salt from tbldoktoret where username='" . $name . "'";
                //echo $saltquery;
                $salt = mysqli_query($conn, $saltquery) or die("Error");
                $saltrow = mysqli_fetch_assoc($salt);
                $salti = $saltrow['salt'];
                //echo $salti; //ktu e kem marr saltin e user-it prej databaze
                $inputsaltedhash = md5($passwordi, $salti); //ktu i kem bo saltedhash = inputpasshash+salt

                $row = mysqli_fetch_assoc($res);
                $dbhasedpwd = $row['hashedpwd'];
                $dbsalt = $row['salt'];
                $dbsaltedhash = md5($dbhasedpwd, $dbsalt);

                //qitu metum
                //echo $dbsaltedhash;

            if ($inputsaltedhash != $dbsaltedhash) {
                echo "Useri apo fjalekalimi eshte gabim";
            }
            else {
                $loguar = $res->num_rows > 0;
                $_SESSION['username'] = $row['username'];
            if ($loguar) {

                $sqlloggedquery = "SELECT logged from tbldoktoret where username='" . $_SESSION['username'] . "'";
                //echo $sqlloggedquery;
                $logged = mysqli_query($conn, $sqlloggedquery) or die("Error");
                $loggedrow = mysqli_fetch_assoc($logged);
                $loggedvalue = $loggedrow['logged'];

                $sqlupdatelogged = "UPDATE tbldoktoret SET logged = '1' WHERE tbldoktoret.username='" . $_SESSION['username'] . "'";

                $tabela = "tbldoktoret";
                $_SESSION['tabela'] = $tabela;

                //if($logged value == 1)

            if ($loggedvalue == 0)//amo kjo osht per lv==0
            {
                echo '<script language="javascript">';
                echo 'alert("Ju lutem, per shkaqe sigurie, ndryshoni fjalekalimin tuaj!")';
                echo '</script>';

                if (!mysqli_query($conn, $sqlupdatelogged)) {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                ?>
                <script type="text/javascript">
                    function load() {
                        window.location.href = "mdl-template-dashboard/changeusr.php";

                    }
                </script>
                <body onload="load()">
                </body>
            <?php
            }
            else {
                //echo "ktu logged osht 1";
                ?>
                <?php
                header('Location: mdl-template-dashboard/home.php');
            }

            } else {

                echo "<br>Gabim ne username ose password<br>";
            }
            }
            $conn->close();
            }
            else{
            $passwordi = md5($passwordi);
            $saltquery = "select salt from tblpacientatstaff where username='" . $name . "'";
            //echo $saltquery;
            $salt = mysqli_query($conn, $saltquery) or die("Error");
            $saltrow = mysqli_fetch_assoc($salt);
            $salti = $saltrow['salt'];
            //echo $salti; //ktu e kem marr saltin e user-it prej databaze
            $inputsaltedhash = md5($passwordi, $salti); //ktu i kem bo saltedhash = inputpasshash+salt


            $sql = "SELECT username,hashedpwd,salt FROM tbldoktoret Where username='$name'";
            $res = mysqli_query($conn, $sql) or die("Error");
            //echo $res->num_rows;
            //$result = $conn->query($name1);
            $sql = "SELECT username,hashedpwd,salt FROM tblpacientatstaff Where username='$name'";
            $res = mysqli_query($conn, $sql) or die("Error");
            $row = mysqli_fetch_assoc($res);
            $dbhasedpwd = $row['hashedpwd'];
            $dbsalt = $row['salt'];
            $dbsaltedhash = md5($dbhasedpwd, $dbsalt);


            if ($inputsaltedhash != $dbsaltedhash)
            {
                echo "Useri apo fjalekalimi eshte gabim";
            }
            else
            {
            $loguar = $res->num_rows > 0;
            $_SESSION['username'] = $row['username'];
            if ($loguar) {

            //echo $_SESSION['username'];
            $sqlloggedquery = "SELECT logged from tblpacientatstaff where username='" . $_SESSION['username'] . "'";
            //echo $sqlloggedquery;
            $logged = mysqli_query($conn, $sqlloggedquery) or die("Error");
            $loggedrow = mysqli_fetch_assoc($logged);
            $loggedvalue = $loggedrow['logged'];

            $tabela = "tblpacientatstaff";
            $_SESSION['tabela'] = $tabela;

            $sqlupdatelogged = "UPDATE tblpacientatstaff SET logged = '1' WHERE tblpacientatstaff.username='" . $_SESSION['username'] . "'";


            if ($loggedvalue == 0)//amo kjo osht per lv==0
            {
            echo '<script language="javascript">';
            echo 'alert("Ju lutem, per shkaqe sigurie, ndryshoni fjalekalimin tuaj!")';
            echo '</script>';

            if (!mysqli_query($conn, $sqlupdatelogged)) {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            ?>
                <script type="text/javascript">
                    function load() {
                        window.location.href = "mdl-template-dashboard/changeusrstaff.php";

                    }
                </script>
                <body onload="load()">
                </body>
                <?php
            }
            else {
                //echo "ktu logged osht 1";
                ?>
                <?php
                header('Location: mdl-template-dashboard/userhome.php');
            }

            } else {

                echo "<br>Gabim ne username ose password<br>";
            }
            }
                $conn->close();
            }

        }

        exit();
        ?>
    </form>
</div>
</body>
</html>
