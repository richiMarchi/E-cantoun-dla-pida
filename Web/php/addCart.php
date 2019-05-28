<?php
require("secStart.php");
$trovato=0;
if(isset($_SESSION['carrello'])){
  $carrello = $_SESSION['carrello'];
  for ($i=0; $i <count($carrello); $i++) {
    if($carrello[$i]['id']===$_POST['id'] && $carrello[$i]['categoria']===$_POST['categoria']){
      $carrello[$i]['quantità']++;
      $trovato=1;
    }
  }
  if(!$trovato){
    $carrello[] = array('id' => $_POST['id'], 'categoria' => $_POST['categoria'], 'prodotto' => $_POST['prodotto'], 'prezzo' => $_POST['prezzo'], 'quantità' => '1');
  }
} else {
  $carrello = array(array('id' => $_POST['id'], 'categoria' => $_POST['categoria'], 'prodotto' => $_POST['prodotto'], 'prezzo' => $_POST['prezzo'], 'quantità' => '1'));
}
$_SESSION['carrello'] = $carrello;
if($_POST['categoria']==1) {
    header("location: ../menu.php?piada");
}else if ($_POST['categoria']==2) {
    header("location: ../menu.php?rotolo");
} else if ($_POST['categoria']==3) {
    header("location: ../menu.php?cassone");
} else if ($_POST['categoria']==4){
    header("location: ../menu.php?bibita");
}
?>
