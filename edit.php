   <?php
//update form
include 'connection.php';
session_start();
if(isset($_SESSION['reg']))
{
if(isset($_REQUEST['enroll']))
{
include 'connection.php';
//varDB conn
$conn = new mysqli($servername, $username, $password,$dbname);
//check if conn->sucess
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$regno = $_SESSION['reg'];
$firstname = $_POST["firstname"];
$midname = $_POST["midname"];
$lastname = $_POST["lastname"];
$address = $_POST["address"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$placeofbirth = $_POST["placeofbirth"];
$nationality = $_POST["nationality"];
$age = $_POST["age"];
$lastexam = $_POST["lastexam"];
$lastyear = $_POST["lastyear"];
$attempt = $_POST["attempt"];
$examqulify = $_POST["examqulify"];
$email = $_POST["email"];
$mothertong = $_POST["mothertong"];
$course = $_POST["course"];
$subject = $_POST["subject"];
$zoner = $_POST["zoner"];
$phone = $_POST["phone"];
$fname = $_POST["fname"];
$fathersoccupation = $_POST["fathersoccupation"];
$mname = $_POST["mname"];
$motheroccupation = $_POST["motheroccupation"];
$fphone = $_POST["fphone"];
$mphone = $_POST["mphone"];
$ophone = $_POST["ophone"];
$name = $firstname.$midname." ".$lastname;
$E = "Enrollment:- ".$regno;
//update// statement
 $sql= "update student join login on(student.regno = login.id)set student.firstname='$firstname',student.midname='$midname',student.lastname='$lastname',student.address='$address', student.gender='$gender',student.dob='$dob',student.placeofbirth='$placeofbirth',student.nationality='$nationality',student.cage='$age',student.lastexam='$lastexam',student.lastyear='$lastyear',student.attempt='$attempt',student.examqulify='$examqulify',student.email='$email',student.mothertong='$mothertong',student.course='$course',student.subject='$subject',student.zoner='$zoner',student.phone='$phone',student.fname='$fname',student.fathersoccupation='$fathersoccupation',student.mname='$mname',student.motheroccupation='$motheroccupation',student.fphone='$fphone',student.mphone='$mphone',student.ophone='$ophone',login.name='$name',login.email='$email' WHERE regno ='$regno'";
$connv=$conn->query($sql);
 if ($connv === TRUE) {
   $alert = "Record updated successfully";
   
} else {
    echo "Error updating record: " . $conn->error;
}
}
elseif(isset($_SESSION['reg']))
{ 	
 //Show Data in form
include 'connection.php';
//varDB conn
$conn = new mysqli($servername, $username, $password,$dbname);
//check if conn->sucess
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
else
{	
 $regno = $_SESSION['reg'];

$sql = "SELECT * FROM student LEFT OUTER JOIN login ON student.regno = login.id WHERE regno='$regno'";
$result = $conn->query($sql);
if( $result->num_rows > 0)
{
$row = $result->fetch_array( );
$name = $row['name'];

$Enoroll=$row['regno'];
$firstname= $row['firstname'];
$midname= $row['midname'];
$lastname= $row['lastname'];
$address = $row['address'];
$gender= $row['gender'];
$dob= $row['dob'];
$placeofbirth= $row['placeofbirth'];
$nationality= $row['nationality'];
$age= $row['cage'];
$lastexam= $row['lastexam'];
$lastyear= $row['lastyear'];
$attempt= $row['attempt'];
$examqulify= $row['examqulify'];
$email= $row['email'];
$mothertong= $row['mothertong'];
$course= $row['course'];
$subject= $row['subject'];
$zoner= $row['zoner'];
$phone= $row['phone'];
$fname= $row['fname'];
$fathersoccupation= $row['fathersoccupation'];
$mname= $row['mname'];
$motheroccupation= $row['motheroccupation'];
$fphone= $row['fphone'];
$mphone= $row['mphone'];
$ophone=$row['ophone'];
$user_id= $row['user_id'];
$data= $row['data'];
$E = "Enrollment:- ".$Enoroll;
$img = "uploads/".$row['data'];
}
}
}

/*$str = $firstname;
$len = strlen($str);
$data = str_split($str);
$f = $data[0];*/
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Details</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="stylesheet" href="css/outer.css">
	
	<link rel="stylesheet" href="css/language.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css'>
	<style>
	
     .radio-toolbar {
	   	 
       display:flex;
     }
     .radio-toolbar input[type="radio"] {
       display: none;
     }
     .radio-toolbar label {   
       background-color: #ddd;
       padding: 10px 10px;
       font-family: sans-serif, Arial;
       font-size: 16px;
       border: 2px solid #444;
       border-radius: 4px;
       color:  black;
	   margin-bottom: 0;
	   transition: cubic-bezier,cubic-bezier(.6,-0.28,0,1.89),2s;
     }
	 .radio-toolbar label:hover {
	 background-color: #44a8cc;
	 }
	 .radio-toolbar input[type="radio"]:focus + label {
     border: 7px 
	 }
	 .radio-toolbar input[type="radio"]:checked + label {
     background-color: #4d79ae;
     border-color: #44a8cc;
	 
	 }
	
	</style>
  </head>
  <!--nav bar-->
  
  <body>
  	<!-- body code goes here -->
<!-- form Build-->
 
	  <div class=" jumbotron jumbotron-fluid text-center">
	<div class="aldv2" >
	
	</div>
	  <div class="scale">
	    <div class="leftrow">
  <a class="button_toggle btn-outline-light  btngrn radius fas fa-backspace" href="logdetail.php"></a>
  <a class="button_toggle btn-outline-light  btngrn radius fas fa-sign-out-alt" href="logout.php" ></a>
  <button class="button_toggle btn-outline-light  btngrn radius fas fa-image"></button>
  <button class="button_toggle btn-outline-light  btngrn radius fas fa-info-circle"></button>
   
  <input type="hidden" value="<?php echo $E;?>" class="enroll">
  <div class="flip-button" >
  <div class="flip-button-inner" >
    <div class="flip-button-front" >
      
  <?php echo"<img src = '$img' class='icon' alt='upload'>"; ?>
  
    </div>
    <div class="flip-button-back">
      <button class="button_anim fas radius btngrn fas">
  <span id = "Account"></span>
  </button>
    </div>
  </div>
</div>
  </div>
  </div>
	 
<div class="left"><span class = "alt"></span ><span id = "en"></span></div>

	  <header>
         <h1 class="display-4" >Update Details/Correction</h1>
      </header>
	  
	 
	
		<hr class="my-1">
		
		<tr> <h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Applicants of this course</h4></tr>
		<hr class="my-1">
		<div class="col-12 form-group">
		<div class= "container">
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Name:</span>
		</div>
		<input type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" class="firstname form-control form-control-sm">	
		<input  type="text" name="midname" placeholder="Midname" value="<?php echo $midname;?>" class="midname form-control form-control-sm" >	
		<input type="text" name="lastname" placeholder="Lastname" value="<?php echo $lastname;?>" class="lastname form-control form-control-sm" >
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Address:</span>
		</div>
		<input type="text" value="<?php echo $address; ?>" name="address" placeholder="Address" class="address form-control form-control-sm" >
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Gender:</span>
		</div>
		
        <div class="radio-toolbar">
		<input type="radio" id="radioMale" name="gender" value="Male" <?php if(isset($gender)) { if($gender=="Male"){   echo "checked ";}}?>>
		<label for="radioMale">Male</label>
		<input type="radio" id="radioFemale" name="gender" value="Female" <?php if(isset($gender)) { if($gender=="Female"){   echo "checked ";}}?>>
		<label for="radioFemale">Female</label>
		</div>
		
		
		<div class="input-group-prepend">
			<span class="input-group-text">Date of Birth:</span>
		</div>
		<input type="date" value="<?php echo $dob;?>" id="y-date" onchange="myFunction()" class="dob form-control form-control-sm" name = "dob">
		<div class="input-group-prepend">
			<span class="input-group-text"> Age:</span>
		</div>
		<input type="text" id="age" class="age form-control form-control-sm" name="age" placeholder="Age" value="<?php echo $age;?>">
		<label id ="ageli" class=" "></label>
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Place of Birth:</span>
		</div>
		<input type="text" name = "placeofbirth" placeholder="Place" value="<?php echo $placeofbirth;?>" class="placeofbirth form-control form-control-sm">
		
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Nationality:</span>
		</div>
		<input type="text" name = "nationality" placeholder="Nationality"value="<?php echo $nationality;?>" class = "nationality form-control form-control-sm">
		</div>
		
		</div>
		</div>
	<h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Details of Applicants</h4>
	<hr class="my-1">
	<div class="col-12 form-group">
		<div class= "container">
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Last Qualifying Exam:</span>
		</div>
		<input type="text" name="lastexam" placeholder="LastExam" value="<?php echo $lastexam;?>" class="lastexam form-control form-control-sm" >
		
		<div class="input-group-prepend">
			<span class="input-group-text">Year Of Passing:</span>
		</div>
		<input type="date" name="lastyear" placeholder="Last Year" value="<?php echo $lastyear;?>" class="lastyear form-control form-control-sm" >
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Nos Of Attempts:</span>
		</div>
		<input type="text" name="attempt" placeholder="How Much Attempt" value="<?php echo $attempt;?>" class="attempt form-control form-control-sm" >
		<div class="input-group-prepend">
			<span class="input-group-text">Qualifying Exam:</span>
		</div>
		<select name = "examqulify" class= "examqulify form-control">
			<option selected hidden > Select Exam Any </option>
			<option value="IIT-JEE" <?php if(isset($examqulify)) { if($examqulify=="IIT-JEE"){   echo "selected ";}}?>>IIT-JEE</option>
			<option value="CAT"<?php if(isset($examqulify)) { if($examqulify=="CAT"){   echo "selected ";}}?>>CAT</option>
			<option value="Other"<?php if(isset($examqulify)) { if($examqulify=="Other"){   echo "selected ";}}?>>Others</option>
		</select>
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Email:</span>
		</div>
		<input type="email" name="email" placeholder="example@email.com" class="email form-control form-control-sm" id="Eval" onchange="validateEmail()" value = "<?php echo $email;?>" >
		<span id ="evar"></span>
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Religion Language:</span>
		</div>
		<select name="mothertong" class="mothertong form-control" >
				<option selected hidden> Select language</option>
				<option value="English" lang="en"<?php if(isset($mothertong)) { if($mothertong=="English"){   echo "selected ";}}?> >English</option>
				<option value="Hind"<?php if(isset($mothertong)) { if($mothertong=="Hind"){   echo "selected ";}}?>>Hind</option>
				<option value="Bengal"<?php if(isset($mothertong)) { if($mothertong=="Bengal"){   echo "selected ";}}?>>Bengali</option>
				<option value="Assamese"<?php if(isset($mothertong)) { if($mothertong=="Assamese"){   echo "selected ";}}?>>Assamese</option>
				<option value="Gujarati"<?php if(isset($mothertong)) { if($mothertong=="Gujarati"){   echo "selected ";}}?>>Gujarati</option>
				<option value="Tamil"<?php if(isset($mothertong)) { if($mothertong=="Tamil"){   echo "selected ";}}?>>Tamil</option>
				<option value="Telugu"<?php if(isset($mothertong)) { if($mothertong=="Telugu"){   echo "selected ";}}?>>Telugu</option>
				<option value="Urdu"<?php if(isset($mothertong)) { if($mothertong=="Urdu"){   echo "selected ";}}?>>Urdu</option>
				<option value="Nepali"<?php if(isset($mothertong)) { if($mothertong=="Nepali"){   echo "selected ";}}?>>Nepali</option>
				<option value="Odia"<?php if(isset($mothertong)) { if($mothertong=="Odia"){   echo "selected ";}}?>>Odia</option>
				<option value="Santali"<?php if(isset($mothertong)) { if($mothertong=="Santali"){   echo "selected ";}}?>>Santali</option>
				<option value="Sanskrit"<?php if(isset($mothertong)) { if($mothertong=="Sanskrit"){   echo "selected ";}}?>>Sanskrit</option>
				<option value="Meitei"<?php if(isset($mothertong)) { if($mothertong=="Meitei"){   echo "selected ";}}?>>Meitei</option>
				<option value="Marathi"<?php if(isset($mothertong)) { if($mothertong=="Marathi"){   echo "selected ";}}?>>Marathi</option>
				<option value="Malayalam"<?php if(isset($mothertong)) { if($mothertong=="Malayalam"){   echo "selected ";}}?>>Malayalam</option>
				<option value="Maithili"<?php if(isset($mothertong)) { if($mothertong=="Maithili"){   echo "selected ";}}?>>Maithili</option>
				<option value="Konkani"<?php if(isset($mothertong)) { if($mothertong=="Konkani"){   echo "selected ";}}?>>Konkani</option>
				<option value="Kashmiri"<?php if(isset($mothertong)) { if($mothertong=="Kashmiri"){   echo "selected ";}}?>>Kashmiri</option>
				<option value="Kannada"<?php if(isset($mothertong)) { if($mothertong=="Kannada"){   echo "selected ";}}?>>Kannada</option>
				<option value="Dogri"<?php if(isset($mothertong)) { if($mothertong=="Dogri"){   echo "selected ";}}?>>Dogri</option>
				<option value="Bodo"<?php if(isset($mothertong)) { if($mothertong=="Bodo"){   echo "selected ";}}?>>Bodo</option>
				<option value="Angika"<?php if(isset($mothertong)) { if($mothertong=="Angika"){   echo "selected ";}}?>>Angika</option>
                <option value="Banjara"<?php if(isset($mothertong)) { if($mothertong=="Banjara"){   echo "selected ";}}?>>Banjara</option>
                <option value="Bajjika"<?php if(isset($mothertong)) { if($mothertong=="Bajjika"){   echo "selected ";}}?>>Bajjika</option>
                <option value="Bishnupriya"<?php if(isset($mothertong)) { if($mothertong=="Bishnupriya"){   echo "selected ";}}?>>Bishnupriya</option>
                <option value="Bhojpuri"<?php if(isset($mothertong)) { if($mothertong=="Bhojpuri"){   echo "selected ";}}?>>Bhojpuri</option>
                <option value="Ladakhi"<?php if(isset($mothertong)) { if($mothertong=="Ladakhi"){   echo "selected ";}}?>>Ladakhi</option>
                <option value="Bhotia"<?php if(isset($mothertong)) { if($mothertong=="Bhotia"){   echo "selected ";}}?>>Bhotia</option>
                <option value="Bundelkhandi"<?php if(isset($mothertong)) { if($mothertong=="Bundelkhandi"){   echo "selected ";}}?>>Bundelkhandi</option>
                <option value="Chhattisgarhi"<?php if(isset($mothertong)) { if($mothertong=="Chhattisgarhi"){   echo "selected ";}}?>>Chhattisgarhi</option>
                <option value="Dhatki"<?php if(isset($mothertong)) { if($mothertong=="Dhatki"){   echo "selected ";}}?>>Dhatki</option>
                <option value="Indian English"<?php if(isset($mothertong)) { if($mothertong=="Indian English"){   echo "selected ";}}?>>Indian English</option>
                <option value="Indian French"<?php if(isset($mothertong)) { if($mothertong=="Indian French"){   echo "selected ";}}?>>Indian French</option>
                <option value="Garhwali (Pahari)"<?php if(isset($mothertong)) { if($mothertong=="Garhwali (Pahari)"){   echo "selected ";}}?>>Garhwali (Pahari)</option>
                <option value="Garo"<?php if(isset($mothertong)) { if($mothertong=="Garo"){   echo "selected ";}}?>>Garo</option>
                <option value="Gondi"<?php if(isset($mothertong)) { if($mothertong=="Gondi"){   echo "selected ";}}?>>Gondi</option>
                <option value="Gujjar/Gujjari"<?php if(isset($mothertong)) { if($mothertong=="Gujjar/Gujjari"){   echo "selected ";}}?>>Gujjar/Gujjari</option>
                <option value="Haryanvi"<?php if(isset($mothertong)) { if($mothertong=="Haryanvi"){   echo "selected ";}}?>>Haryanvi</option>
                <option value="Ho"<?php if(isset($mothertong)) { if($mothertong=="Ho"){   echo "selected ";}}?>>Ho</option>
                <option value="Kachachhi"<?php if(isset($mothertong)) { if($mothertong=="Kachachhi"){   echo "selected ";}}?>>Kachachhi</option>
                <option value="Kamtapuri"<?php if(isset($mothertong)) { if($mothertong=="Kamtapuri"){   echo "selected ";}}?>>Kamtapuri</option>
                <option value="Karbi"<?php if(isset($mothertong)) { if($mothertong=="Karbi"){   echo "selected ";}}?>>Karbi</option>
                <option value="Khasi"<?php if(isset($mothertong)) { if($mothertong=="Khasi"){   echo "selected ";}}?>>Khasi</option>
                <option value="Kodava (Coorgi)"<?php if(isset($mothertong)) { if($mothertong=="Kodava (Coorgi)"){   echo "selected ";}}?>>Kodava (Coorgi)</option>
                <option value="Kokborok"<?php if(isset($mothertong)) { if($mothertong=="Kokborok"){   echo "selected ";}}?>>Kokborok</option>
                <option value="Kumaoni (Pahari)"<?php if(isset($mothertong)) { if($mothertong=="Kumaoni (Pahari)"){   echo "selected ";}}?>>Kumaoni (Pahari)</option>
                <option value="Kurak"<?php if(isset($mothertong)) { if($mothertong=="Kurak"){   echo "selected ";}}?>>Kurak</option>
                <option value="Kurmali"<?php if(isset($mothertong)) { if($mothertong=="Kurmali"){   echo "selected ";}}?>>Kurmali</option>
                <option value="Lepcha"<?php if(isset($mothertong)) { if($mothertong=="Lepcha"){   echo "selected ";}}?>>Lepcha</option>
                <option value="Limbu"<?php if(isset($mothertong)) { if($mothertong=="Limbu"){   echo "selected ";}}?>>Limbu</option>
                <option value="Magahi"<?php if(isset($mothertong)) { if($mothertong=="Magahi"){   echo "selected ";}}?>>Magahi</option>
                <option value="Mizo (Lushai)"<?php if(isset($mothertong)) { if($mothertong=="Mizo (Lushai)"){   echo "selected ";}}?>>Mizo (Lushai)</option>
                <option value="Mundari"<?php if(isset($mothertong)) { if($mothertong=="Mundari"){   echo "selected ";}}?>>Mundari</option>
                <option value="Nagpuri"<?php if(isset($mothertong)) { if($mothertong=="Nagpuri"){   echo "selected ";}}?>>Nagpuri</option>
                <option value="Nicobarese"<?php if(isset($mothertong)) { if($mothertong=="Nicobarese"){   echo "selected ";}}?>>Nicobarese</option>
                <option value="Himachali"<?php if(isset($mothertong)) { if($mothertong=="Himachali"){   echo "selected ";}}?>>Himachali</option>
                <option value="Pali"<?php if(isset($mothertong)) { if($mothertong=="Pali"){   echo "selected ";}}?>>Pali</option>
                <option value="Rajasthani"<?php if(isset($mothertong)) { if($mothertong=="Rajasthani"){   echo "selected ";}}?>>Rajasthani</option>
                <option value="Sambalpuri/Kosali"<?php if(isset($mothertong)) { if($mothertong=="Sambalpuri/Kosali"){   echo "selected ";}}?>>Sambalpuri/Kosali</option>
                <option value="Shaurseni(Prakrit)"<?php if(isset($mothertong)) { if($mothertong=="Shaurseni(Prakrit)"){   echo "selected ";}}?>>Shaurseni(Prakrit)</option>
                <option value="Siraiki"<?php if(isset($mothertong)) { if($mothertong=="Siraiki"){   echo "selected ";}}?>>Siraiki</option>
                <option value="Tenyidi"<?php if(isset($mothertong)) { if($mothertong=="Tenyidi"){   echo "selected ";}}?>>Tenyidi</option>
                <option value="Tulu"<?php if(isset($mothertong)) { if($mothertong=="Tulu"){   echo "selected ";}}?>>Tulu</option>
				</select>
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">About Course:</span>
		</div>
		<input type="text" name="course" value = "<?php echo $course;?>" placeholder="Course" class ="course form-control form-control-sm">
		<input type="text" name="subject" value = "<?php echo $subject;?>" placeholder="Subject" class="subject form-control form-control-sm">
		<span id ="evar"></span>
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Zoner:</span>
		</div>
		<select name = "zoner" class="zoner form-control" >
				<option selected hidden> Select Zoner provences</option>
				<option value="North Eastern"<?php if(isset($zoner)) { if($zoner=="North Eastern"){   echo "selected ";}}?>>North Eastern</option>
				<option value="Eastern"<?php if(isset($zoner)) { if($zoner=="Eastern"){   echo "selected ";}}?>>Eastern</option>
				<option value="Southern"<?php if(isset($zoner)) { if($zoner=="Southern"){   echo "selected ";}}?>>Southern</option>
				<option value="Western"<?php if(isset($zoner)) { if($zoner=="Western"){   echo "selected ";}}?>>Western</option>
				<option value="Central"<?php if(isset($zoner)) { if($zoner=="Central"){   echo "selected ";}}?>>Central</option>
				<option value="Northern"<?php if(isset($zoner)) { if($zoner=="Northern"){   echo "selected ";}}?>>Northern</option>
				<option value="Other"<?php if(isset($zoner)) { if($zoner=="Other"){   echo "selected ";}}?>>Other</option>
				<option value="Null">-</option>
				</select>
		
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Phone Number:</span>
		</div>
		<input type="text" name="phone" value = "<?php echo $phone;?>" class="phone form-control form-control-sm" placeholder = "+91----------" id="input" onchange="validateMobile()">
		<span id ="d1"></span>
		
		</div>
		</div>
		</div>
	<h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Details of Family</h4>
	<hr class="my-1">
	<div class="col-12 form-group">
		<div class= "container">
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Father Name:</span>
		</div>
		<input type="text" name="fname" value = "<?php echo $fname;?>" class="fname form-control form-control-sm" placeholder="Father Name" >
		</div>
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Father Occupation:</span>
		</div>
		<input type="text" name="fathersoccupation" value = "<?php echo $fathersoccupation;?>" class="fathersoccupation form-control form-control-sm" placeholder="Occupation" >
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Mother Name:</span>
		</div>
		<input type="text" name="mname" value = "<?php echo $mname;?>" placeholder="Mother Name" class="mname form-control form-control-sm" >
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Mother Occupation:</span>
		</div>
		<input type="text" name="motheroccupation" value = "<?php echo $motheroccupation;?>" class="motheroccupation form-control form-control-sm" placeholder="Occupation" >
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Father Phone Number:</span>
		</div>
		<input type="text" name="fphone" value = "<?php echo $fphone;?>" placeholder="+91----------"  class="fphone form-control form-control-sm" >
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Mother Phone Number:</span>
		</div>
		<input type="text" name="mphone" value = "<?php echo $mphone;?>" placeholder="+91----------"  class= "mphone form-control form-control-sm"  >
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text">Other Phone Number:</span>
		</div>
		<input type="text" name="ophone" value = "<?php echo $ophone;?>" placeholder="+91----------"  class="ophone form-control form-control-sm" >
	</div>
	</div>
	</div>
	<input type="Submit" class="button btn-outline-light btn-block btngrn status"value="Submit">
	<div class="aldv">
	<p id="val" >Ever Fill Area Require</p>
	</div>
	
    </div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/cal.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.0.0.js"></script>
	 <script>
  $(document).ready(function(){
	  var firstname = $(".firstname").val();
	  var res = firstname.slice(0, 1);
      document.getElementById("Account").innerHTML = res;
	  var roll =$(".enroll"). val();
	  document.getElementById("en").innerHTML=roll;
  $(".status").click(function(){
	     var enroll =$(".enroll"). val();
		 var firstname = $(".firstname").val();
		 var midname = $(".midname").val();
		 var lastname = $(".lastname").val();
		 var address =$(".address").val();
		 var gender =$("input[name=gender]:checked").val();
		 var dob =$(".dob").val();
		 var placeofbirth =$(".placeofbirth").val();
		 var nationality =$(".nationality").val();
		 var age =$(".age").val();
		 var lastexam =$(".lastexam").val();
		 var lastyear =$(".lastyear").val();
		 var attempt =$(".attempt").val();
		 var examqulify =$(".examqulify").val();
		 var email =$(".email").val();
		 var mothertong =$(".mothertong").val();
		 var course =$(".course").val();
		 var subject =$(".subject").val();
		 var zoner =$(".zoner").val();
		 var phone =$(".phone").val();
		 var fname =$(".fname").val();
		 var fathersoccupation =$(".fathersoccupation").val();
		 var mname = $(".mname").val();
		 var motheroccupation = $(".motheroccupation").val();
		 var fphone =$(".fphone").val();
		 var mphone =$(".mphone").val();
		 var ophone =$(".ophone").val();
		 console.log(gender);
		 if(firstname==''||lastname==''||email==''||dob==''||phone=='')
		 {
			 alert("Error to Send");
		 }
		 else{
			  $.ajax({
                         type: "POST",
                         url: "edit.php",
                         data: {enroll:enroll,
						 firstname:firstname,
						 midname:midname,
						 lastname:lastname,
						 address:address,
						 gender:gender,
						 dob:dob,
						 placeofbirth:placeofbirth,
						 nationality:nationality,
						 age:age,
						 lastexam:lastexam,
						 lastyear:lastyear,
						 attempt:attempt,
						 examqulify:examqulify,
						 email:email,
						 mothertong:mothertong,
						 course:course,
						 subject:subject,
						 zoner:zoner,
						 phone:phone,
						 fname:fname,
						 fathersoccupation:fathersoccupation,
						 mname:mname,
						 motheroccupation:motheroccupation,
						 fphone:fphone,
						 mphone:mphone,
						 ophone:ophone},
                         cache: false,
                         success: function(html)
					   {
						   if(html=true)
						   {    
					             
                                 alert("Save Sucessfull");
								 var firstname = $(".firstname").val();
	                             var res = firstname.slice(0, 1);
                                 document.getElementById("Account").innerHTML = res;
								 var roll =$(".enroll"). val();
	                             document.getElementById("en").innerHTML=roll;
						   }
						   else{
							   alert("Error to Send");
						   }
                       }
		 });}
	  });
  });

</script>
</body>
</html>

<?php
}
else
{
	header('location:loginuser.html');
}
?>