<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
      https://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<?php
include('../databaze.php');
session_start();
$conn = new mysqli($servername, $username, $password,$dbname);
$username1=$_SESSION['CurrentUser'];
$query = "select * from tbldoktoret where username='$username1'";
$res = mysqli_query($conn, $query) or die("Error");

while ($row = mysqli_fetch_assoc($res)) {
    $emri = $row['username'];

}
if(!isset($_SESSION['CurrentUser'])) {
    header("Location: ../login.php");
}
elseif( isset($_SESSION['CurrentUser'])&& $emri!=$username1){
header("Location: userhome.php");
}
else{
    $username1=$_SESSION['CurrentUser'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "select count(*) as requestsnr from tblkerkesat where shqyrtuar=0";
$execsql = mysqli_query($conn,$sql);
$notificationres = mysqli_fetch_array($execsql);
$nrkerkesave = $notificationres["requestsnr"];
$perdoruesihome=$_SESSION['CurrentUser'];
$perdoruesisql = "select did,emri,mbiemri from tbldoktoret where username='" . $perdoruesihome ."'";
$result = mysqli_query($conn, $perdoruesisql);
$pidplotesuesi = mysqli_fetch_array($result);
$_SESSION["emri"] = $pidplotesuesi["emri"];
$_SESSION["mbiemri"] = $pidplotesuesi["mbiemri"];
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>MedicalDB</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>

    <script type="text/javascript">
        function showHideListaStaff(obj)
        {
            var div = document.getElementById(obj);
            var divx = document.getElementById('gridpaxrekordet');
            var divy = document.getElementById('gridstaffrekordet');
            var divz = document.getElementById('gridpersonnel');
            var divv = document.getElementById('shtokontroll');
            var divu = document.getElementById('exportxls');
            var divt = document.getElementById('viewkontrollat');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divv.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="none";
            div.style.height="100%";
        }
        function showHideRegjistriStaff(obj)
        {
            var div = document.getElementById(obj);
            var divx = document.getElementById('gridpaxrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpersonnel');
            var divv = document.getElementById('shtokontroll');
            var divu = document.getElementById('exportxls');
            var divt = document.getElementById('viewkontrollat');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divv.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="none";
            div.style.height="100%";
        }
        function showHideRegjistriPax(obj)
        {
            var div = document.getElementById(obj);
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpersonnel');
            var divv = document.getElementById('shtokontroll');
            var divu = document.getElementById('exportxls');
            var divt = document.getElementById('viewkontrollat');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divv.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="none";
            div.style.height="100%";
        }
        function showHidePersoneli(obj)
        {
            var div = document.getElementById(obj);
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpaxrekordet');
            var divv = document.getElementById('shtokontroll');
            var divu = document.getElementById('exportxls');
            var divt = document.getElementById('viewkontrollat');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divv.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="none";
            div.style.height="100%";
        }
        function showHideKontrolla(obj)
        {
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var div = document.getElementById(obj);
            var divv = document.getElementById('gridpersonnel');
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpaxrekordet');
            var divu = document.getElementById('exportxls');
            var divt = document.getElementById('viewkontrollat');
            divt.style.display = "none";
            divu.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            divv.style.display = "none";
            div.style.display="";
            regktr.style.display="";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="none";
            div.style.height="100%";
        }
        function showHideExportxls(obj)
        {
            var div = document.getElementById(obj);
            var divv = document.getElementById('gridpersonnel');
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpaxrekordet');
            var divu = document.getElementById('shtokontroll');
            var divt = document.getElementById('viewkontrollat');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            divv.style.display = "none";
            div.style.display="";
            div.style.height="100%";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "";
            hdhome.style.display = "none";
            krk.style.display="none";
        }
        function showHideKerkesat(obj)
        {
            var div = document.getElementById(obj);
            var divv = document.getElementById('gridpersonnel');
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpaxrekordet');
            var divu = document.getElementById('shtokontroll');
            var divt = document.getElementById('exportxls');
            var hdstok = document.getElementById('HeaderViewStock');
            var divs = document.getElementById('viewstock');
            hdstok.style.display = "none";
            divs.style.display="none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            divv.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display="";
            div.style.height="100%";
        }
        function showHideListaPax(obj)
        {
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            var div = document.getElementById(obj);
            var divx = document.getElementById('gridstaff');
            divx.style.display = "none";
            div.style.display="";
            div.style.height="100%";
        }
        function showHideStockView(obj){
            var div = document.getElementById(obj);
            div.style.display="";
            div.style.height="100%";
            var hdstk = document.getElementById('HeaderViewStock');
            var divv = document.getElementById('gridpersonnel');
            var divx = document.getElementById('gridstaffrekordet');
            var divy = document.getElementById('gridstaff');
            var divz = document.getElementById('gridpaxrekordet');
            var divu = document.getElementById('shtokontroll');
            var divt = document.getElementById('exportxls');
            var divs = document.getElementById('viewkontrollat');
            divs.style.display = "none";
            var regktr = document.getElementById('HeaderRegjistroKontrolle');
            var hdhome = document.getElementById('HeaderHome');
            var krk = document.getElementById('HeaderKerkesat');
            var regstf = document.getElementById('HeaderRegjistriStaff');
            var regpax = document.getElementById('HeaderRegjistriPax');
            var lststf = document.getElementById('HeaderStaff');
            var lstprs = document.getElementById('HeaderPersonnel');
            var hexprt = document.getElementById('HeaderExport');
            divt.style.display = "none";
            divu.style.display = "none";
            divx.style.display = "none";
            divy.style.display = "none";
            divz.style.display = "none";
            divv.style.display = "none";
            div.style.display="";
            regktr.style.display="none";
            regstf.style.display = "none";
            regpax.style.display = "none";
            lststf.style.display = "none";
            lstprs.style.display = "none";
            hexprt.style.display = "none";
            hdhome.style.display = "none";
            krk.style.display = "none";
            hdstk.style.display = "";
        }
        function showHide2(obj)
        {
            var div = document.getElementById(obj);
            if (div.style.display != 'none')
            {
                div.style.display='none';
            }
        }
    </script>


</head>
<body>
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){
            $('#diviKryesor').show();
        }, 2000);
    });</script>
