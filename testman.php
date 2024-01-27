<?php 
session_start();
include ('config.php');

$username=$_SESSION['username'];


$sqlD="SELECT  AVG(score) from testresults where user_name='$username'";
$queryD= mysqli_query($conn,$sqlD);
$rowD=mysqli_fetch_array($queryD);
$ss=$rowD['AVG(score)'];


$sqlt="UPDATE skillscore SET skillscore='$ss' where username='$username'";
$queryD= mysqli_query($conn,$sqlt);


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
	<link href="testman.css" rel="stylesheet">
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


		<div class="content">
			<h1>Manage Your <span>Tests</span></h1>
		</div>
        <div class="skillscore">
            <h2><span style="color:#0fd84c">Current Skill Score</span><span style="color:white">&nbsp:&nbsp&nbsp<?php echo $row['skillscore']?></span></h2>
        </div>

		<div class="card1">
  			<img src="testhistory.png" alt="Avatar">
 		 <div class="cardinside">
   		 <h4><b>History</b></h4>
   		 <p>Click Here to View Test History</p><br>
			<a href="testhistory.php"><button class="btn">Search</button></a>
 		 </div>
		</div>

		<div class="card2">
		<img src="Test.png" alt="Avatar" >
 		 <div class="cardinside">
   		 <h4><b>Tests</b></h4>
   		 <p>Click Here to Attempt Tests </p><br>
			<a href="viewtest.php"><button  class="btn">View</button></a>
 		 </div>
		</div>

	</header>