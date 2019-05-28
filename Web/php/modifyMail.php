
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
 $email= $_POST["email"];
 $currentEmail = $_SESSION['email'];

 $sql = "UPDATE user SET email= '$email' WHERE email= '$currentEmail'";

 if ($conn->query($sql) === TRUE) {
   header("Location: logout.php");
 die();
 } else {
     echo "Error deleting record: " . $conn->error;
 }

 $conn->close();
 ?>
