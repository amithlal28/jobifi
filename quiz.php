<?php 
include 'config.php';
session_start();

$testid=$_SESSION['testid'];
$_SESSION['testid']=$testid;

$ids=$_SESSION['ids'];

$sql="SELECT * from tests where testid='$ids'";
$query= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$testname=$row['testname'];

if (isset($_POST['ok'])) 
            {
				header("location:quiz2.php");
            }


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="quiz.css" rel="stylesheet">
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
   		<center><span style="color:#34f50d" ><h2><b>INSTRUCTIONS FOR  <?php echo $testname; ?></b></h2></span></center><br>
        <div class="ins">
        <ul>
        <li>Total there will be 10 Questions</li>
        <li>CANNOT go back a question once clicking next</li>
       <li>Each question carries 1 point</li>
        <li>There is no time limit</li>
        <li>All the questions need to be answered</li>
       </ul>
       </div>
       <form method="post">
       <input class="btn" type="submit" name="ok" value=" CONTINUE">


       </form>
 		 </div>
		</div>