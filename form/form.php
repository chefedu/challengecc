<?php
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "student";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$stmt = $conn->prepare("INSERT INTO my_student (firstname, mid_name, lastname, email, password, password_check, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $firstName, $midname, $lastname, $email, $password, $password_check, $gender);
//var form input to html parameter
$firstName = test_input($_POST["first_name"]);
$midname = test_input($_POST["mid_name"]);
$lastname = test_input($_POST["last_name"]);
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);
$password_check = test_input($_POST["password_check"]);
$gender = test_input($_POST["gender"]);
//var execute
$stmt->execute();
echo "<script>alert('New records created successfully');</script>";
$stmt->close();
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