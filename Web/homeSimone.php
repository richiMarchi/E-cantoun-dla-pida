<?php
include 'php/dbconnection.php';
//include 'php/functions.php';
sec_session_start();
if(login_check($mysqli) == true) {
$data_attuale = date ("d/m/Y");
?>

<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="css/home.css" type="text/css">
    <link rel="stylesheet" href="css/alto.css" type="text/css">
    <title>E cantoun dla pida</title>
    <style>
    body {
      /* The image used */
        background-image: url('cecisuper.png') ;
        /* Full height*/
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <div class="bg"></div>
    <header>
      <aside>
        <figure>
          <img id="utente" src="res/utente.jpg" alt="icona utente">
          <p id="nomeU"><?php echo $_SESSION['nome'] ." " . $_SESSION['cognome']  ?></p>
        </figure>
      </aside>
      <aside>
        <figure>
          <a href="carrello.html"><img id="carrello"  src="res/carrello.jpg" alt="icona carrello"></a>
        </figure>
        <aside id="scritte">
          <p id="prezzo">prezzo,00 €</p>
          <button type="button" name="button"><span>Cashout</span></button>
        </aside>
      </aside>
    </header>
    <nav id="principale">
      <a href="home.php">Home</a>
      <a href="menu.php">Menù</a>
      <a href="contatti.html">Contatti</a>
      <a href="guida.html">Guida</a>
    </nav>
    <aside id="tot">
      <section id="consigli">
        <h2>Consiglio del giorno!</h2>
        <?php
          $sql = "SELECT consiglio FROM consigliodelgiorno /*WHERE attivo='1'*/";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            ?>
            <ul>
              <?php
                while($row = $result->fetch_assoc()) {
                  ?> <li><?php echo $row["consiglio"] ?></li><?php
                }
              ?>
              </ul> <?php
          } else {
            ?> <p>Nessun consiglio in evidenza.</p> <?php
          }
         ?>
      </section>
      <aside class="avvisi">
        <h2>Avvisi:</h2>
        <?php
          $sql = "SELECT codiceAvviso, dataInizio, dataFine, contenuto FROM avviso WHERE dataFine is NULL /*AND dataInizio<=$data_attuale*/";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {?>
            <ul>
              <?php
                while($row = $result->fetch_assoc()) {
                  ?> <li><?php echo $row["contenuto"] ?></li><?php
            } ?>
            </ul><?php
          } else {
            ?> <p>Nessun avviso in evidenza.</p> <?php
          }
         ?>
      </aside>
  </aside>
    <section id="ultimiA">
      <h1>Ultimi acqsuiti</h1>
      <table>
        <tr>
          <th>Pietanza</th>
          <th>Prezzo</th>
          <th>Data ordine</th>
          <th>Aggiungi</th>
        </tr>
        <tr>
          <td>Piada col cotto</td>
          <td>3,00 €</td>
          <td>26/11/17</td>
          <td><button type="button" name="add">+</button></td>
        </tr>
        <tr>
          <td>Birra Peroni</td>
          <td>2,50 €</td>
          <td>01/12/17</td>
          <td><button type="button" name="add">+</button></td>
        </tr>
      </table>
    </section>

  </body>
</html>
<?php
} else {

   echo 'You are not authorized to access this page, please login. <br/>';
   header('Location: php/logout.php');
}

function login_check($mysqli) {
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['email'], $_SESSION['nome'], $_SESSION['cognome'], $_SESSION['numeroTelefono'], $_SESSION['login_string'])) {
     $nome = $_SESSION['nome'];
     $login_string = $_SESSION['login_string'];
     $cognome = $_SESSION['cognome'];
     $email = $_SESSION['email'];
     $numeroTelefono = $_SESSION['numeroTelefono'];
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
     echo "$email"."@@@@@@@@@@@@@@@@@@@";
     if ($stmt = $mysqli->prepare("SELECT password FROM user WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('i', $email); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();

        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($pw); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           echo "$email";
           echo "$pw"."----------";
           echo "$login_string"."----------";
           $login_check = hash('sha512', $pw.$user_browser);
           echo "$login_check"."-----------";
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
