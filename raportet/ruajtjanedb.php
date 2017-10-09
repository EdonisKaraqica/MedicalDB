
<?php
    // session_start();
    // $_SESSION['CurrentUser']=$name;
   require("databaze.php");
   $name1=$_SESSION['CurrentUser'];
    $rmid=$rnppid=$rupid=$lpid=$rid=$uelid=$uerid=$ukid=$uplid='NULL';
   // if(isset($_SESSION['CurrentUser']))
   // {
    
   //  $sql8="SELECT did from tbldoktoret WHERE username='".$name."'";
   //  $res1=mysqli_query($conn,$sql8) or die( "Error"); 
   //  while ($row=mysqli_fetch_assoc($res1)) 
   //  { 
   //    $did=$row['did'];
   //    echo $did;
   //    }}
    $currentDate=date('Y-m-d H:i:s');

   if ($_SERVER["REQUEST_METHOD"] == "POST")
   {   

        
       $emri = $_POST['emri'];
        
       $telefoni = $_POST['telefoni'];
       $numriID = $_POST['numriID'];
       $adresa = $_POST['adresa'];
       $ditelindja = $_POST['ditelindja'];
       $email = $_POST['email'];
       $vendlindja = $_POST['vendlindja'];
       $nrDosjes = $_POST['nrDosjes'];
       $gjinia = $_POST['gjinia'];
       $njesia=$_POST['njesia'];
       $ankesa=$_POST['ankesa'];
       $anamneza=$_POST['anamneza'];
       $anFamiljes=$_POST['anFamiljes'];
       $ta=$_POST['ta'];
       $pulsi=$_POST['pulsi'];
       $spo2=$_POST['spo2'];
       $koment=$_POST['koment'];
       $laboratori=$_POST['laboratori'];
       $diagnoza=$_POST['diagnoza'];
       $trajtimi=$_POST['trajtimi'];
       $perfundimi=$_POST['perfundimi'];
       $raporti=$_POST['rap'];
       $rp=$_POST['rp'];
       $udhPer=$_POST['udhPer'];
       $gjPrez=$_POST['gjPrez'];
       $terapiaAp=$_POST['terapiaAp'];
       $udhPerLab=$_POST['udhPerLab'];
       //$diagnozaLab=$_POST['diagnozaLab'];
       $gjPrezLab=$_POST['gjPrezLab'];
       $terLab=$_POST['terLab'];
       $udhezohetPerRent=$_POST['udhezohetPerRent'];
       $gjPrezenteRent=$_POST['gjPrezenteRent'];
       $terapiaApRent=$_POST['terapiaApRent'];
       $origjina=$_POST['origjina'];
       $destinacioni=$_POST['destinacioni'];
       $shenime=$_POST['shenime'];
       $qellimiLar=$_POST['qellimiLar'];
       $prej=$_POST['prej'];
       $deri=$_POST['deri'];
       $enti=$_POST['enti'];
       $fillimi=$_POST['fillimi'];
       $fundi=$_POST['fundi'];
       $numri=$_POST['numri'];
       $komentRaport=$_POST['komentRaport'];
   

       $sql="SELECT pid,limakid from tblpacientatstaff WHERE limakid=". $numriID;
       $res=mysqli_query($conn,$sql) or die( "Error"); 
    while ($row=mysqli_fetch_assoc($res)) 
    { 
      $pid=$row['limakid'];
      
      }


    if (!empty($_POST["rap"])) 
     {
      
       $sql1="INSERT INTO raportimjeksor(raporti) VALUES('".$raporti. "')";
       if ($conn->query($sql1) === TRUE) {
       // echo "Sql record created successfully <br>";
       } else {
           echo "Error: " . $sql1 . "<br>" . $conn->error;
       }
        $mysql1="SELECT id FROM raportimjeksor ORDER BY id DESC LIMIT 1";
      $result = $conn->query($mysql1);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $rmid=$row['id'];
            }
        } else {
            echo "0 results";
        }

   }

   if (!empty($_POST["udhPer"])||!empty($_POST["gjPrez"])||!empty($_POST["terapiaAp"])) 
           {
            $sql8="INSERT INTO udhezimperkonsultime(Udhezohetper,Gjendjaprezente,Terapiaeaplikuar) VALUES ('".$udhPer."','".$gjPrez."','".$terapiaAp."')";
        if ($conn->query($sql8) === TRUE) {
       // echo "Sql8 record created successfully <br>";
       } else {
           echo "Error: " . $sql8 . "<br>" . $conn->error;
       }
       $mysql8="SELECT id FROM udhezimperkonsultime ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql8);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $ukid=$row['id'];
    }
} else {
    echo "0 results";
}
       }
       if (!empty($_POST["qellimiLar"])||!empty($_POST["prej"])||!empty($_POST["deri"])) 
           {
       $sql2="INSERT INTO largimngapuna(qellimiilargimit,prej,deri) VALUES ('".$qellimiLar."','".$prej."','".$deri."')";
        if ($conn->query($sql2) === TRUE) {
       // echo "Sql2 record created successfully <br>";
       } else {
           echo "Error: " . $sql2 . "<br>" . $conn->error;
       }
       $mysql2="SELECT id FROM largimngapuna ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql2);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $lpid=$row['id'];
    }
} else {
    echo "0 results";
}
   }

   if (!empty($_POST["enti"])||!empty($_POST["fillimi"])||!empty($_POST["fundi"]) || !empty($_POST['numri'])) 
           {
       $sql3="INSERT INTO raportinderprerjesseperkohshmeperpune(Entishendetesor,Ditaepare,Ditaefundit,Numriiditevepushim,komenti) VALUES ('".$enti."','".$fillimi."','".$fundi."','".$numri."','".$komentRaport."')";
        if ($conn->query($sql3) === TRUE) {
       // echo "Sql3 record created successfully <br>";
       } else {
           echo "Error: " . $sql3 . "<br>" . $conn->error;
       }
        $mysql3="SELECT id FROM raportinderprerjesseperkohshmeperpune ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql3);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $rnppid=$row['id'];
    }
} else {
    echo "0 results";
}
   }
