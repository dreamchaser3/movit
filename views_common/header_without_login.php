<?php
require_once("../config/session.php");
require_once("../db/maria_db.php");
require_once("../api/api_function.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
    <title>Movit</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/materialize.min.css" media="screen, projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>





  <nav class="white">
    <div class="nav-wrapper">
        <div class="input-field">
          <input name = "location" id="search" type="text" placeholder="Search another location" style = "color: black">
          <label class="label-icon" for="search"><i class="material-icons" style="color: black">search</i></label>
          <i class="material-icons">close</i>
        </div>
    </div>
  </nav>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>