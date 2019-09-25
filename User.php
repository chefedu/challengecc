<?php
session_start();
include 'connection.php';
$em = $_SESSION['email'];
$namel = $_SESSION['firstname'].$_SESSION['midname']." ".$_SESSION['lastname'];
$id = $_SESSION['regno'];

//varDB conn
$conn = new mysqli($servername, $username, $password, $dbname);
//check if conn->sucess
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if(is_dir($target_dir))
  {
  echo ("");
  }
else
  {
    mkdir("$target_dir");
  }

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
        $info = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } 
    else 
    {
        $infoerr="Not upload this file please try again";
    }
  $stmt = $conn->prepare("INSERT INTO login (id, user_id, password, name, data, email) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss",$id, $dex_u, $dex, $namel, $img, $email);
  $id = $_SESSION['regno'];
  $name = $_POST['username'];
  $dex_u = sha1("$name");
  $pass = $_POST["password"];
  $dex = sha1("$pass");
  $namel = $_SESSION['firstname'].$_SESSION['midname']." ".$_SESSION['lastname'];
  $img = $_FILES["fileToUpload"]["name"];
  $email = $_SESSION['email'];
  $stmt->execute();
   echo "<script>alert('New records created successfully');</script>";  
  
  $stmt->close();
  $conn->close();
   header('location:internet.php');
}
?>

<!Doctype html>
<html>
<head>
<title>Login</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link href="css/mob.css" rel="stylesheet">
<style >
  meter {
  /* Reset the default appearance */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;

  margin: 0 auto 1em;
  width: 100%;
  height: 0.5em;

  /* Applicable only to Firefox */
  background: none;
  background-color: rgba(0, 0, 0, 0.1);
}

meter::-webkit-meter-bar {
  background: none;
  background-color: rgba(0, 0, 0, 0.1);
}
/* Webkit based browsers */
meter[value="1"]::-webkit-meter-optimum-value { background: red; }
meter[value="2"]::-webkit-meter-optimum-value { background: yellow; }
meter[value="3"]::-webkit-meter-optimum-value { background: orange; }
meter[value="4"]::-webkit-meter-optimum-value { background: green; }

/* Gecko based browsers */
meter[value="1"]::-moz-meter-bar { background: red; }
meter[value="2"]::-moz-meter-bar { background: yellow; }
meter[value="3"]::-moz-meter-bar { background: orange; }
meter[value="4"]::-moz-meter-bar { background: green; }
</style>
</head>
<body class="body1">
<div id="is">
<label class="up" id="is">upload</label>
    </div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
<div class ="padd">
<div type="button" class="slider" onclick="varl()" ></div>
<div class="mid">
<table class="mid" id="l">
    <th><td size="100px" center><?php echo"Welcome " .$namel?><td><th>
    <tr>
             <td><label>Username</label></td>
             <td><input type="text" value="<?php echo $namel ?>" name="username"></td>
    </tr>
    <tr>
             <td><label>Password</label></td>
             <td><input type="password" name="password" id="password"> </td>

    </tr>
    <tr>
            <td><p id="password-strength-text"></p></td>
            <td><input type="Submit" value="Submit " class="btn bt"><td>
             
     </tr>
</table>
</div>
<div  id="lf" >
      <label class="pu" id="ps">
       <meter max="4" id="password-strength-meter"></meter> 
       Create Account</label>
       
    </div>
<div class="name "id="ls">
<div class="div1">

<div class="upload-btn-wrapper">
  <button class="btn1"></button>
  <input type="file" id="fileToUpload" name="fileToUpload" />

</div>
<div class="text">
<label>image</label>
</div>
  </div>
  <div class="div1">
  </div>
  <div class="div1">
  </div>
  <div class="div2">
  </div>
  
</div>
</div>


</form>
<script src="js/zxcvbn.js"></script>
<script src="js/cal.js"></script>
<script>
function varl()
{
document.getElementById("ls").style.transition = "all 2s cubic-bezier(.09,1.48,1,-0.32) 0s";
document.getElementById("ls").style.transform = "translateX(110%)";
document.getElementById("l").style.transition = "2s";
document.getElementById("l").style.display ="inline-table";
document.getElementById("lf").style.transform = "translateX(80%)";
document.getElementById("lf").style.transition = "2s";
document.getElementById("is").style.transition="2s";
document.getElementById("is").style.transform= "translateX(-10%)";
document.getElementById("ps").style.display="flex";
}
</script>
</body>
</html>
