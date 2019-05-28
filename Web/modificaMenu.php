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
    <script>
    function showMenu(str){
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabella").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "php/modifyForm.php?q="+str, true);
        xhttp.send();
      }
    </script>
    <style>
      .navbar{
        margin-bottom: 50px;
      }
      #left, #right{
        margin-top: 50px;
        margin-right: 1%;
        margin-left: 1%;
      }
      body{
        font-style: italic;
      }
      fieldset{
          border-radius: 30px;
          box-shadow: 5px 5px 2px #888888;
          padding-bottom: 2.5%;

      }

      legend{
        margin-bottom: 2%;
        margin-left: 2%;
      }

      label,input[name="veg"]{
        margin-left: 2%;
        margin-right: 2%;
      }
      form{
        margin-right: 1%;
      }
      select,input{
        border-radius: 7px;
      }

      input[name=Prezzo]{
        width: 20%
      }
    </style>
  </head>
<div class="container-fluid">
  <body class="bg-light">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="home_gestore.php">E cantoun dla pida</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="prenotazioni.php">Prenotazioni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" >Menu</a>
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

    <div class="row ">
      <div class="col-sm-12">
        <h1 class="text-center mb-5">Modifica il Menù:</h1>
      </div>
    </div>

    <section id="tabella">
  <?php showPiada(); ?>
    </section>
    <div class="row">
      <div class="col-sm-12 text-left">
        <button id="left" class="btn btn-outline-dark" type="button" name="buttonSx" onclick="window.location='home_gestore.php'">Torna alla Home</button>
      </div>
    </div>
    <footer class="bg-dark text-dark mt-2 pt-2"> . </footer>
  </body>
</html>

</div>


<?php function showPiada(){?>
<form id="modifica" action="php/insertPiada.php" method="post">
    <fieldset> <legend>Inserisci una nuova piadina:</legend>
  <label>Piada:
     <select name="cars" onchange="showMenu(value)">
      <option value="piadina">Piadina</option>
      <option value="rotolo">Rotolo</option>
      <option value="cassone">Cassone</option>
      <option value="bibita">Bibita</option>
    </select>
  </label></br></br>
  <label>Nome:
    <input type="text" name="nome" required>
  </label></br></br>
  <label>Ingredienti:
    <input type="text" name="descrizione" required>
  </label></br></br>
  <label>Calorie:
    <input type="text" name="calorie" required>
  </label></br></br>
  <label>Prezzo:
    <input type="text" name="prezzo" required>€
  </label></br></br>
  <input type="checkbox" name="veg" > Vegetariano</br>
  <button class="btn btn-primary float-left mt-4 ml-3" type="submit" name="addCart" >Inserisci</button>
</form>
<?php
}
?>
