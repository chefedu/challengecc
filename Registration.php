<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chefedu";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
$stmt = $conn->prepare("INSERT INTO student (regno, firstname, midname, lastname, address, gender, dob, placeofbirth, nationality, cage, lastexam, lastyear, attempt, examqulify, email, mothertong, course, subject, zoner, phone, fname, fathersoccupation, mname, motheroccupation, fphone, mphone, ophone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssssssssssssssssss",$id, $firstName, $midname, $lastname, $address, $gender, $dob, $placeofbirth, $nationality, $age, $lastexam, $lastyear, $attempt, $examqulify, $email, $mothertong, $course, $subject, $zoner, $phone, $fname, $fathersoccupation, $mname, $motheroccupation, $fphone, $mphone, $ophone);
//var form input to html parameter
$id = date("Y").date("m").date("t").date("d").time();
$firstName = test_input($_POST["firstname"]);
$midname = test_input($_POST["midname"]);
$lastname = test_input($_POST["lastname"]);
$address = test_input($_POST["address"]);
$gender = test_input($_POST["gender"]);
$dob = test_input($_POST["dob"]);
$placeofbirth = test_input($_POST["placeofbirth"]);
$nationality = test_input($_POST["nationality"]);
$age = test_input($_POST["age"]);
$lastexam = test_input($_POST["lastexam"]);
$lastyear = test_input($_POST["lastyear"]);
$attempt = test_input($_POST["attempt"]);
$examqulify = test_input($_POST["examqulify"]);
$email = test_input($_POST["email"]);
$mothertong = test_input($_POST["mothertong"]);
$course = test_input($_POST["course"]);
$subject = test_input($_POST["subject"]);
$zoner = test_input($_POST["zoner"]);
$phone = test_input($_POST["phone"]);
$fname = test_input($_POST["fname"]);
$fathersoccupation = test_input($_POST["fathersoccupation"]);
$mname = test_input($_POST["mname"]);
$motheroccupation = test_input($_POST["motheroccupation"]);
$fphone = test_input($_POST["fphone"]);
$mphone = test_input($_POST["mphone"]);
$ophone = test_input($_POST["ophone"]);
//var execute
$stmt->execute();
$_SESSION['firstname'] = $firstName;
$_SESSION['midname']= $midname;
$_SESSION['lastname']=$lastname;
$_SESSION['email']=$email;
$_SESSION['regno']=$id;
header('Location:User.php');
$stmt->close();
$conn->close();
}}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="stylesheet" href="css/outer.css">
	<link rel="stylesheet" href="css/language.css">
  </head>
  <!--nav bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Chefedu...</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="#">Registration <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="#"> Pay Through </a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Information
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">Customer care</a>
                   <a class="dropdown-item" href="#">Contact About</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="#">Complaint Statement </a>
                </div>
             </li>
             <li class="nav-item">
                <a class="nav-link disabled" href="#">About us</a>
             </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" value ="<?php
$id = date("Y").date("m").date("t").date("d").time();
echo "EN-roll_".$id;
?>" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
       </div>
  </nav>
  <body>
  	<!-- body code goes here -->
<!-- form Build-->
	  <div class=" jumbotron jumbotron-fluid text-center">
	  <header>
