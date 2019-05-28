<?php
  require("secStart.php");
if (isset($_POST['indirizzo']) && $_POST['indirizzo']!="") {
  require("dbconnection.php");
  $sql = "INSERT INTO indirizzo (email, indirizzo) VALUES ('".$_SESSION['email'] ."', '".$_POST['indirizzo']."')";
  $conn->query($sql);
  header('location: ../consegna.php');
}else if(isset($_POST['luogo'])){
  $oggi = strtotime("+29 minutes");
  $dataScadenza = strtotime("12-02-2016 22:42:00");
  $data = strtotime(substr($_POST['mydatetime'],8,2) . substr($_POST['mydatetime'],4,4) . substr($_POST['mydatetime'],0,4) . " " .
   substr($_POST['mydatetime'],11,2) . ":". substr($_POST['mydatetime'],14,2) . ":00" );
   echo var_dump($data);
   echo var_dump($oggi);
  if($oggi>$data){
    header('location: ../consegna.php?error=date');
  } else {
    $_SESSION['indirizzo']=$_POST['luogo'];
    $_SESSION['orario']=$_POST['mydatetime'];
    header('location: ../pagamento.php');
  }
}else {
  header('location: ../consegna.php?error=address');
}
 ?>
