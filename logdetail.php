<?php
session_start();

if(isset($_SESSION['reg']))
{  	
   //var DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chefedu";
//varDB conn
$conn = new mysqli($servername, $username, $password,$dbname);
//check if conn->sucess
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$regno = $_SESSION['reg'];
$sql = "SELECT * FROM student LEFT OUTER JOIN login ON student.regno = login.id WHERE regno='$regno'";

$result = $conn->query($sql);
if( $result->num_rows > 0)
{
$row = $result->fetch_array( );


$name = $row['name'];
$Enoroll= $row['regno'];
$firstname= $row['firstname'];
$midname= $row['midname'];
$lastname= $row['lastname'];
$address= $row['address'];
$gender= $row['gender'];
$dob= $row['dob'];
$placeofbirth= $row['placeofbirth'];
$nationality= $row['nationality'];
$cage= $row['cage'];
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
$img = "uploads/".$row['data'];
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Detail</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="stylesheet" href="css/outer.css">
	<link rel="stylesheet" href="css/language.css">
	<link rel="stylesheet" href="css/detail.css">
  </head>
  <!--nav bar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="Index.php">Chefedu...</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="#">User Detail <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="#"> Payment Section </a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Information
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">Acadamic Score</a>
                   <a class="dropdown-item" href="#">Contact Faculty</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="mail.html">Complaint Statement </a>
                </div>
             </li>
             <li class="nav-item">
                <a class="nav-link disabled" href="#">About us</a>
             </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" value ="<?php echo "Enrollment:- ".$Enoroll;?>">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
       </div>
  </nav>
  <body>
	

  	<!-- body code goes here -->

<!-- form Build-->
	  <div class=" jumbotron jumbotron-fluid text-center">
<header>
  <h2>About Student Detail</h2>
   
</header>
<ul class="pagination justify-content-end">
  <li class="page-item"><a class="page-link" href="logout.php">logout</a></li>
</ul>
<div class="info">
  <section>
  <article>
  <table>
    <hr class="my-1">
	
		<tr class="l">
			<td align= "justify" class="l">Name: </td>
			<td align= "justify"class="l">
			<?php echo $name ;?>
			</td>
		</tr>
		<tr class="l">
			<td align="justify" class="l">Address: </td>
			<td align= "justify" class="l"><?php echo $address ;?></td>
		</tr>
		<tr class="l" >
		    <td align="justify" class="l">Gender:</td>
		    <td align="justify" class="l"><?php echo $gender; ?></td>
		</tr>
		<tr class="l">
			<td align="justify" class="l">Date of Birth: </td>
			<td align="justify" class="l"><?php echo $dob ;?></td>
            </td>
	     </tr>
		 
			<tr class="l">
		    <td align="justify" class="l">Nationality: </td>
			<td align="justify" class="l"><?php echo $nationality ;?></td>
		</tr>
		<tr class="l">
		    <td align="justify" class="l">Place of Birth: </td>
			<td align="justify" class="l"><?php echo $placeofbirth ;?></td>
		</tr>
		<tr class="l">
		    <td align="justify" class="l">Age: </td>
		    <td align="justify" class="l"><?php echo $cage ;?></td>
		</tr>
		<tr class="l">
			<td align="justify" class="l">Email Id: </td>
			<td align="justify" class="l"><?php echo $email ;?></td>
		</tr>
		<tr class="l">
			<td align="justify" class="l">Contact Number: </td>
			<td align="justify" class="l"><?php echo $phone ;?></td>
		</tr>
		</table>
  </article>

    <div class="profile">
	
	
	<?php
	echo"<img src = '$img' class='image' alt='upload'>";
	?>
	
	</div>
</section>

<div class="row bar">
      <div class="col-12 table-responsive-sm">
    <table class="table table-bordered">

		<hr class="my-1">
		<tr> <h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Detail of Applicants</h4></tr>
		<tr class="p">
			<td align="justify" class="p"> Last Qualifying Exam: </td>
			<td align="justify" class="p"><?php echo $lastexam ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p"> Year Of Passing: </td>
			<td align="justify" class="p"><?php echo $lastyear ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p"> Nos Of Attempts: </td>
			<td align="justify" class="p"> <?php echo $attempt ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p"> Qualifying Exam:</td>
			<td align="justify" class="p"><?php echo $examqulify ;?></td>
		</tr>
		
		<tr class="p">
			<td align="justify" class="p">Religion Language:</td>
			<td align="justify" class="p"><?php echo $mothertong ;?></td>
		</tr>
		<tr class="p">
		<td align="justify" class="p">About Course</td>
		<td align="justify" class="p"> <?php echo $course." in ".$subject ;?></td>
		</tr>
		<tr class="p">
		<td align = "justify" class="p">Zoner:</td>
		<td align = "justify" class="p"><?php echo $zoner ;?></td>
		</tr>
			
	</table >
      </div>
	 
      <div class="col-12 table-responsive-sm">
	  <table class="table table-bordered" >
	  <hr class="my-1">
        <h4 class="lead  my-sm-auto navbar nav-tabs bg-info badge-primary h1" colspan="100">Details of Family</h4>
	
	
		<tr class="p">
			<td align="justify" class="p">Father Name: </td>
			<td align="justify" class="p"><?php echo $fname ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p">Father Occupation: </td>
			<td align="justify" class="p"><?php echo $fathersoccupation ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p">Mother Name: </td>
			<td align="justify" class="p"><?php echo $mname ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p">Mother Occupation: </td>
			<td align="justify" class="p"><?php echo $motheroccupation ;?></td>
		</tr>
		<tr class="p">
			<td align="justify" class="p">Father Phone Number: </td>
			<td align="justify" class="p"><?php echo $fphone ;?></td>
			
			</tr>
			<tr class="p">
			<td align="justify" class="p">Mother Phone Number: </td>
			<td align="justify" class="p"><?php echo $mphone ;?></td>
		    </tr>
		<tr class="p">
			<td align="justify" class="p">Other Phone Number: </td>
			<td align="justify" class="p"><?php echo $ophone ;?></td>
			
		</tr>
	</table>
      </div>
    </div>
	</form>	
	 <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="edit.php">Edit</a></li>
  <li class="page-item"><a class="page-link" href="#">Delete</a></li>
</ul> 
</div>

   </div> 
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>
<?php
}
else
{
	header('location:loginuser.html');

}
?>

 