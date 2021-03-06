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
$query = "select * from tblpacientatstaff where username='$username1'";
$res = mysqli_query($conn, $query) or die("Error");

while ($row = mysqli_fetch_assoc($res)) {
    $emri = $row['username'];
    $empriperststk = $row["emri"];
    $mbiemriperstk = $row["mbiemri"];

    $_SESSION["emri"] = $empriperststk;
    $_SESSION["mbiemri"] = $mbiemriperstk;

}
if(!isset($_SESSION['CurrentUser'])) {
    header("Location: ../login.php");
}
elseif( isset($_SESSION['CurrentUser'])&& $emri!=$username1){
    header("Location: home.php");
}
else{
    $username1=$_SESSION['CurrentUser'];
}




?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>

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
        divx.style.display = "none";
        divy.style.display = "none";
        divz.style.display = "none";
        div.style.display="";
    }
    function showHideRegjistriStaff(obj)
    {
        var div = document.getElementById(obj);
        var divx = document.getElementById('gridpaxrekordet');
        var divy = document.getElementById('gridstaff');
        var divz = document.getElementById('gridpersonnel');
        var divt = document.getElementById('HeaderRegjistri');
        var divu = document.getElementById('HeaderKerkesat');
        divt.style.display = "";
        divu.style.display = "none";
        divx.style.display = "none";
        divy.style.display = "none";
        divz.style.display = "none";
        div.style.display="";
    }
    function showHideRegjistriPax(obj)
    {
        var div = document.getElementById(obj);
        var divx = document.getElementById('gridstaffrekordet');
        var divy = document.getElementById('gridstaff');
        var divz = document.getElementById('gridpersonnel');
        var divt = document.getElementById('HeaderRegjistri');
        var divu = document.getElementById('HeaderKerkesat');
        divt.style.display = "none";
        divu.style.display = "";
        divx.style.display = "none";
        divy.style.display = "none";
        divz.style.display = "none";
        div.style.display="";
    }
    function showHidePersoneli(obj)
    {
        var div = document.getElementById(obj);
        var divx = document.getElementById('gridstaffrekordet');
        var divy = document.getElementById('gridstaff');
        var divz = document.getElementById('gridpaxrekordet');
        divx.style.display = "none";
        divy.style.display = "none";
        divz.style.display = "none";
        div.style.display="";
    }
      function showHideListaPax(obj)
      {
          var div = document.getElementById(obj);
          var divx = document.getElementById('gridstaff');
          divx.style.display = "none";
          div.style.display="";


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
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="" id="HeaderRegjistri">
          <div class="mdl-layout__header-row">
<!--              <span class="mdl-layout-title" style="padding:45px">  Limak Kosovo International Airport J.S.C<br><span style="color:darkblue;font-size: 18px;">Shërbimi Mjekësor/Medical Service</span></span>-->
              <span style="color:darkblue;font-size: 18px;">Regjistri&nbsp;<small>(Records)</small></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

      </header>
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600" style="display:none;" id="HeaderKerkesat">
          <div class="mdl-layout__header-row">
<!--              <span class="mdl-layout-title" style="padding:45px">  Limak Kosovo International Airport J.S.C<br><span style="color:darkblue;font-size: 18px;">Shërbimi Mjekësor/Medical Service</span></span>-->
              <span style="color:darkblue;font-size: 18px;">Krijo një kërkesë të re për pushim<small>(Open a new request of leave)</small></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <span class="mdl-layout-title" style="padding:10px;font-size: 13px;">  LKIA J.S.C<br><span style="color:white;font-size: 11px;">Shërbimi Mjekësor/Medical Service</span></span>
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
              <li class="mdl-menu__item">  <a style="color:darkblue;" href="changeusrstaff.php">Profili<small>(Profile)</small></a></li>
              <li class="mdl-menu__item">  <a style="color:darkblue;" href="../logout.php">Shkyqu <small>(Log Out)</small></a></li>


            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" id="lista" style="color:white;" href="" onclick="showHideRegjistriStaff('gridstaffrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Regjistri&nbsp; <small>(Records)</small></a>
          <!--  <a class="mdl-navigation__link" style="color:white;" href="" onclick="showHideListaStaff('gridstaff'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">edit</i>Ndryshimi profilit</a>
    -->        <!--<a class="mdl-navigation__link" href="" onclick="showHideListaPax('gridpax'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Lista e Pacienteve(Pax)</a>-->
            <a class="mdl-navigation__link" id="kerkesa" style="color:white;" href="" onclick="showHideRegjistriPax('gridpaxrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">edit</i>Kërkesë&nbsp;<small>(Request)</small></a>
            <!--<a class="mdl-navigation__link" href="" onclick="showHidePersoneli('gridpersonnel'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Personeli</a>-->
          <!--<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Regjistro Pacient</a>-->


        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100" id="listastaff">

          <!-- faqja per ndryshimin e profilit -->
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaff" style="display:none;">
            <iframe src="../phpgrid/griduseredit.php" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
          </div>

          <!-- gridi per listen e regjistrit te userit-->
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaffrekordet" style="">
            <iframe src="../phpgrid/griduserrekordet.php" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
          </div>

          <!-- faqja per kerkesen per pushim-->
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpaxrekordet" style="display:none;">
              <iframe src="../phpgrid/kerkesaperpushim/newkrk.php" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
            </div>

            <!-- gridi per listen e personelit(doktoret)-->
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpersonnel" style="display:none;">
              <iframe src="" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
            </div>

      </main>



    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
