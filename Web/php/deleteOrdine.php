<?php
include 'dbconnection.php';
include 'functions.php';
  $ordine= $_POST["ordine"];
  $email= $_POST["email"];
  $sql = "UPDATE ordine SET evaso=1 WHERE id= '$ordine'";
  if ($conn->query($sql) === TRUE) {
    $messaggio = "Il tuo ordine numero: ".$ordine." è stato spedito!";
    $sql1 = "INSERT INTO confermaordine (email,messaggio,status) VALUES ('$email', '$messaggio', '0')";
    $conn->query($sql1);
    header("Location: ../prenotazioni.php");
  die();
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
 ?>
