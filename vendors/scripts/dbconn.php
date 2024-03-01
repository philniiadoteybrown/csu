<?php
//session_start();
$servername="localhost";
$username="root";  
$password="";
$database="csu_db";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
else{
   // echo "Connection Successful";
}
?>