//        if (!empty($_POST["origjina"])||!empty($_POST["destinacioni"])||!empty($_POST["shenime"])) 
//            {
//         $sql4="INSERT INTO raportudhetimiperpasagjer(Origjina,Destinimi,Shenime,FileID) VALUES ('".$origjina."','".$destinacioni."','".$shenime."','0')";
//         if ($conn->query($sql4) === TRUE) {
//        // echo "Sql4 record created successfully <br>";
//        } else {
//            echo "Error: " . $sql4 . "<br>" . $conn->error;
//        }
//         $mysql4="SELECT id FROM raportudhetimiperpasagjer ORDER BY id DESC LIMIT 1";
//         $result = $conn->query($mysql4);

//         if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//        $rupid=$row['id'];
//     }
// } else {
//     echo "0 results";
// }
//    }
 if (!empty($_POST["origjina"])||!empty($_POST["destinacioni"])||!empty($_POST["shenime"])) 
           {
        $sql4="INSERT INTO raportudhetimiperpasagjer(Origjina,Destinimi,Shenime,FileID) VALUES ('".$origjina."','".$destinacioni."','".$shenime."','1')";
        if ($conn->query($sql4) === TRUE) {
       // echo "Sql4 record created successfully <br>";
       } else {
           echo "Error: " . $sql4 . "<br>" . $conn->error;
       }
        $mysql4="SELECT id FROM raportudhetimiperpasagjer ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql4);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $rupid=$row['id'];
    }
    // echo $rupid;
} else {
    echo "0 results";
}
   }



       if (!empty($_POST["rp"])) 
        {
        $sql5="INSERT INTO recete(Rp) VALUES ('".$rp."')";
        if ($conn->query($sql5) === TRUE) {
       // echo "Sql5 record created successfully <br>";
       } else {
           echo "Error: " . $sql5 . "<br>" . $conn->error;
       }
        $mysql5="SELECT id FROM recete ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql5);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $rid=$row['id'];
    }
} else {
    echo "0 results";
}
   }
   if (!empty($_POST["udhPerLab"])||!empty($_POST["gjPrezLab"])||!empty($_POST["terLab"])) 
           {
            $udhezimperLabID='NULL';
            if(($_FILES['userfile']['size'] > 0)){
    $udhezimperLabID=$_SESSION['udhezimperLabID'];}
        $sql6="INSERT INTO udhezimperekzaminimelaboratorike(Udhezohetper,Gjendjaprezente,Terapiaeaplikuar,FileID) VALUES ('".$udhPerLab."','".$gjPrezLab."','".$terLab."','".$udhezimperLabID."')";
        if ($conn->query($sql6) === TRUE) {
       // echo "Sql6 record created successfully <br>";
       } else {
           echo "Error: " . $sql6 . "<br>" . $conn->error;
       }
       $mysql6="SELECT id FROM udhezimperekzaminimelaboratorike ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql6);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $uelid=$row['id'];
    }
} else {
    echo "0 results";
}
   }
   
   if (!empty($_POST["udhezohetPerRent"])||!empty($_POST["gjPrezenteRent"])||!empty($_POST["terapiaApRent"])) 
           {
           $sql7="INSERT INTO udhezimperekzaminimerentgenologjike(Udhezohetper,Gjendjaprezente,Terapiaeaplikuar) VALUES ('".$udhezohetPerRent."','".$gjPrezenteRent."','".$terapiaApRent."')";
        if ($conn->query($sql7) === TRUE) {
       // echo "Sql7 record created successfully <br>";
       } else {
           echo "Error: " . $sql7 . "<br>" . $conn->error;
       }
       $mysql7="SELECT id FROM udhezimperekzaminimerentgenologjike ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql7);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $uerid=$row['id'];
    }
} else {
    echo "0 results";
}
   }
       if (!empty($_POST["udhPer"])||!empty($_POST["gjPrez"])||!empty($_POST["terapiaAp"])) 
           {
            $sql8="INSERT INTO udhezimperkonsultime(Udhezohetper,Gjendjaprezente,Terapiaeaplikuar) VALUES ('".$udhPer."','".$gjPrez."','".$terapiaAp."')";
        if ($conn->query($sql8) === TRUE) {
       // echo "Sql8 record created successfully <br>";
       } else {
           echo "Error: " . $sql8 . "<br>" . $conn->error;
       }
       $mysql8="SELECT id FROM udhezimperkonsultime ORDER BY id DESC LIMIT 1";
        $result = $conn->query($mysql8);

        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $ukid=$row['id'];
    }
} else {
    echo "0 results";
}
       }

       $sql150="select did from tbldoktoret where username='".$name1."'";
    $result1 = $conn->query($sql150);

        if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
       $did=$row['did'];
    }
} else {
    echo "0 results";}
    if(isset($_SESSION['uploadid'])){
    $uplid=$_SESSION['uploadid'];
  }
    // echo $_SESSION['uploadid'];

       $sql9="INSERT INTO `tblrekordetstaff`( `pid`, `did`, `data_regjistrimit`, `shifra_veprimtarise`, `diagnoza`, `ankesa`, `anamnezaesemundjes`, `anamnezaefamiljes`, `laboratori`, `trajtimi`, `perfundimi`, `raportimjeksorid`, `raportinderprerjesseperkohshmeperpuneID`, `raportudhetimiperpasagjerid`, `largimngapunaid`, `receteid`, `udhezimperekzaminimelaboratorikeid`, `udhezimperekzaminimerentgenologjikeid`, `udhezimperkonsultimeid`, `ta`, `pulsi`, `komenti`, `spo2`, `uploadID`) VALUES($pid,$did,'$currentDate',4,NULL,'$ankesa','$anamneza','$anFamiljes',NULL,NULL,NULL,$rmid,$rnppid,$rupid,$lpid,$rid,$uelid,$uerid,$ukid,$ta,$pulsi,'$koment',$spo2,$uplid)";
        if ($conn->query($sql9) === TRUE) {
         //echo $sql9;
       // echo "Sql9 record created successfully <br>";
       } else {
           echo "Error: " . $sql9 . "<br>" . $conn->error;
       }
   
          // $conn->close();
   }
   
   ?>