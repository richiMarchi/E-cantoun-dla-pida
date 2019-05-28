
<?php
include 'php/dbconnection.php';
// include 'php/functions.php';
sec_session_start();
if(login_check($mysqli)) {
$data_attuale = date ("d/m/Y");}
// else {
//   header("Location: index.php");
// }

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
      <h2 class="text-center">Home</h2>
    </div>
  </div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="#">
      <i class="far fa-user"></i></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <?php echo $_SESSION['nome'] . " " . $_SESSION['cognome']; ?>
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


  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <div class="container">
          <div class="col-sm-12">
            <h2 class="text-center ">Consigli del giorno!</h2>
            <?php
              $sql = "SELECT consiglio FROM consigliodelgiorno WHERE attivo='1'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                ?>
                <ul id="consigli" class="list-group list-striped text-center">
                  <?php
                    while($row = $result->fetch_assoc()) {
                      ?> <li class="list-group-item"><?php echo $row["consiglio"] ?></li><?php
                    }
                  ?>
                  </ul> <?php
              } else {
                ?> <p>Nessun consiglio in evidenza.</p> <?php
              }
             ?>
          </div>
        </div>
      </div>
    </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="container">
            <div class="col-sm-12">
              <h2 class="text-center ">Avvisi:</h2>
              <?php
                $sql = "SELECT codiceAvviso, dataInizio, dataFine, contenuto FROM avviso WHERE dataFine is NULL";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {?>
                  <ul class="list-group text-center">
                    <?php
                      while($row = $result->fetch_assoc()) {
                        ?> <li class="list-group-item"><?php echo $row["contenuto"] ?></li><?php
                  } ?>
                  </ul><?php
                } else {
                  ?> <p>Nessun avviso in evidenza.</p> <?php
                }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div id="tabella" class="row">
    <div class="col-sm-12">
      <div class="container">
        <?php showUltimiAcquisti(); ?>
      </div>
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


</html>
<?php
} else {
   header('Location: php/logout.php');
} ?>

<?php
function login_check($mysqli) {
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['email'], $_SESSION['nome'], $_SESSION['cognome'], $_SESSION['numeroTelefono'], $_SESSION['login_string'])) {
     $nome = $_SESSION['nome'];
     $login_string = $_SESSION['login_string'];
     $cognome = $_SESSION['cognome'];
     $email = $_SESSION['email'];
     $numeroTelefono = $_SESSION['numeroTelefono'];
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
     if ($stmt = $mysqli->prepare("SELECT password FROM user WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('i', $email); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();

        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($pass); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           $login_check = hash('sha512', $pass.$user_browser);
           if($login_check == $login_string) {
              // Login eseguito!!!!
              return true;
           } else {
              //  Login non eseguito
              return false;
           }
        } else {
            // Login non eseguito
            return false;
        }
     } else {
        // Login non eseguito
        return false;
     }
   } else {
     // Login non eseguito
     return false;
   }
}

function sec_session_start() {
        $session_name = 'sec_session_id'; // Imposta un nome di sessione
        $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
        ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
        $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
        session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        session_start(); // Avvia la sessione php.
        session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}
?>


<?php

function modifyUser(){

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

 $email= $_POST["email"];
 $nome= $_POST["nome"];
 $cognome= $_POST["cognome"];
 $telefono= $_POST["tel"];
 $pwd = $_SESSION['password'];

 $sql = "UPDATE user SET email= '$email', nome= '$nome', cognome= '$cognome', numeroTelefono= '$telefono' WHERE password= '$pwd'";

 if ($conn->query($sql) === TRUE) {
   header("Location: http://localhost:8080/progetto_tecwebbe/Web/home.php");
 die();
 } else {
     echo "Error deleting record: " . $conn->error;
 }

 $conn->close();
}
 ?>
