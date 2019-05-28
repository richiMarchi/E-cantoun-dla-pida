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

    <?php header("Refresh:20") ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- <script type="text/javascript" src="gestorenotification.js"></script> -->
    <title>E cantoun dla pida</title>
    <style>
      .navbar{
        margin-bottom: 50px;
      }
      #left{
        margin-top: 50px;
        margin-left: 1%;
      }
      body{
        font-style: italic;
      }

      .comm{
        width: 20%;


      }
    </style>
  </head>



  <body class="bg-light">
    <div class="class container-fluid">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="home_gestore.php">E cantoun dla pida</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link disabled" href="prenotazioni.php">Prenotazioni</a>
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

    <div class="row ">
      <div class="col-sm-12">
        <h1 class="text-center mb-5">Gestisci le Prenotazioni:</h1>
      </div>
    </div>




<div class="row">
  <div class="container-fluid">
    <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th id="nome">Nome</th>
              <th id="mail">Mail</th>
              <th id="prodotto">Prodotto</th>
              <th id="quantità">Quantità</th>
              <th id="orario">Orario</th>
              <th id="luogo">Luogo</th>
              <th id="pagato">Pagato</th>
              <th id="comunicazioni">Comunicazioni</th>
              <th id="rimuovi">Rimuovi</th>
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
            $sql = "SELECT id, email, carrello, comunicazioni, luogo, orario, carta FROM ordine WHERE evaso=0 ORDER BY orario ";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            ?>
          <tbody>
            <?php
            while($row = $result->fetch_assoc()) {
              if($row["carta"]=="fattorino" || $row["carta"]=="no"){
                $pagato="no";

              }else{
                $pagato="si";
              }
              $ordine= $row["id"];
              $email= $row["email"];
              $carrello= $row["carrello"];
              $comunicazioni= $row["comunicazioni"];
              $luogo= $row["luogo"];
              $orario= $row["orario"];
              $sql = "SELECT nome FROM user WHERE email='$email' ";
              $result1 = $conn->query($sql);
              if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                  $nome= $row["nome"];
                }
              }

              $sql = "SELECT count(*) as num FROM carrello WHERE id='$carrello' ";
              $result2 = $conn->query($sql);
              if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                  $num= $row["num"];
                }
              }
              if($num == 1){
                $sql = "SELECT categoria  FROM carrello WHERE id='$carrello' ";
                $result5 = $conn->query($sql);
                if ($result5->num_rows > 0) {
                  while($row = $result5->fetch_assoc()) {
                    if($row["categoria"] == 1){
                      $cat = "piada";
                    } else if($row["categoria"] == 2){
                        $cat = "rotolo";
                      }
                      else if($row["categoria"] == 3){
                          $cat = "cassone";
                        }
                        else if($row["categoria"] == 4){
                            $cat = "bibita";
                          }
                          $numcat= $row["categoria"];

                  }
                }
                $sql = "SELECT prodotto, quantita FROM carrello WHERE id='$carrello' ";
                $result5 = $conn->query($sql);
                if ($result5->num_rows > 0) {
                  while($row = $result5->fetch_assoc()) {
                    $idP= $row["prodotto"];
                    $qnt= $row["quantita"];

                  }
                }
                $sql = "SELECT nome as nomeP  FROM $cat  WHERE categoria = '$numcat' and id= '$idP' ";
                $result3 = $conn->query($sql);
                if ($result3->num_rows > 0) {
                  while($row = $result3->fetch_assoc()) {

                    $nomeP= $row["nomeP"];
                  }
                }
                ?>
                <tr><form action="php/deleteOrdine.php" method="post">
                  <input type="hidden" name="ordine" value="<?php echo $ordine ?> ">
                  <input type="hidden" name="email" value="<?php echo $email ?> ">
                <td headers="nome"><?php echo $nome ?></td>
                <td headers="email"><?php echo $email ?> </td>
                <td headers="prodotto"><?php echo $nomeP ?> </td>
                <td headers="quantità"><?php echo $qnt ?> </td>
                <td headers="orario"><?php echo $orario ?> </td>
                <td headers="luogo"><?php echo $luogo ?> </td>
                <td headers="pagato"><?php echo $pagato ?> </td>
                <td headers="comunicazioni" class="comm"><p class="com"><?php echo $comunicazioni ?> </p></td>
                <td headers="rimuovi"><input type="submit" class="btn btn-outline-dark" name="addCart" value="-" ></td>
                </form>
                </tr>
              <?php  } else {?>
                <tr><form action="php/deleteOrdine.php" method="post">
                  <input type="hidden" name="ordine" value="<?php echo $ordine ?> ">
                  <input type="hidden" name="email" value="<?php echo $email ?> ">
                <td headers="nome" rowspan="<?php echo $num ?>"><?php echo $nome ?> </td>
                <td headers="email" rowspan="<?php echo $num ?>"><?php echo $email ?> </td>
                <?php
                $sql = "SELECT categoria, prodotto, quantita  FROM carrello WHERE id='$carrello' ";
                $result5 = $conn->query($sql);
                if ($result5->num_rows > 0) {
                  $cont= 0;
                  while($row = $result5->fetch_assoc()) {
                    if($row["categoria"] == 1){
                      $cat = "piada";
                    } else if($row["categoria"] == 2){
                        $cat = "rotolo";
                      }
                      else if($row["categoria"] == 3){
                          $cat = "cassone";
                        }
                        else if($row["categoria"] == 4){
                            $cat = "bibita";
                          }
                              $numcat= $row["categoria"];
                              $idP= $row["prodotto"];
                              $qnt= $row["quantita"];
                             echo "<script>console.log( 'Debug Objects: " . $idP . "' );</script>";
                               $sql = "SELECT nome as nomeP  FROM $cat  WHERE categoria = '$numcat' and id= '$idP' ";
                               $result3 = $conn->query($sql);
                               if ($result3->num_rows > 0) {
                                 while($row = $result3->fetch_assoc()) {
                                     echo "<script>console.log( 'Debug Objects: " . $row["nomeP"] . "' );</script>";
                                   $nomeP= $row["nomeP"];
                                   if($cont==0){
                                     ?><td headers="prodotto"><?php echo $nomeP ?> </td>
                                     <td headers="quantità"><?php echo $qnt ?> </td>
                                     <td headers="orario" rowspan="<?php echo $num ?>"><?php echo $orario ?> </td>
                                     <td headers="luogo" rowspan="<?php echo $num ?>"><?php echo $luogo ?> </td>
                                     <td headers="pagato" rowspan="<?php echo $num ?>"><?php echo $pagato ?> </td>
                                     <td headers="comunicazioni" class="comm" rowspan="<?php echo $num ?>"><?php echo $comunicazioni ?> </td>

                                     <td headers="rimuovi" rowspan="<?php echo $num ?>"><input type="submit" class="btn btn-outline-dark" name="addCart" data-toggle="modal" data-target="#myModal" value="-" ></td>
                                     </form>
                                   </tr>
                                   <?php
                                   $cont = $cont+1;
                                 }else {
                                     ?><tr><td headers="prodotto"><?php echo $nomeP ?> </td>
                                       <td headers="quantità"><?php echo $qnt ?> </td></tr><?php
                                     $cont = $cont+1;
                                   }
                                 }
                               }
                             }
                        $cont=0;
                      }
                 }
              ?>
            </tbody> <?php
            }
          } ?>

           </table>
        </div>
        </div>
      </div>
    </div>

    <button id="left" class="btn btn-outline-dark" type="button" name="buttonSx" onclick="window.location='home_gestore.php'">Indietro</button>

      <footer class="bg-dark text-dark mt-2 pt-2"> . </footer>
  </body>

</html>
