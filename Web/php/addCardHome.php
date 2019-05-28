<?php
  require("secStart.php");

  require("dbconnection.php");
  $sql = "INSERT INTO pagamento (email, carta) VALUES ('".$_SESSION['email'] ."', '".$_POST['carta']."')";
  $conn->query($sql);

  header('location: ../home.php');

 ?>
