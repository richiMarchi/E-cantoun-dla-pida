<?php
  require("secStart.php");
if (isset($_POST['carta']) && $_POST['carta']!="") {
  require("dbconnection.php");
  $sql = "INSERT INTO pagamento (email, carta) VALUES ('".$_SESSION['email'] ."', '".$_POST['carta']."')";
  $conn->query($sql);
  header('location: ../pagamento.php');
}else if(isset($_POST['pagamento'])){
  $_SESSION['pagamento']=$_POST['pagamento'];
  header('location: ../conferma.php');
}else {
  header('location: ../pagamento.php?error');
}
 ?>
