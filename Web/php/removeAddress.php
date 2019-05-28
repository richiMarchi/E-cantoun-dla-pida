<?php
include 'dbconnection.php';
include 'functions.php';
sec_session_start();
  $email= $_SESSION['email'];
  $ind= $_POST["indirizzo"];
  $sql = "DELETE FROM indirizzo WHERE email= '$email'  AND indirizzo= '$ind'";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../Home.php");
  die();
  } else {
      echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
 ?>
