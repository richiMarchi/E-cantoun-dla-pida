<?php
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


$nome= $_POST["nome"];
$desc= $_POST["descrizione"];
$cal= $_POST["calorie"];
$prezzo= $_POST["prezzo"];
$healthy= $_POST["veg"];

$nome = "Piada $nome";
 if($healthy == NULL){
   $healthy = 0;
 }
 else {
   $healthy = 1;
 }


$sql = "SELECT max(id+1) FROM piada";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $cod = $result->fetch_assoc();
}



// sql to delete a record
 $sql = "INSERT INTO piada (id, categoria, nome, ingredienti, prezzo, calorie, healthy) VALUES ('$cod','1','$nome', '$desc','$prezzo','$cal','$healthy')";


if ($conn->query($sql) === TRUE) {
  header("Location: ../modificaMenu.php");
die();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
