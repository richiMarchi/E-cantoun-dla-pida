<?php
require("secStart.php");
require("dbconnection.php");
$sql = "SELECT max(carrello) AS massimo FROM ordine";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $numero = $result->fetch_assoc();
  $id=$numero['massimo']+1;
} else {
  $id=0;
}
$carrello = $_SESSION['carrello'];
$prezzoTotale=0;
for ($i=0; $i < count($carrello); $i++) {
  $prezzoTotale+=$carrello[$i]['prezzo']*$carrello[$i]['quantità'];
  $prodotto=$carrello[$i]['id'];
  $categoria=$carrello[$i]['categoria'];
  $quantità=$carrello[$i]['quantità'];
  $sql = "INSERT INTO carrello (id, prodotto, categoria, quantita) VALUES ('$id', '$prodotto', '$categoria', '$quantità')";
  $conn->query($sql);
  echo "$sql";
}
$email=$_SESSION['email'];
if($_SESSION['comunicazione']==""){
  $comunicazione="no";
}else{
  $comunicazione=$_SESSION['comunicazione'];
  $comunicazione = str_replace("'", "\"", $comunicazione);
}
$indirizzo=$_SESSION['indirizzo'];
if ($_SESSION['pagamento']=="sede") {
  $carta="no";
} else {
  $carta=$_SESSION['pagamento'];
}
$orario=substr($_SESSION['orario'],0,10) ." " . substr($_SESSION['orario'],11,5);

$sql = "INSERT INTO ordine (id, email, carrello, comunicazioni, luogo, orario, carta, prezzo, evaso) VALUES ('','$email', '$id', '$comunicazione', '$indirizzo', '$orario', '$carta', '$prezzoTotale', '')";
$conn->query($sql);
$messaggiodamandare = "Il tuo ordine numero: ".$id." è stato preso in carico";
$sql1="INSERT INTO confermaordine (email,messaggio,status) VALUES ('$email', '$messaggiodamandare', '0')";
$conn->query($sql1);
echo "$sql";
$conn->close();

if(isset($_SESSION['carrello'])){
  unset($_SESSION['carrello']);
}
if(isset($_SESSION['comunicazione'])){
  unset($_SESSION['comunicazione']);
}
if(isset($_SESSION['pagamento'])){
  unset($_SESSION['pagamento']);
}
if(isset($_SESSION['indirizzo'])){
  unset($_SESSION['indirizzo']);
}
if(isset($_SESSION['orario'])){
  unset($_SESSION['orario']);
}
header("location: ../home.php");
 ?>
