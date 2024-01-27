<?php 
include 'config.php';
session_start();

$score=$_SESSION['score'];
$username= $_SESSION['username'];
$testid=$_SESSION['testid'];





if (isset($_POST['ok'])) 
{	
	$sql="INSERT into testresults (user_name,test_id,score) values ('$username','$testid','$score')";
	$query= mysqli_query($conn,$sql);


	$sql2="SELECT AVG(score) from testresults where user_name='$username'";
	$query2= mysqli_query($conn,$sql2);
	$row=mysqli_fetch_array($query2);
	$scoreavg=$row['AVG(score)'];

	$sqlf="UPDATE skillscore SET skillscore='$scoreavg' where username='$username'";
	$query3= mysqli_query($conn,$sqlf);

    header("location:emph.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="testresult.css" rel="stylesheet">
   
</head>
<header>
	<div class="logo">
	<img src="site-logo.png">
	</div>
   <div class="names">
   <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3><br>"; ?>
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
 </header>
    
    <div class="testavail">  <h1 ><br>Test Results </h1></div>
	<div class="card"><br><br>
    <center><h1><span style="color:#1bff00 ">Score Obtained :&nbsp&nbsp&nbsp</span> <?php echo $score ?>/10</h1><br><br></center>
    <form action="" method="post">
                        
         <input class="btn" type="submit" name="ok"  value="Home">

    </form>
	</div>


</body>
</html>