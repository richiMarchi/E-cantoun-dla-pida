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
      #left, #right{
        margin-top: 50px;
        margin-left: 1%;
        margin-right: 1%;
      }
      body{
        font-style: italic;
      }

      h2{
        padding-bottom: 30px;
      }

      h3{
        padding-bottom: 10px;

        padding-top: 20px;
      }

      textarea{
        margin-top: -20px;
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
            <a class="nav-link" href="modificaMenu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="">Avvisi/Consigli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php/logout.php">Logout</a>
            </li>
        </ul>
      </div>
    </nav>

<div class="row ">
  <div class="col-sm-12">
    <h1 class="text-center mb-5">Gestisci Avvisi e Consigli:</h1>
  </div>
</div>
    <div class="row text-center">
      <div id="avvisi" class="col-md-6">

        <div class="col-sm-12">
          <div class="container">
            <div class="col-sm-12">
              <h3 class="text-center ">Avvisi presenti:</h3>
              <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "ecantoun";
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
                $sql = "SELECT codiceAvviso, dataInizio, dataFine, contenuto FROM avviso WHERE dataFine is NULL";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                    <table class="table table-light table-striped text-center">
                    <?php
                      while($row = $result->fetch_assoc()) {
                        ?>
                        <tr><form action="php/deleteAvviso.php" method="post"><?php
                        ?>
                          <td><?php echo $row["contenuto"] ?> <input type="hidden" name="id" value="<?php echo $row["contenuto"] ?> "></td><?php
                          ?>

                          <td><button class="btn btn-outline-dark text-muted" type="submit" name="addCart" >-</button>

                          </td>
                          </form>
                          </tr>
                          <?php
                  } ?>
                  <?php
                } else {
                  ?> <p>Nessun avviso in evidenza.</p> <?php
                }
               ?>
             </table>
            </div>
          </div>
        </div>
      </div>

      <div id="consligli" class="col-md-6">

        <div class="col-sm-12">
        <div class="container-fluid">
          <h3>Consigli presenti</h3>

            <table class="table table-light table-striped text-center">

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ecantoun";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
              $sql = "SELECT consiglio FROM consigliodelgiorno WHERE attivo='1'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                ?>

                <?php
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <tr><form action="php/deleteConsiglio.php" method="post"><?php
                    ?>
                      <td><?php echo $row["consiglio"] ?> <input type="hidden" name="id" value="<?php echo $row["consiglio"] ?> "></td><?php
                      ?>

                      <td><button class="btn btn-outline-dark text-muted" type="submit" name="addCart" >-</button>

                      </td>
                      </form>
                      </tr>
                      <?php
                    }
                      ?>

                <?php
            } else {
              ?> <p>Nessun consiglio in evidenza.</p> <?php
            }
           ?>
         </table>
          </div>
        </div>
      </div>
    </div>


    <div class="row text-center">
      <div id="avvisi" class="col-md-6">
    <form action="php/updateAvviso.php" method="post">
      <div class="form-group">
        <h3>Aggiungi avvisi</h3>
        <label for="avvisi"></label>
        <textarea class="form-control" rows="5" id="comment" name="id"></textarea>
        <button class="btn btn-primary float-left mt-1" type="submit" name="addCart" >Inserisci</button>
      </div>
    </form>
  </div>
  <div id="consigli" class="col-md-6">
<form action="php/updateConsiglio.php" method="post">
  <div class="form-group">
    <h3>Aggiungi consigli</h3>
    <label for="avvisi"></label>
    <textarea class="form-control" rows="5" id="comment" name="id"></textarea>
    <button class="btn btn-primary float-left mt-1" type="submit" name="addCart" >Inserisci</button>
  </div>
</form>
</div>
</div>

    <div class="row">
      <div class="col-sm-12 text-left">
        <button id="left" class="btn btn-outline-dark" type="button" name="buttonSx" onclick="window.location='home_gestore.php'">Torna alla Home</button>
      </div>
    </div>
<footer class="bg-dark text-dark mt-2 pt-2"> . </footer>
  </body>


  </div>
</html>
