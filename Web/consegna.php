<?php
require("php/secStart.php");
require("php/dbconnection.php");
?>
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
  <script type="text/javascript" src="notification.js"></script>
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
<div class="container-fluid">
<body class="bg-light">

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="text-center ">E Cantoun Dla Pida</h1>
      <p class="text-center font-italic">La pida se parsot la pis un po ma tot</p>
      <h2 class="text-center">Consegna</h2>
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
          <a class="navbar-brand" href="#">
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
<form class="" action="php/addAddress.php" method="post">
<div class="row text-center">
  <div id="indirizzo" class="col-md-6">
    <div class="col-sm-12">
      <h2 class="text-center">Indirizzo:</h2>
    </div>
    <div class="col-sm-12">
      <div class="radio">
        <input type="radio" name="luogo" value="campus" id="campus"> <label for="campus">Campus: via delle Ginestre, 4</label><br>
        <input type="radio" name="luogo" value="E cantoun dla pida: via del Maniero, 17" id="sede"> <label for="sede">E cantoun dla pida: via del Maniero, 17</label>
        <?php
        $email= $_SESSION['email'];
        $sql = "SELECT indirizzo FROM indirizzo WHERE email= '$email'";
        $result = $conn->query($sql);
        $i=1;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              ?><br><input type="radio" name="luogo" value="<?php echo $row['indirizzo'];?>" id="indirizzo <?php echo $i; ?>">
              <label for="indirizzo <?php echo $i; ?>"> <?php echo "Indirizzo ". "$i" . ": " . $row['indirizzo'];?> </label><?php
              $i++;
            }
        }
         ?>
      </div>
    </div>
    <div class="col-sm-12">
      <?php
      if (isset($_GET['add'])){
        ?>
        <form action="php/addAddress.php" method="post">
          <label>Indirizzo <?php echo $i; ?> : <input type="text" name="indirizzo" value=""></label>
          <input type="submit" class="btn btn-outline-dark" name="submit" value="Aggiungi indirizzo di consegna">
        </form>
        <?php
      }else{
        ?><button type="button" class="btn btn-outline-dark" onclick="window.location='consegna.php?add'">Aggiungi indirizzo di consegna</button><?php
      }
      ?>
      <?php if (isset($_GET['error']) && $_GET['error']==="address"){
        ?><p style="color:red;">Selezionare un indirizzo.</p><?php
      } ?>
    </div>
  </div>
  <div class="col-md-6">
    <h2>Disponibile dalle ore: <?php echo date("H:i ", time()+30*60); ?></h2>
      <label for="ora">Scegli un orario di ritiro: <br>
        <input type="datetime-local" id="ora" name="mydatetime" value="<?php echo date("Y-m-d") . "T" . date("H:i", time()+30*60);?>">
      </label>
      <?php if (isset($_GET['error']) && $_GET['error']==="date"){
        ?><p style="color:red;">Selezionare una data valida.</p><?php
      } ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 text-left">
<button id="left" type="button" class="btn btn-outline-dark" onclick="window.location='comunicazioni.php'"><< Comunicazioni al venditore</button>
</div>
</div>
<div class="row">
  <div class="col-sm-12 text-right">
      <input type="submit" id="right" class="btn btn-outline-dark" value="Modalità di pagamento >>">
</div>
</div>
</form>
<footer class="bg-dark text-dark mt-2 pt-2"> . </footer>
</body>





</div>
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
