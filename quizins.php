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
	<link href="quizins.css" rel="stylesheet">
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
					<a href="emph.php">Home</a>
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
 		 <div class="cardinside">
   		<center><h4><b><br>INSTRUCTIONS</b></h4><br></center>
        <center><ul></center>
        <li>Total there will be 10 Questions</li>
        <li>CANNOT go back a question once clicking next</li>
        <li>Each question carries 1 point</li>
        <li>There is no time limit</li>
        <li>All the questions need to be answered</li>
        <center></ul></center>
 		 </div>
		</div>