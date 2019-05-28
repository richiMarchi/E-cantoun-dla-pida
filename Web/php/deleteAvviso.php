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
echo $var;
// sql to delete a record
 $sql = "UPDATE avviso SET dataFine='$today' WHERE contenuto= '$var'";


if ($conn->query($sql) === TRUE) {
    header("Location: ../avvisiEconsigli.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
