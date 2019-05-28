<?php
require("secStart.php");

if(isset($_SESSION['carrello'])){
  $cart=$_SESSION['carrello'];
  $trovato=0;
  for ($i=0; $i < count($cart); $i++) {
    if($cart[$i]['prodotto']!=$_POST['prodotto'] || $trovato){
      if($carrello){
        $carrello[] = array('id' => $cart[$i]['id'], 'categoria' => $cart[$i]['categoria'], 'prodotto' => $cart[$i]['prodotto'], 'prezzo' => $cart[$i]['prezzo'],
         'quantità' => $cart[$i]['quantità']);
      } else {
        $carrello = array(array('id' => $cart[$i]['id'], 'categoria' => $cart[$i]['categoria'], 'prodotto' => $cart[$i]['prodotto'], 'prezzo' => $cart[$i]['prezzo'],
         'quantità' => $cart[$i]['quantità']));
      }
    } else {
      $trovato=1;
    }
  }
}
$_SESSION['carrello'] = $carrello;
header("location: ../carrello.php");
?>
