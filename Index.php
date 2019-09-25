<?php
session_start();
$var1 = $_SESSION["name"];
$var2 = $_SESSION["reg"];
if (isset($var1)&&isset($var2)==true) 
{
  $status ='active';
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
  $id = $row['id'];
  $name = $row['username'];
  $reg = $row['enrole'];
  if($currentdate==$date_at)
    {
    $sql = "UPDATE `login_at` SET `date_to` = '$date_at',`time_to` = '$time_at',`status`='$status' WHERE `login_at`.`id` = $id";
    $result = $conn->query($sql);
    }
    else
      {
       
      }
}
else{
if(isset($_SESSION)===true)
  {
 $sql = "INSERT INTO `login_at` (`id`, `username`, `enrole`, `date_at`, `date_to`, `time_at`, `time_to`,`status` ,`time`) VALUES (NULL, '$var1', '$var2', '$date_at', '0000-00-00', '$time_at', '00-00-00','$status' ,CURRENT_TIMESTAMP)";
  }
else{
  header('location:Home.html');

}
$result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html>
<head>

<title>Home</title>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/body.css" rel="stylesheet">
	
</head>
<!--host the page-->
<body>



<!--host the page-->
   <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-t">
   <a class="navbar-brand img-fluid img-thumbnail figure-img g1 " style="background-color: #c9d1d5 ">
	   <img class="top g1" src="css/images/Logo2.bmp" width="170" height="70" alt="Chefedu">
	   <span class="embed-responsive " >
		   <sub class="align-content-md-center goal" style="font-size-adjust: auto" >Learn | Social | Profit &gt; &gt; Education 
		   </sub>
	   </span>
	   </a>
   <button class="navbar-toggler" type="button:active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	   <span>
		   <a class="navbar-brand" href="#">Chefedu...</a>
	   </span>
	   
   </button>
    <sub class="sublime">Big Education social network and Devlopment
		   </sub>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="#about">About us</a>
         </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php if(isset($var1)&&isset($var2)==true){ echo'logdetail.php'; 
    }else{} ?>">Your Profile</a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle-split dropleft" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Course
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="Course.html">Core Python</a>
               <a class="dropdown-item" href="Course.html">Python Using GUI</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="Other Course.html">Something else here</a>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link " href="#">Alumni</a>
         </li>
      </ul>
      <label class="form-inline my-2 my-lg-0">
		  
         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"  style="display: none;" id = "exter">
		<label class="form-inline form-control my-2 " id="inter" style="margin-right: 8px; padding-inline: 22px;"><?php if(isset($var1)&&isset($var2)==true){echo $var2;}?></label>
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="hide()" id="color">Search</button>
		 
     </label>
     <script>
     	function hide(){
     		var a = document.getElementById('exter');
     		var b = document.getElementById('inter');
     		if (a.style.display === "none") 
     		{
                 a.style.display = "block";
                 b.style.display="none";
            } else {
                    a.style.display = "none";
                    b.style.display="block";
                   }
     	}
     	function show(){
     		document.getElementById('inter').style.display="block";
     		document.getElementById('exter').style.display="none";
     	}
     </script>
	   
	   <ul>
		   <li class="list-group"><a class="text-info"> Contact For </a></li>
	   <a href="#">
				<img src="css/images/soc2.gif" height="40" width="55" class="btn btn-outline-info" alt=""/>
			</a>
		   
		   <a href="#">
				<img src="css/images/soc3.gif" height="40" width="55" class="btn btn-outline-info" alt="" />
			</a>
	   </ul>
      </div>
</nav>
	 	   <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id ="img"   alt="Chefedu" href ="#">
    </div>
    <div class="carousel-item">
      <img id ="img1"  alt="Unity"  href ="#">
    </div>
    <div class="carousel-item">
      <img id ="img2"  alt="Python" href ="#">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"  ></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
   <div id="home " class="jumbotron">
		

	  <div class="greating"><h1 class="display-3 centerl" id="greating"></h1></div> 
	  	<h2 class="display-4 centerl"><?php echo " ".$var1; ?></h2>
	    <h2 class="display-4 centerl">Welcome to Chefedu!</h2>
	   <br>
		<p class="lead">"Today’s reader can be a tomorrow’s leader in Development." - Chefedu...&nbsp; &nbsp; </p><br>
		<p class = "copy">It is help to provide education in online and offline as simple as possible. Because things about when and what you learn need to do with that information after the courses is finished and design around that so it should be better and more and most effective for, sucessful professionals and our team constantly working.
	  We are providing such education before just matter of time like Related courses are such as Python Development of entire course and Web Devlopment using Html and Mostly Unity 2D and 3D game devlopment then also provide other feature Shown in list according to other learning ablities like :-
		</p>
		<ul class="list-group">
			<li class="list-group-item">Easy to learning experiences</li>
			<li class="list-group-item">Easy to afford in Price of each course</li>
			<li class="list-group-item">Easy to maintain </li>
			<li class="list-group-item" >We are providing each Professional tool for development free of cost</li>
		</ul >

		<br id = "about">
		<br>
		<br>
	   <!----------card address--------->
	  
	   <p class="lead" style="background:#323232 ; padding: 20px; text-align: center"><p class="display-3 centerl anim">About us...</p></p>
	   <br>
	   <br>
	   <br>
	   <br>
	   <br>
	   <p class="lead" style="background:#323232 ; padding: 20px; text-align: center"></p>
	   <div class="row">
          <div class="col-md-4">
             <div class="card">
                <img class="card-img-top" src="css\images\neaf_1.png" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">About Company</h4>
                   <p class="card-text">Chefedu...is a great startup company which help the socity to buld your application which you want to make and also given importent to give prevalage to get job and education in this comapny.</p>
                   <br><br>
                   <a href="About.html" class="btn btn-primary">Go to learn more</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
                   <h5 class="card-title">About courses</h5>
                   <h6 class="card-subtitle mb-2 text-muted">Application Development,web development,machine learning,Artificial Intelegence...and more.</h6>
                   <p class="card-text">Courses are offered by measure the level of ability an performences before enter the cources.</p>
                   <a href="#" class="card-link">Check your criteria</a>
                </div>
             </div>
             <br>
             <br>
             <div class="card">
                <div class="card-header">
                   Course hear.....
                </div>
                <ul class="list-group list-group-flush">
                   <li class="list-group-item">Programing in C,C++,Java,JavaScript,C#,F#,R,Python..More.</li>
                   <li class="list-group-item">Android Development.</li>
                   <li class="list-group-item">Software Development.</li>
				   <li class="list-group-item">Web Development.</li>
				   <li class="list-group-item">iOS Development.</li>
				   <li class="list-group-item">Database and Management using SQL,MY-SQL,MongoDB,Oracle DB,Access etc.</li>
				   <li class="list-group-item">Game Development using Unity and Blender 2D,3D.</li>
                   <li class="list-group-item">Ethical Hacking and White Hatred..</li>
                   <li class="list-group-item">Advance Computation and Theory Relativity.</li>
				   <li class="list-group-item">Machine learning.</li>
                </ul>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <img class="card-img-top" src="css\images\f.png" alt="Card image cap">
                <div class="card-body">
                   <h5 class="card-title">About faculty...</h5>
                   <p class="card-text">Faculty are responsive and always hard working.</p>
                </div>
                <ul class="list-group list-group-flush">
                   <li class="list-group-item">Mr.Rakibul Islam (Specilization in Mathamatics)</li>
                   <li class="list-group-item">Mr.Nagarjun Dhar (Specilization in Web Devlopment)</li>
				   <li class="list-group-item">Mr.Anirbon Chakravarty (Specilization in Ethical Hacking)</li>
                </ul>
                <div class="card-body">
				<ul class="list-group list-group-flush">
                 <li class="list-group-item"><a href="#" class="card-link">More About faculty.</a></li>
                 <li class="list-group-item"><a href="#" class="card-link">Specilization on work.</a></li>
				</ul>
                </div>
             </div>
          </div>
       </div>
	 
		<br>
     <p class="lead" style="background:  #323232 ; padding: 20px; text-align: center">
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#d1"> Learn more </button></p>
		  <div id="d1" class="collapse">
			  <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
             <h4>Chapslock.Chefedu.in </h4>
             <p >Copyright &copy; 2019 &middot; All Rights Reserved &middot; <a href="#" >Chefedu</a></p>
          </div>
     </div> 
	   </div>
</div>
</div>
	   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/ImgNd.js"> </script>
<script src="js/alert.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>

</body>
</html>
<?php
}
else
{
    header('location:Home.html');
    $sql = "UPDATE `login_at` SET `status`='inactive' WHERE `login_at`.`id` = $id";
      $result = $conn->query($sql);
      print_r($result);
}
?>