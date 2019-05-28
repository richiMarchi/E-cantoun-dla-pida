<?php
//fetch.php;
include 'php/dbconnection.php';
include 'php/functions.php';
sec_session_start();
if(isset($_POST["view"]))
{

 if($_POST["view"] != '')
 {
   $stmt = $mysqli->prepare("UPDATE confermaordine SET status=1 WHERE status=0 AND email = ?");
   $stmt->bind_param('s', $_SESSION['email']);
   $stmt->execute();
  }
 $stmt = $mysqli->prepare("SELECT messaggio FROM confermaordine WHERE email = ? ORDER BY id DESC LIMIT 5");
 $stmt->bind_param('s', $_SESSION['email']);
 $stmt->execute();
 $stmt->store_result();
 $stmt->bind_result($messaggio);
 $output = '';

 if($stmt->num_rows > 0)
 {
  while($stmt->fetch())
  {
   $output .= '
   <li>
    <a href="#" class="dropdown-item">'.$messaggio.'<br />
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }

 $stmt1 = $mysqli->prepare("SELECT * FROM confermaordine WHERE email = ? AND status=0");
 $stmt1->bind_param('s', $_SESSION['email']);
 $stmt1->execute();
 $stmt1->store_result();
 $count = $stmt1->num_rows;
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
