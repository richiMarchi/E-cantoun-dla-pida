<?php
include 'dbconnection.php';
include 'functions.php';

sec_session_start();
if (isset($_POST['indirizzo'], $_POST['p'], $_POST['nome'], $_POST['cognome'], $_POST['telefono'])) {
$email = $_POST['indirizzo'];
$password = $_POST['p'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$numeroTelefono = $_POST['telefono'];
$admin = 0;
}

$stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
if ($row == 0) {
  // Recupero la password criptata dal form di inserimento.
  //$password = $_POST['password'];
  // Crea una chiave casuale
  $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
  // Crea una password usando la chiave appena creata.
  $password = hash('sha512', $password.$random_salt);

  // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
  // Assicurati di usare statement SQL 'prepared'.


  if ($insert_stmt = $mysqli->prepare("INSERT INTO user (email, password, nome, cognome, numeroTelefono, admin, salt) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
   $insert_stmt->bind_param('sssssss', $email, $password, $nome, $cognome, $numeroTelefono, $admin, $random_salt);
   // Esegui la query ottenuta.
   $insert_stmt->execute();
   $messaggiazzo = "Benvenuto a E Cantoun Dla Pida, ".$nome." ".$cognome."!";
   $stmmt = $mysqli->prepare("INSERT INTO confermaordine (email,messaggio) VALUES (?,?)");
   $stmmt->bind_param('ss',$email, $messaggiazzo);
   $stmmt->execute();
   header("location: ../index.php?success");
  }
} else {
  header("location: ../index.php?error=reg");
}
?>
