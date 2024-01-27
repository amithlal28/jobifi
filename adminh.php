<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="adminh.css" rel="stylesheet">
</head>
<body>
	<header>


	<div class="logo">
	<img src="site-logo.png">
	</div>


   <div class="names">
   <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?>
</div>
   




		<div class="container">
			
			<ul class="nav">
				<li>
					<a href="adminh.php">Home</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="logout.php">LOGOUT</a>
				</li>
			</ul>
		</div>

		
		<div class="card1">
  			<img src="job.png" alt="Avatar">
 		 <div class="cardinside">
   		 <h4><b>Jobs</b></h4>
   		 <p>Click Here to Manage Jobs</p><br>
			<a href="managejob.php"><button  class="btn">View</button></a>
 		 </div>
		</div>

		<div class="card2">
		<img src="Profile.png" alt="Avatar" >
 		 <div class="cardinside">
   		 <h4><b>Candidates</b></h4>
   		 <p>Click Here to View Candidates </p><br>
			<a href="admincanidatemanage.php"><button  class="btn">View</button></a>
 		 </div>
		</div>

		<div class="card3">
		<img src="testadd.png" alt="Avatar" >
 		 <div class="cardinside">
   		 <h4><b>Manage Test</b></h4>
   		 <p>Click Here to Manage Tests</p><br>
		<a href="adminmanagetest.php"><button  class="btn" >Manage</button> </a>
 		 </div>
		</div>

			
		</body>
		</html>
		