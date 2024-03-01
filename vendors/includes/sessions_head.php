<?php
session_start();
if(empty($_SESSION['user']))
{
  header('location:login.php');
}
$user=$_SESSION['user'];

if((time()-$_SESSION['active_time'])>900) 
{
  /*include 'vendors/scripts/dbconn.php';
  $login="UPDATE ws_users SET online='0' WHERE username='".$_SESSION['Staff_ID']."'";
      $check_result=mysqli_query($conn, $login);
      $_SESSION['pre_page']=basename($_SERVER['REQUEST_URI']);*/
  header('location:index.php');
}
$_SESSION['active_time']=time();

//$conn->close();
?>