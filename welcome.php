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
	<link href="employeehomestyle.css" rel="stylesheet">
</head>
<body>
	<header>


	<div class="logo">
	<img src="site-logo.svg">
	</div>


   <div class="names">
   <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?>
</div>
   




		<div class="container">
			<div class="logo"><img alt="" src="logo.png"></div>
			<ul class="nav">
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Canidate</a>
				</li>
				<li>
					<a href="#">Jobs </a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li>
					<a href="logout.php">LOGOUT</a>
				</li>
			</ul>
		</div>


		<div class="content">
			<h1>Search Your <span>Desired Jobs</span></h1>
				<input type="text" name="jobname" id="jobname"><br>
			<a href="#">Search</a>
		</div>

		

	</header>
</body>
</html>