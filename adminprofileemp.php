<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user=$_SESSION['user'];

$sql = "SELECT * FROM users WHERE username='$user'";
$result=mysqli_query($conn,$sql);
$values=mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="profile.css" rel="stylesheet">
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


        <div class="details">
		<h1 style="text-align:center">Empolyee Details</h1>
        <br>

        <h5>Name :<span style="color:#34f50d"><?php echo " ".$values['username'] ?><span> </h5>
        <br><br>
        <h5>Email ID:<span style="color:#34f50d"><?php echo " ".$values['email']?><span> </h5>
        <br><br>
        <h5>Phone Number: <span style="color:#34f50d"><?php echo "".$values['phonenumber'] ?><span> </h5>
        <br><br>
        <h5>Education: <span style="color:#34f50d"><?php echo "".$values['education'] ?><span> </h5>
        <br><br>
        <h5>Adress: <span style="color:#34f50d"><?php echo "".$values['addres']?><span> </h5>
		<br><br>
		<h5 class="point">Graduated From: <span style="color:#34f50d"><?php echo " ".$values['university']?><span> </h5>
		<br><br>
		<h5 class="point2">Skills: <span style="color:#34f50d"><?php echo " ".$values['skills']?><span> </h5>
		</div>
        
