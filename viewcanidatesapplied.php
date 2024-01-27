<?php 
session_start();
include ('config.php');

$username=$_SESSION['username'];

$sql="SELECT skillscore from skillscore where username='$username'";
$query= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="viewcanidatesapplied.css" rel="stylesheet">
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
					<a href="emprh.php">Home</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="logout.php">LOGOUT</a>
				</li>
			</ul>
		</div>


		<div class="content">
			<h1>Manage Your <span>Candidates</span></h1>
		</div>
       

		<div class="card1">
  			<img src="testhistory.png" alt="Avatar">
 		 <div class="cardinside">
   		 <h4><b>Applied Candidates</b></h4>
   		 <p>Click Here to View Candidates </p><br>
			<a href="addedjobs.php"><button class="btn">Search</button></a>
 		 </div>
		</div>

		<div class="card2">
		<img src="selected.png" alt="Avatar" >
 		 <div class="cardinside">
   		 <h4><b>Selected Candidates</b></h4>
   		 <p>Click Here to view Candidates  </p><br>
			<a href="addedjobs2.php"><button  class="btn">View</button></a>
 		 </div>
		</div>

	</header>