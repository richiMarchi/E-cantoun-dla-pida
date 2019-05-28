
<?php
include 'dbconnection.php';
include 'functions.php';
sec_session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecantoun";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 // $email= $_POST["email"];
 $nome= $_POST["nome"];
 $cognome= $_POST["cognome"];
 $telefono= $_POST["tel"];
 $currentEmail = $_SESSION['email'];

 $sql = "UPDATE user SET nome= '$nome', cognome= '$cognome', numeroTelefono= '$telefono' WHERE email= '$currentEmail'";

 if ($conn->query($sql) === TRUE) {
   $_SESSION['nome']= $nome;
   $_SESSION['cognome']= $cognome;
   $_SESSION['email']= $currentEmail;
   header("Location: ../home.php");
 die();
 } else {
     echo "Error deleting record: " . $conn->error;
 }

 $conn->close();
 ?>
