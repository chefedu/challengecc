<?php
header("location:Home.html");
require("logdetail.php");
require("edit.php");
include'connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$time_at = $dt->format('h:i A');
$date_at = $dt->format('Y-m-d');
$sql = "SELECT * FROM `login_at` WHERE `date_at` = '$date_at'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0){
  $row = $result->fetch_array( );
  $currentdate = $row['date_at'];
  $id=$row['id'];
  $reg=$row['enrole'];
  if($currentdate==$date_at)
  {

    $sql = "UPDATE `login_at` SET `status`='inactive' WHERE `login_at`.`enrole` = $reg";
    $result = $conn->query($sql);

     $sql1 = "UPDATE `login_at` SET `date_to` = '$date_at',`time_to` = '$time_at' WHERE `login_at`.`id` = $id";
    $result1 = $conn->query($sql1);
  }
  else{
  	
 $sql = "UPDATE `login_at` SET `date_to` = '$date_at',`time_to` = '$time_at' WHERE `login_at`.`id` = $id";
    $result = $conn->query($sql);
  }
}
session_destroy();
$conn->mysql_close();
?>