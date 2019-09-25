<?php
session_start();	
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chefedu";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
//check
$user = test_input($_POST["user"]);
$dex = sha1("$user");
$password = test_input($_POST["pass"]);
$dex_p=sha1("$password");
//check
$sql = "SELECT * FROM login WHERE user_id = '$dex' AND password = '$dex_p'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
$row = $result->fetch_array( );
$b = $row['name'];
$_SESSION['name']=$b;
$a = $row['id'];
$_SESSION["reg"] = $a;
header('Location:Index.php');
}
else
{
	header('Location:loginuser.html');
}
$conn->close();

}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>