<script type="text/javascript">
$(".mdl-color-text--blue-grey-400 material-icons").on("click", function() {
    $(this).css("background", "red");
})
</script>

<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" id="diviKryesor" style="display:none">
    <!-- headeri fillestar-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none" id="HeaderHome">
        <div class="mdl-layout__header-row">
            <!--              <span class="mdl-layout-title" style="padding:45px">  Limak Kosovo International Airport J.S.C<br><span style="color:darkblue;font-size: 18px;">Shërbimi Mjekësor/Medical Service</span></span>-->

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per regjistrin e kontrolles-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="" id="HeaderRegjistroKontrolle">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Regjistro Kontrolle Te Re</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per shqyrtimin e kerkesave-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderKerkesat">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Kerkesat</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per regjistrin e stafit-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderRegjistriStaff">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Regjistri (Staff)</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per regjistrin e pax-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderRegjistriPax">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Regjistri i Udhetareve</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per listen e stafit-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderStaff">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Lista e Pacienteve (Staff)</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per personelin mjeksor-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderPersonnel">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Personeli Mjekesor</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>
    <!-- headeri per export-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderExport">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Export</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>

    <!-- headeri per stok-->
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderViewStock">
        <div class="mdl-layout__header-row">
            <span style="color:darkblue;font-size: 18px;">Stoku</span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

    </header>

    <!-- fund i headerit-->

    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <span class="mdl-layout-title" style="padding:10px;font-size: 13px;">  LKIA J.S.C<br><span style="color:blue;font-size: 11px;">Shërbimi Mjekësor/Medical Service</span></span>
            <img src="images/logouser.png" class="demo-avatar">
            <div class="demo-avatar-dropdown">
              <span style="color:white"><?php
                  echo $username1;
                  ?></span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item">  <a style="color:darkblue;" href="changeusr.php">Ndrysho Profilin</a></li>
                    <li class="mdl-menu__item">  <a style="color:darkblue;" href="../logout.php">Log Out</a></li>


                </ul>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

            <!--<a class="mdl-navigation__link" href="" onclick="showHideListaPax('gridpax'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Lista e Pacienteve(Pax)</a>
            -->
            <a id="ashtok" class="mdl-navigation__link" style="color:white;" href="" onclick="showHideKontrolla('shtokontroll'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="images/register==.png"/></i>Regjistro kontrolle</a>

            <a id="ashtok" class="mdl-navigation__link" style="color:white;" href="" onclick="showHideKerkesat('viewkontrollat'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="images/icons/kerkesat.png"/></i>Kerkesat&nbsp;<?php if($nrkerkesave > 0){
                    echo "(" . $nrkerkesave . ")";
                } ?>
            </a>
            <a id="arstaff" class="mdl-navigation__link" style="color:white;"  href="" onclick="showHideRegjistriStaff('gridstaffrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="images/icons/staf.png"/></i>Staf</a>
            <a id="arpax" class="mdl-navigation__link" style="color:white;" href="" onclick="showHideRegjistriPax('gridpaxrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="images/icons/pax.png"/></i>Pax</a>

            <a id="aexp" class="mdl-navigation__link" style="color:white;" href="" onclick="showHideExportxls('exportxls'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="images/icons/export.png"/></i>Export</a>
            <a id="aexp" class="mdl-navigation__link" style="color:white;" href="" onclick="showHideStockView('viewstock'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="images/icons/drugs.png"/></i>Stoku</a>
            <div class="dropdown">

                <i class="mdl-color-text--blue-grey-400 material-icons"  style="margin-left: 40px" role="presentation"><img src="images/icons/avatar.png"/></i><a class="dropbtn">Perdoruesit</a>
                <div class="dropdown-content">
                    <a id="agdr" class="mdl-navigation__link" style="color:white;font-size:14px" href="" onclick="showHidePersoneli('gridpersonnel'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="images/doctor.png"/></i>&nbsp;&nbsp;&nbsp;Personeli</a>
                    <a id="agstaff" class="mdl-navigation__link" style="color:white;font-size:14px" href="" onclick="showHideListaStaff('gridstaff'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="images/icons/team.png"/></i>&nbsp;&nbsp;&nbsp;Stafi</a>


                </div>
            </div>







        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100" id="listastaff" style="height:100%;">

        <!-- gridi per listen e staffit-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaff" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/gridpacientetstaff.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per listen e regjistrit te staffit-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaffrekordet" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/gridrekordetstaff.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per listen e regjistrit te pax-it-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpaxrekordet" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/gridrekordetpax.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per listen e personelit(doktoret)-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpersonnel" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/gridpersoneli.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per regjistrimin e kontrolles se re-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="shtokontroll" style="height:100%;width:100%;">
            <iframe src="../pacienti.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per shqyrtimin e kerkesave per pushim-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="viewkontrollat" style="height:100%;width:100%;display:none;">
            <iframe src="../1.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per exportimin e te dhenave/xls-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="exportxls" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/statistikat.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

        <!-- gridi per stokun-->
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="viewstock" style="height:100%;width:100%;display:none;">
            <iframe src="../phpgrid/gridstoqet.php" frameborder="0" style="height: 100%; width: 100%;"></iframe>
        </div>

    </main>



    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
