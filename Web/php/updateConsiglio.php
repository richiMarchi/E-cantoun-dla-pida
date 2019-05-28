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

$var= $_POST["id"];
$var = str_replace("'", "`", $var);
$var = str_replace("\"", "`", $var);
$sql = "SELECT max(codiceConsiglio+1) FROM consigliodelgiorno";
if ($result->num_rows > 0) {
  $cod = $result->fetch_assoc();
}


// sql to delete a record
 $sql = "INSERT INTO consigliodelgiorno (codiceConsiglio, consiglio, attivo) VALUES ('$cod', '$var',1)";


if ($conn->query($sql) === TRUE) {
  header("Location: ../avvisiEconsigli.php");
die();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
