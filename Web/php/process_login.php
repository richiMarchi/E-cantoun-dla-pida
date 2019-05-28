<?php
include 'dbconnection.php';
include 'functions.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
if(isset($_POST['user'], $_POST['p'])) {
   $email = $_POST['user'];
   $password = $_POST['p']; // Recupero la password criptata.
   if(login($email, $password, $mysqli) == true) {
      // Login eseguito
      echo 'Success: You have been logged in!';
      if ($_SESSION['admin']) {
        header("location: ../home_gestore.php");
      } else {
        header("location: ../home.php");
      }
   } else {
      // Login fallito
      header('Location: ../index.php?error=error');
   }
} else {
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}
?>
