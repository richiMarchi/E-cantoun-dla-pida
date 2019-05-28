
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
 $act= $_POST["act"];
 $new= $_POST["new"];
 $new2= $_POST["new2"];
 $currentEmail = $_SESSION['email'];

 $act= hash('sha512', $act);


 $sql = "SELECT salt, password FROM user where email='$currentEmail'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
   $salt= $row["salt"];
   $pwd= $row["password"];
 }
 }
 $check = hash('sha512', $act.$salt);
 if($check != $pwd){
   echo "$act \n";
   echo "$salt \n";
   echo "$check \n";
   echo "$pwd \n";
   echo "sbagliato";
   header('Location: ../home.php?error=');

 }
 else{
   if($new != $new2){
     header('Location: ../home.php?error2=');
   }
    else{
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $new= hash('sha512', $new);
        $new = hash('sha512', $new.$random_salt);
        $sql = "UPDATE user SET password= '$new', salt= '$random_salt' WHERE email= '$currentEmail'";
        if ($conn->query($sql) === TRUE) {
          header("Location: logout.php");
        die();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

 }

 $conn->close();
 ?>
