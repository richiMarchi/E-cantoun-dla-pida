<?php
require("secStart.php");
$_SESSION['comunicazione'] = $_POST['testo'];
header('location: ../consegna.php');
 ?>
