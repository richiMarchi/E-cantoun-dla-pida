<?php require("php/secStart.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E cantoun dla pida</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="notification.js">

  </script>
  <link rel="stylesheet" href="css/alto.css">
  <script>
  $(window).bind("resize", function () {
    console.log($(this).width())
    if ($(this).width() < 576) {
        $('#bottoni').removeClass('btn-group btn-group-lg').addClass('btn-group btn-group')
    } else {
        $('#bottoni').removeClass('btn-group btn-group').addClass('btn-group btn-group-lg')
    }
}).trigger('resize');</script>

</head>

<body class="bg-light">
  <div class="container-fluid">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="text-center ">E Cantoun Dla Pida</h1>
      <p class="text-center font-italic">La pida se parsot la pis un po ma tot</p>
      <h2 class="text-center">Carrello</h2>
    </div>
  </div>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">
    <i class="far fa-user"></i></a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['nome'] . " " . $_SESSION['cognome'];?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" data-toggle="modal" data-target="#myModal" href="#" >Modifica dati personali</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#modMail" href="#" >Modifica mail</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#modPass" href="#" >Modifica password</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#modIndirizzo" href="#">Modifica indirizzi di consegna</a>
        <a class="dropdown-item" data-toggle="modal" data-target="#modCarta" href="#">Aggiungi modilità di pagamento</a>
        <a class="dropdown-item" href="imieiordini.php">I miei ordini</i></a>
        <a class="dropdown-item" href="php/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarnot" data-toggle="dropdown">Notifiche <span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
    <div class="dropdown-menu" id="dropnot">
      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#myModal" href="#" ></a>
      <ul class="dropdown-menu"></ul>
    </div>
    </li>
  </ul>
  <ul class="navbar-nav ">
    <div class="row">
      <div class="col-xs-6">
        <li class="nav-item">
          <a class="navbar-brand" href="carrello.php">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </div>
      <div class="col-xs-6">
        <li class="nav-item">
          <a class="nav-link" href="carrello.php">Cashout ></a>
        </li>
      </div>
    </div>
  </ul>
</nav>


  <div class="row">
    <div class="col-sm-12 text-center">
      <div id="bottoni" class="btn-group btn-group-lg">
        <button type="button" class="btn btn-outline-dark" onclick="window.location='home.php'">Home</button>
        <button type="button" class="btn btn-outline-dark" onclick="window.location='menu.php'" data-toggle="tooltip" data-placement="bottom" title="Scopri il nostro Menù!">Menù</button>
        <button type="button" class="btn btn-outline-dark" onclick="window.location='contatti.php'">Contatti</button>
        <button type="button" class="btn btn-outline-dark" onclick="window.location='guida.php'">Guida</button>
      </div>
    </div>
  </div>
  <div id="tabella" class="row">
    <div class="col-sm-12">
      <div class="container">

          <?php if (isset($_SESSION['carrello']) && $_SESSION['carrello']) {
            $carrello=$_SESSION['carrello'];
            ?>
            <div class="table-responsive">
            <table class="table table-dark table-striped text-center">
              <thead>
                <tr>
                  <th id="prodotto">Prodotto</th>
                  <th id="quantità">Quantità</th>
                  <th id="prezzo">Prezzo</th>
                  <th id="rimuovi">Rimuovi dal Carrello</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $prezzoTotale=0;
                for ($i=0; $i <count($carrello) ; $i++) {
                  $prezzoTotale += $carrello[$i]['prezzo']*$carrello[$i]['quantità'];
                ?> <tr>
                <form action="php/removeCart.php" method="post">
                  <td headers="prodotto"><?php echo $carrello[$i]['prodotto']; ?><input type="hidden" name="prodotto" value="<?php echo $carrello[$i]['prodotto']; ?>"> </td>
                  <td headers="quantità"><?php echo $carrello[$i]['quantità']; ?></td>
                  <td headers="prezzo"><?php echo $carrello[$i]['prezzo']; ?></td>
                  <td headers"rimuovi"><input class="btn btn-outline-light text-muted" type="submit" name="add" value="-"></td>
                </form>
                </tr>
                <?php
                }
                 ?>
              </tbody>
            </table>
          </div>
            <div class="row">
              <div class="col-sm-12 text-right">
                <h2>TOTALE: <?php echo number_format($prezzoTotale,2); ?></h2>
              </div>
            </div>
              <?php
          } else{
            echo "<p> Il carrello è vuoto. </p>";
          }?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 text-right">
    <?php if (isset($_GET['error'])){
    ?><p>Il carrello è vuoto, riempilo subito!</p> <?php
    } ?>
    <button id="right" type="button" class="btn btn-outline-dark" onclick="window.location='comunicazioni.php'">Comunicazioni al venditore >> </button>
  </div>
</div>
<footer class="bg-dark text-dark mt-2 pt-2"> . </footer>
</div>


  </body>

  <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-sm modal-dialog-centered">
     <div class="modal-content bg-light">
       <div class="modal-header">
          <h4 class="modal-title">I tuoi dati:</h4>
        </div>
       <!-- Modal body -->
       <div class="modal-body text-dark">
         <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "ecantoun";

         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
         $var= $_SESSION['email'];
         $sql = "SELECT email, password, nome, cognome, numeroTelefono FROM user WHERE email= '$var'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {?>
           <?php
             while($row = $result->fetch_assoc()) {
               ?>
               <form id="modificaDati" action="php/modifyUser.php" method="post">
               <fieldset> <legend></legend>
                 <!-- <label>Email:
                   <input type="text" name="email" value="<?php echo $row["email"] ?>" required>
                 </label></br></br> -->
                 <label>Nome:
                   <input type="text" name="nome" value="<?php echo $row["nome"] ?>" required>
                 </label></br></br>
                 <label>Cognome:
                   <input type="text" name="cognome" value="<?php echo $row["cognome"] ?>" required>
                 </label></br></br>
                 <label>Telefono:
                   <input type="text" name="tel" value="<?php echo $row["numeroTelefono"] ?>" required>
                 </label></br></br>
               </fieldset>
               <button class="btn btn-primary float-left mt-2" type="submit" name="addCart" >Conferma</button>
               </form><?php
             }
         ?>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>

  <div class="modal fade" id="modMail" role="dialog">
   <div class="modal-dialog modal-sm modal-dialog-centered">
     <div class="modal-content bg-light">
       <div class="modal-header">
          <h4 class="modal-title">I tuoi dati:</h4>
        </div>
       <!-- Modal body -->
       <div class="modal-body text-dark">
         <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "ecantoun";

         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
      ?>

               <form id="modificaMail" action="php/modifyMail.php" method="post">
               <fieldset> <legend></legend>
                 <label>Nuova Email:
                   <input type="text" name="email" value="" required>
                 </label></br></br>

               </fieldset>
               <button class="btn btn-primary float-left mt-2" type="submit" name="addCart" >Conferma</button>
               </form>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>

  <div class="modal fade" id="modCarta" role="dialog">
   <div class="modal-dialog modal-sm modal-dialog-centered">
     <div class="modal-content bg-light">
       <div class="modal-header">
          <h4 class="modal-title">I tuoi dati:</h4>
        </div>
       <!-- Modal body -->
       <div class="modal-body text-dark">
         <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "ecantoun";

         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
      ?>

               <form id="modificaCarta" action="php/addCardHome.php" method="post">
               <fieldset> <legend></legend>
                 <label>Carta:
                   <input type="text" name="carta" value="" required>
                 </label></br></br>

               </fieldset>
               <button class="btn btn-primary float-left mt-2" type="submit" name="addCart" >Conferma</button>
               </form>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>

  <div class="modal fade" id="modIndirizzo" role="dialog">
   <div class="modal-dialog modal-sm modal-dialog-centered">
     <div class="modal-content bg-light">
       <div class="modal-header">
          <h4 class="modal-title">I tuoi dati:</h4>
        </div>

       <div class="modal-body text-dark">
         <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "ecantoun";


         $conn = new mysqli($servername, $username, $password, $dbname);

         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
      ?>


        <div class="col-sm-12">
          <div class="container">
            <table class="table  table-striped text-center">
              <thead>
                <tr>
                  <th>Indirizzo</th>
                  <th>Rimuovi</th>
                </tr>
              </thead>
              <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ecantoun";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
              $email= $_SESSION['email'];
              $sql = "SELECT indirizzo FROM indirizzo WHERE email= '$email'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {?>
                <tbody>
                  <?php
                    while($row = $result->fetch_assoc()) {?>
                      <tr><form id="eliminaIndirizzo" action="php/removeAddress.php" method="post"><?php

                      ?> <td><?php echo $row["indirizzo"] ?><input type="hidden" name="indirizzo" value="<?php echo $row["indirizzo"] ?>"> </td>
                      <td>
                        <input type="submit" class="btn btn-outline-dark" name="removeAddress" data-toggle="modal" data-target="#myModal" value="-">

                   </td>
                      </form></tr> <?php
                    }
                ?>
              </tbody> <?php } ?>
              </table>
            </div>
          </div>
               <form id="modificaIndirizzo" action="php/addAddressHome.php" method="post">
               <fieldset> <legend></legend>
                 <label>Nuovo indirizzo:
                   <input type="text" name="indirizzo" value="" required>
                 </label></br></br>

               </fieldset>
               <button class="btn btn-primary float-left mt-2" type="submit" name="addCart" >Conferma</button>
               </form>
       </div>


       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>


  <div class="modal fade" id="modPass" role="dialog">
   <div class="modal-dialog modal-sm modal-dialog-centered">
     <div class="modal-content bg-light">
       <div class="modal-header">
          <h4 class="modal-title">I tuoi dati:</h4>
        </div>
       <!-- Modal body -->
       <div class="modal-body text-dark">
         <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "ecantoun";

         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
      ?>



               <form id="modificaPass" action="php/modifyPass.php" method="post">

                 <label>Password attuale:
                   <input type="password" name="act" value="" id="act"  required>
                 </label></br></br>
                 <label>Nuova password:
                   <input type="password" name="new" value="" required>
                 </label></br></br>
                 <label>Replica nuova password:
                   <input type="password" name="new2" value="" required>
                 </label></br></br>
                 <div id="errore"><p><?php
                   if(isset($_GET['error'])){
                     echo "Password attuale sbaglita";
                   }
                  ?>
                  <div id="errore"><p><?php
                    if(isset($_GET['error2'])){
                      echo "Le nuove password non combaciano";
                    }
                   ?>
                 <button type="submit" class="btn btn-primary" name="signin">Conferma</button>


               <!-- <button class="btn btn-outline-primary float-left mt-2" type="submit" name="addCart" onclick="formhash(this.form, this.form.act);" >Modifica</button> -->

               </form>
       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
  </div>
  </div>
  </div>
<?php } ?>
</html>