<h1 class="display-4" >Form of Registration</h1>
</header>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<table class="pagination">
		<hr class="my-1">
		<tr> <h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Applicants of this course</h4>

		</tr>
		<hr class="my-1">
		<tr>
			<td align= "justify"> Name: </td>
			<td align= "justify">
			<input class="input" type="text" name="firstname" placeholder="Firstname" required>
			<td align= "justify">
			<input class="input" type="text" name="midname" placeholder="Midname" required>
			</td>
			<td align= "justify">
			<input class="input" type="text" name="lastname" placeholder="Lastname" required>
			</td>
			</td>
		
		</tr>
		<tr>
			<td align="justify">Address: </td>
			<td align= "justify"><input type="text" name="address" placeholder="Address" required></td>
		</tr>
		<tr>
		<td align="justify">Gender:</td>
		<td align="justify">
			<input type="radio" name="gender" value="Male"  required>Male
			<input type="radio" name="gender" value="Female"  required>Female
		</td>
		</tr>
		<tr>
			<td align="justify">Date of Birth: </td>
			<td align= "justify"><input type="date" id="y-date" onchange="myFunction()" name = "dob">
			
            </td>
		</tr>
		<tr>
		    <td align="justify">Place of Birth: </td>
			<td align="justify"><input type="text" name = "placeofbirth" placeholder="Place" required></td>
		</tr>
		<tr>
		    <td align="justify">Nationality: </td>
			<td align="justify"><input type="text" name = "nationality" placeholder="Nationality" required></td>
		</tr>
		<tr>
		<td align="justify">Current age: </td>
		<td align="justify"><input type="text" id="age" name="age" placeholder="Age" required > </td>
		<td align="justify"><label id ="ageli"></label></td>
		</tr>
	</table>
	<h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Details of Applicants</h4>
	<hr class="my-1">
	<table class="pagination">
		<tr>
			<td align="justify"> Last Qualifying Exam: </td>
			<td align="justify"><input type="text" name="lastexam" placeholder="LastExam" required></td>
		</tr>
		<tr>
			<td align="justify"> Year Of Passing: </td>
			<td align="justify"><input type="date" name="lastyear" placeholder="Last Year" required></td>
		</tr>
		<tr>
			<td align="justify"> Nos Of Attempts: </td>
			<td align="justify"><input type="text" name="attempt" placeholder="How Much Attempt" required></td>
		</tr>
		<tr>
			<td align="justify"> Qualifying Exam: </td>
			<td align="justify">
			<select name = "examqulify">
			<option selected hidden> Select Exam Any </option>
			<option value="IIT-JEE">IIT-JEE</option>
			<option value="CAT">CAT-exam</option>
			<option value="Other">None</option>
			</select>
			</td>
		</tr>
		<tr>
			<td align="justify">Email: </td>
			<td align="justify"><input type="email" name="email" placeholder="example@email.com" id="Eval" onchange="validateEmail()" required></td>
			<td align="justify"><span id ="evar"></span></td>
		</tr>

		<tr>
			<td align="justify">Religion Language:</td>
			<td align="justify">
				<select name="mothertong" required>
				<option selected hidden> Select language</option>
				<option value="English" lang="en">English</option>
				<option value="Hind">Hind</option>
				<option value="Bengal">Bengali</option>
				<option value="Assamese">Assamese</option>
				<option value="Gujarati">Gujarati</option>
				<option value="Tamil">Tamil</option>
				<option value="Telugu">Telugu</option>
				<option value="Urdu">Urdu</option>
				<option value="Nepali">Nepali</option>
				<option value="Odia">Odia</option>
				<option value="Santali">Santali</option>
				<option value="Sanskrit">Sanskrit</option>
				<option value="Meitei">Meitei</option>
				<option value="Marathi">Marathi</option>
				<option value="Malayalam">Malayalam</option>
				<option value="Maithili">Maithili</option>
				<option value="Konkani">Konkani</option>
				<option value="Kashmiri">Kashmiri</option>
				<option value="Kannada">Kannada</option>
				<option value="Dogri">Dogri</option>
				<option value="Bodo">Bodo</option>
				<option value="Angika">Angika</option>
                <option value="Banjara">Banjara</option>
                <option value="Bajjika">Bajjika</option>
                <option value="Bishnupriya">Bishnupriya</option>
                <option value="Bhojpuri">Bhojpuri</option>
                <option value="Ladakhi">Ladakhi</option>
                <option value="Bhotia">Bhotia</option>
                <option value="Bundelkhandi">Bundelkhandi</option>
                <option value="Chhattisgarhi">Chhattisgarhi</option>
                <option value="Dhatki">Dhatki</option>
                <option value="Indian English">Indian English</option>
                <option value="Indian French">Indian French</option>
                <option value="Garhwali (Pahari)">Garhwali (Pahari)</option>
                <option value="Garo">Garo</option>
                <option value="Gondi">Gondi</option>
                <option value="Gujjar/Gujjari">Gujjar/Gujjari</option>
                <option value="Haryanvi">Haryanvi</option>
                <option value="Ho">Ho</option>
                <option value="Kachachhi">Kachachhi</option>
                <option value="Kamtapuri">Kamtapuri</option>
                <option value="Karbi">Karbi</option>
                <option value="Khasi">Khasi</option>
                <option value="Kodava (Coorgi)">Kodava (Coorgi)</option>
                <option value="Kokborok">Kokborok</option>
                <option value="Kumaoni (Pahari)">Kumaoni (Pahari)</option>
                <option value="Kurak">Kurak</option>
                <option value="Kurmali">Kurmali</option>
                <option value="Lepcha">Lepcha</option>
                <option value="Limbu">Limbu</option>
                <option value="Magahi">Magahi</option>
                <option value="Mizo (Lushai)">Mizo (Lushai)</option>
                <option value="Mundari">Mundari</option>
                <option value="Nagpuri">Nagpuri</option>
                <option value="Nicobarese">Nicobarese</option>
                <option value="Himachali">Himachali</option>
                <option value="Pali">Pali</option>
                <option value="Rajasthani">Rajasthani</option>
                <option value="Sambalpuri/Kosali">Sambalpuri/Kosali</option>
                <option value="Shaurseni(Prakrit)">Shaurseni(Prakrit)</option>
                <option value="Siraiki">Siraiki</option>
                <option value="Tenyidi">Tenyidi</option>
                <option value="Tulu">Tulu</option>
				</select>
			</td>
		</tr>
		<tr>
		<td align="justify">About Course</td>
		<td align="justify"><input type="text" name="course" placeholder="Course" required></input></td>
		<td align="justify"><input type="text" name="subject" placeholder="Subject" required></td>
		</tr>
		<td align = "justify">Zoner:</td>
			<td align = "justify">
				<select name = "zoner" required>
				<option selected hidden> Select Zoner provences</option>
				<option value="North Eastern">North Eastern</option>
				<option value="Eastern">Eastern</option>
				<option value="Southern">Southern</option>
				<option value="Western">Western</option>
				<option value="Central">Central</option>
				<option value="Northern">Northern</option>
				<option value="Other">Other</option>
				<option value="Null">-</option>
				</select>
			</td>
		<tr>
			<td align="justify">Phone Number: </td>
			<td align="justify" ><input type="text" name="phone" placeholder = "+91----------" id="input" onchange="validateMobile()" required></td>
			<td align="justify"><span id ="d1"></span></td>
		</tr>	
	</table>
	<h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Details of Family</h4>
	<hr class="my-1">
	<table class="pagination">
		<tr>
			<td align="justify">Father Name: </td>
			<td align="justify"><input type="text" name="fname" placeholder="Father Name" required></td>
		</tr>
		<tr>
			<td align="justify">Father Occupation: </td>
			<td align="justify"><input type="text" name="fathersoccupation" placeholder="Occupation" required></td>
		</tr>
		<tr>
			<td align="justify">Mother Name: </td>
			<td align="justify"><input type="text" name="mname" placeholder="Mother Name" required></td>
		</tr>
		<tr>
			<td align="justify">Mother Occupation: </td>
			<td align="justify"><input type="text" name="motheroccupation" placeholder="Occupation" required></td>
		</tr>
		<tr>
			<td align="justify">Father Phone Number: </td>
			<td align="justify"><input type="text" name="fphone" placeholder="+91----------"   required></td>
			
			</tr>
			<tr>
			<td align="justify">Mother Phone Number: </td>
			<td align="justify"><input type="text" name="mphone" placeholder="+91----------"   required ></td>
		    </tr>
		<tr>
			<td align="justify">Other Phone Number: </td>
			<td align="justify"><input type="text" name="ophone" placeholder="+91----------"  required></td>
			
		</tr>
	</table>
	<input type="Submit" class="button btn-outline-light btn-block btngrn"value="Submit">
	
	</form>	
	
	<div class="aldv">
	<p id ="val" >Ever Fill Area Require</p>
	</div>
	<div class="logo" >
    </div>
    </div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/cal.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>