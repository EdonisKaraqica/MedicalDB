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
$servername = "localhost";
$username = "root";
$password = "";
$dbname="sherbimimjeksor";
$conn = new mysqli($servername, $username, $password,$dbname);
session_start();
$username=$_SESSION['CurrentUser'];

$sql = "select count(*) as requestsnr from tblkerkesat where approved=0";
$execsql = mysqli_query($conn,$sql);
$notificationres = mysqli_fetch_array($execsql);
$nrkerkesave = $notificationres["requestsnr"];



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

    #centeredcnt {
    position: absolute;
    height: 200px;
    width: 400px;
    margin: -100px 0 0 -200px;
    top: 50%;
    left: 50%;
}


    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
          <div class="mdl-layout__header-row">
<!--              <span class="mdl-layout-title" style="padding:45px">  Limak Kosovo International Airport J.S.C<br><span style="color:darkblue;font-size: 18px;">Shërbimi Mjekësor/Medical Service</span></span>-->

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
                <li class="mdl-menu__item">  <a href="changeusr.php">Ndrysho Profilin</a></li>
                <li class="mdl-menu__item">  <a href="../logout.php">Log Out</a></li>


            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

            <!--<a class="mdl-navigation__link" href="" onclick="showHideListaPax('gridpax'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation">list</i>Lista e Pacienteve(Pax)</a>
            --><a class="mdl-navigation__link" style="color:white;" href="home.php#arstaff"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="list.png"/></i>Regjistri(Staff)</a>
            <a class="mdl-navigation__link" style="color:white;" href="home.php#arpax"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="list.png"/></i>Regjistri(Pax)</a>
            <a class="mdl-navigation__link" style="color:white;" href="home.php#agstaff"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="staff.png"/></i>Lista e Pacienteve(Staff)</a>
            <a class="mdl-navigation__link" style="color:white;" href="home.php#agdr"><i class="mdl-color-text--blue-grey-400 material-icons"  role="presentation"><img src="personel.png"/></i>Personeli</a>
          <a class="mdl-navigation__link" style="color:white;" href="home.php#ashtok"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="register.png"/></i>Regjistro kontrolle</a>
            <a class="mdl-navigation__link" style="color:white;" href="home.php#askerk" onclick="showHideKerkesat('viewkontrollat'); return false;"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="register.png"/></i>Kerkesat<?php if($nrkerkesave > 0){
                    echo "(" . $nrkerkesave . ")<img src=\"220px-Achtung.png\" height=\"24px\" width=\"24px\"></img>";
                } ?>
            </a>
          <a class="mdl-navigation__link" style="color:white;" href="home.php#aexp"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation"><img src="download.png"/></i>Export</a>


        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100" id="listastaff">
        <div class="mdl-grid demo-content">
          <div id="centeredcnt">
        		<form method="post" action="../phpgrid/changepassword.php">
        		<fieldset>
        		<legend>Ndryshimi i parulles</legend>
                <table><tr><td>Fjalekalimi aktual:</td><td><input type="password" name="oldpwd" placeholder="Shkruaj fjalekalimin e tanishem"></td></tr>
                <tr><td>Fjalekalimi i ri:</td><td> <input type="password" name="newpwd" placeholder="Shkruaj fjalekalimin e ri"></td></tr>
                <tr><td>Konfirmo fjalekalimin e ri:</td><td><input type="password" name="newpwd2" placeholder="Konfirmo fjalekalimin e ri"></td></tr>
                <tr><td span="2"><button type="submit">Ndrysho fjalekalimin</button></td></tr>
                </table>
        		</fieldset>
        		</form>
        	<?php

        	?>
        	</div>
        </div>
      </main>



    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>`