<?php function showUltimiAcquisti(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecantoun";
$conn = new mysqli($servername, $username, $password, $dbname);
$email= $_SESSION["email"];
$sql="SELECT C.prodotto pr, C.categoria ca, O.orario ord FROM carrello C, ordine O WHERE C.id=O.carrello AND O.email = '$email' ORDER by O.Orario DESC limit 4";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  ?>
  <h2 class="text-center">Ultimi acquisti</h2>
  <div class="table-responsive">
  <table class="table table-dark table-striped text-center">
    <thead>
      <tr>
        <th id="pietanza">Pietanza</th>
        <th id="prezzo">Prezzo</th>
        <th id="data">Data ordine</th>
        <th id="add">Aggiungi</th>
      </tr>
    </thead>
    <tbody>
  <?php
    while($row = $result->fetch_assoc()) {
        $orario=substr($row['ord'],8,2) . substr($row['ord'],4,4) . substr($row['ord'],0,4);
        switch ($row['ca']) {
          case '1':
            $id=$row['pr'];
            $quer="SELECT nome, prezzo FROM piada WHERE id = '$id'";
            $res=$conn->query($quer);
            if ($res->num_rows > 0) {
                while($riga = $res->fetch_assoc()) {
                    $prodotto = $riga['nome'];
                    $prezzo = $riga['prezzo'];
                }
            }
            ?>
            <tr>
              <form action="php/addCart.php" method="post">
                <td headers="prodotto"><?php echo $prodotto; ?>
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <input type="hidden" name="categoria" value="1">
                  <input type="hidden" name="prodotto" value="<?php echo $prodotto; ?>">
                </td>
                <td headers="prezzo"><?php echo $prezzo; ?><input type="hidden" name="prezzo" value="<?php echo $prezzo; ?>"></td>
                <td headers="data"><?php echo $orario; ?></td>
                <td headers="add"><input type="submit" class="btn btn-outline-light text-muted" name="submit" value="+"></td>
              </form>
            </tr>
            <?php
            break;
            case '2':
              $id=$row['pr'];
              $quer="SELECT nome, prezzo FROM rotolo WHERE id = '$id'";
              $res=$conn->query($quer);
              if ($res->num_rows > 0) {
                  while($riga = $res->fetch_assoc()) {
                      $prodotto = $riga['nome'];
                      $prezzo = $riga['prezzo'];
                  }
              }
              ?>
              <tr>
                <form action="php/addCart.php" method="post">
                  <td><?php echo $prodotto; ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="categoria" value="2">
                    <input type="hidden" name="prodotto" value="<?php echo $prodotto; ?>">
                  </td>
                  <td><?php echo $prezzo; ?><input type="hidden" name="prezzo" value="<?php echo $prezzo; ?>"></td>
                  <td><?php echo $orario; ?></td>
                  <td><input type="submit" class="btn btn-outline-light text-muted" name="submit" value="+"></td>
                </form>
              </tr>
              <?php
              break;
              case '3':
                $id=$row['pr'];
                $quer="SELECT nome, prezzo FROM cassone WHERE id = '$id'";
                $res=$conn->query($quer);
                if ($res->num_rows > 0) {
                    while($riga = $res->fetch_assoc()) {
                        $prodotto = $riga['nome'];
                        $prezzo = $riga['prezzo'];
                    }
                }
                ?>
                <tr>
                  <form action="php/addCart.php" method="post">
                    <td><?php echo $prodotto; ?>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="categoria" value="3">
                      <input type="hidden" name="prodotto" value="<?php echo $prodotto; ?>">
                    </td>
                    <td><?php echo $prezzo; ?><input type="hidden" name="prezzo" value="<?php echo $prezzo; ?>"></td>
                    <td><?php echo $orario; ?></td>
                    <td><input type="submit" class="btn btn-outline-light text-muted" name="submit" value="+"></td>
                  </form>
                </tr>
                <?php
                break;
                case '4':
                  $id=$row['pr'];
                  $quer="SELECT nome, prezzo FROM bibita WHERE id = '$id'";
                  $res=$conn->query($quer);
                  if ($res->num_rows > 0) {
                      while($riga = $res->fetch_assoc()) {
                          $prodotto = $riga['nome'];
                          $prezzo = $riga['prezzo'];
                      }
                  }
                  ?>
                  <tr>
                    <form action="php/addCart.php" method="post">
                      <td><?php echo $prodotto; ?>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="categoria" value="4">
                        <input type="hidden" name="prodotto" value="<?php echo $prodotto; ?>">
                      </td>
                      <td><?php echo $prezzo; ?><input type="hidden" name="prezzo" value="<?php echo $prezzo; ?>"></td>
                      <td><?php echo $orario; ?></td>
                      <td><input type="submit" class="btn btn-outline-light text-muted" name="submit" value="+"></td>
                    </form>
                  </tr>
                  <?php
                  break;
        }
    }
    ?>
    </tbody>
  </table>
</div>
    <?php
}
else{
  ?><p>Nessun acquisto effettuato di recente.</p><?php
}

 } ?>
