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
      <form>
        <div class="input-field">
          <input id="search" type="search" placeholder="Search another location">
          <label class="label-icon" for="search"><i class="material-icons" style="color: black">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>