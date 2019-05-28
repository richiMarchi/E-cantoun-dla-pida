<?php require("php/secStart.php"); ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/carrello.css" type="text/css">
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
    <section>
      <h1>CARRELLO</h1>
      <?php if (isset($_SESSION['carrello']) && $_SESSION['carrello']) {
        $carrello=$_SESSION['carrello'];
        ?>
        <table>
          <thead>
            <tr>
              <th>Prodotto</th>
              <th>Prezzo</th>
              <th>Rimuovi dal Carrello</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i=0; $i <count($carrello) ; $i++) {
            ?> <tr>
              <td><?php $carrello[$i]['prodotto'] ?></td>
              <td><?php $carrello[$i]['prezzo'] ?></td>
              <td><button type="button" name="add">-</button></td>
            </tr>
            <?php
            }
             ?>
          </tbody>
        </table>
          <?php
      } else{
        echo "Il carrello è vuoto.";
      }?>
    </section>
    <aside>
      <h2>TOTALE: prezzo,00€</h2>
    </aside>
    <footer>
        <aside id="avanti">
          <button type="button" name="buttonDx" onclick="move(comunicazioni)"><span>Comunicazioni al venditore</span></button>
        </aside>
    </footer>
  </body>
</html>
