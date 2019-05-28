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

$today = date("Y-m-d H:i:s");
$var= $_POST["id"];
$var = str_replace("'", "`", $var);
$var = str_replace("\"", "`", $var);
$sql = "SELECT max(codiceAvviso+1) FROM avviso";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $cod = $result->fetch_assoc();
}

echo $var;
// sql to delete a record
 $sql = "INSERT INTO avviso (codiceAvviso, dataInizio, dataFine, contenuto) VALUES ('$cod','$today',NULL, '$var')";


if ($conn->query($sql) === TRUE) {
  header("Location: ../avvisiEconsigli.php");
die();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
