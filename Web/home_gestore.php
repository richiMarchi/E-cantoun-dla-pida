<?php
include "php/dbconnection.php";
include "php/functions.php";
sec_session_start();
if(login_check($conn)) {
} /*else {
  header("Location: php/logout.php");
}*/
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>E cantoun dla pida</title>
    <style>
      .navbar{
        margin-bottom: 50px;
      }

      .btn{
        margin-bottom: 20px;
        padding-bottom: 50px;
        padding-top: 50px;
      }
      body{
        font-style: italic;
      }
    </style>

  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="home_gestore.html">E cantoun dla pida</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="prenotazioni.php">Prenotazioni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="modificaMenu.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="avvisiEconsigli.php">Avvisi/Consigli</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="php/logout.php">Logout</a>
        </li>
    </ul>

  </div>
</nav>


  <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="window.location='prenotazioni.php'">Visualizza Prenotazioni</button>
  <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="window.location='modificaMenu.php'">Gestisci Menù</button>
  <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="window.location='avvisiEconsigli.php'">Avvisi e Consigli del Giorno</button>



  </body>
</html>
