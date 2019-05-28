<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
      <!-- <link rel="stylesheet" href="css/menu.css" type="text/css">
      <link rel="stylesheet" href="css/alto.css" type="text/css"> -->
    <title>E cantoun dla pida</title>
    <script>
    function show(str){
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tabella").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "php/show_menu.php?q="+str, true);
        xhttp.send();
      }
    </script>
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
          <p id="nomeU">nome utente</p>
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
      <h1>MENU'</h1>
      <nav id="menu">
        <button type="button" name="piada" onclick="show(this.name)">Piada</button>
        <button type="button" name="rotolo" onclick="show(this.name)">Rotolo</button>
        <button type="button" name="cassone" onclick="show(this.name)">Cassone</button>
        <button type="button" name="bibita" onclick="show(this.name)">Bibita</button>
      </nav>
      <div id="tabella">
         <?php showPiada();?>
      </div>
    </section>
  </body>
</html>
<?php function showPiada(){?>
  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Farcitura</th>
        <th>Valore Nutrizionale</th>
        <th>Prezzo</th>
        <th>Aggiungi Carrello</th>
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
    $sql = "SELECT id, categoria, nome, ingredienti, prezzo, calorie, healthy FROM piada ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {?>
      <tbody>
        <?php
          while($row = $result->fetch_assoc()) {?>
            <tr><form action="php/addCart.php" method="post"><?php
            ?> <td><?php echo $row["nome"] ?> <input type="hidden" name="id" value="<?php echo $row["id"] ?> ">
              <input type="hidden" name="categoria" value="<?php echo $row["categoria"] ?> "> <input type="hidden" name="prodotto" value="<?php echo $row["nome"] ?> "> </td><?php
            ?> <td><?php echo $row["ingredienti"] ?></td><?php
            ?> <td><?php echo $row["calorie"] . " kcal"; if($row["healthy"]==1){ ?> <img src="res/leaf.png" alt="healthy food"><?php } ?></td><?php
            ?> <td><?php echo $row["prezzo"] . "€" ?><input type="hidden" name="prezzo" value="<?php echo $row["prezzo"] ?>"> </td>
            <td><input type="submit" name="addCart" value="+"></td>
            </form></tr> <?php
          }
      ?>
    </tbody> <?php } ?>
    </table> <?php
  }
?>
