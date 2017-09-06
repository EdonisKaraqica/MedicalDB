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
$username=$_SESSION['CurrentUser'];



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
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
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
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
          <div class="mdl-layout__header-row">
              <span class="mdl-layout-title" style="padding:45px">  Limak Kosovo International Airport J.S.C<br><span style="color:darkblue;font-size: 18px;">Shërbimi Mjekësor/Medical Service</span></span>

          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"></div>

      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/logouser.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
              <span style="color:white"><?php
            echo $username;
            ?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item">  <a href="../logout.php">Log Out</a></li>


            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" href="" onclick="showHideListaStaff('gridstaff'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Lista e Pacienteve(Staff)</a>
            <!--<a class="mdl-navigation__link" href="" onclick="showHideListaPax('gridpax'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Lista e Pacienteve(Pax)</a>
            --><a class="mdl-navigation__link" href="" onclick="showHideRegjistriStaff('gridstaffrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Regjistri(Staff)</a>
            <a class="mdl-navigation__link" href="" onclick="showHideRegjistriPax('gridpaxrekordet'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Regjistri(Pax)</a>
            <a class="mdl-navigation__link" href="" onclick="showHidePersoneli('gridpersonnel'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Personeli</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Regjistro Pacient</a>


        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100" id="listastaff">
        <div class="mdl-grid demo-content">
          <!-- gridi per listen e staffit-->
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaff" style="display:none;">
            <iframe src="http://localhost/MedicalDB-diana/phpgrid/demos/editing/db-table-grid.php?tables=tblpacientatstaff&fields%5B%5D=limakid&fields%5B%5D=username&fields%5B%5D=emri&fields%5B%5D=prindi&fields%5B%5D=mbiemri&fields%5B%5D=gjinia&fields%5B%5D=ditelindja&fields%5B%5D=vendlindja&fields%5B%5D=adresa&fields%5B%5D=email&fields%5B%5D=departamenti&fields%5B%5D=mbikqyresi&fields%5B%5D=nrtel" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
          </div>

          <!-- gridi per listen e regjistrit te staffit-->
          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridstaffrekordet" style="display:none;">
            <iframe src="http://localhost/MedicalDB-diana/phpgrid/demos/editing/db-table-grid-rekordetstaff.php?tables=tbldoktoret" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
          </div>

          <!-- gridi per listen e regjistrit te pax-it-->
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpaxrekordet" style="display:none;">
              <iframe src="http://localhost/MedicalDB-diana/phpgrid/demos/editing/db-table-grid.php?tables=tblrekordetpax&fields%5B%5D=rid&fields%5B%5D=did&fields%5B%5D=emri&fields%5B%5D=prindi&fields%5B%5D=mbiemri&fields%5B%5D=data_regjistrimit&fields%5B%5D=shifra_veprimtarise&fields%5B%5D=ankesa&fields%5B%5D=anamneza_konstatimi&fields%5B%5D=diagnoza&fields%5B%5D=terapia&fields%5B%5D=ku_udhezohet&fields%5B%5D=paraqitja_serishme&fields%5B%5D=cmimi" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
            </div>

            <!-- gridi per listen e personelit(doktoret)-->
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" id="gridpersonnel" style="display:none;">
              <iframe src="http://localhost/MedicalDB-diana/phpgrid/demos/editing/db-table-grid.php?tables=tbldoktoret&fields%5B%5D=limakid&fields%5B%5D=username&fields%5B%5D=emri&fields%5B%5D=prindi&fields%5B%5D=mbiemri&fields%5B%5D=gjinia&fields%5B%5D=ditelindja&fields%5B%5D=vendlindja&fields%5B%5D=adresa&fields%5B%5D=email&fields%5B%5D=departamenti&fields%5B%5D=mbikqyresi&fields%5B%5D=nrtel" frameborder="0" style="float:center; height: 500px; width: 1200px;"></iframe>
            </div>
        </div>
      </main>



    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
