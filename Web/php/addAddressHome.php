<?php
include 'dbconnection.php';
include 'functions.php';
sec_session_start();
  $sql = "INSERT INTO indirizzo (email, indirizzo) VALUES ('".$_SESSION['email'] ."', '".$_POST['indirizzo']."')";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../Home.php");
  die();
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
 ?>
