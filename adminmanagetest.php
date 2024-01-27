<?php 
session_start();
include ('config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="adminmanagetest.css" rel="stylesheet">
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


		<div class="content">
			<h1>Manage Your <span>Tests</span></h1>
		</div>
		<div class="card1">
  			<img src="testhistory.png" alt="Avatar">
 		 <div class="cardinside">
   		 <h4><b>Add Test</b></h4>
   		 <p>Click Here to Add Tests</p><br>
			<a href="addtest.php"><button class="btn">Add</button></a>
 		 </div>
		</div>

		<div class="card2">
		<img src="Test.png" alt="Avatar" >
 		 <div class="cardinside">
   		 <h4><b>Edit Tests</b></h4>
   		 <p>Click Here to Edit Tests </p><br>
			<a href="managetest.php"><button  class="btn">Edit</button></a>
 		 </div>
		</div>

	</header>