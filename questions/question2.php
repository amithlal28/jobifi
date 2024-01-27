<?php 
include_once 'config.php';


session_start();


$counter=$_SESSION['counter'];

$x=0;
if(isset($_POST['save2']))
{
	$x++;
++$counter;
$_SESSION['counter']=$counter;
$question=$_POST['question'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
$answer=$_POST['radio'];
$testname='Test';
$testid=$_SESSION['testid'];
$testname .= $testid;

$query=" INSERT into  $testname (question, opt1,opt2,opt3, opt4,answer) Values ('$question','$opt1','$opt2','$opt3','$opt4','$answer') ";
$result=mysqli_query($conn,$query);
if($counter==11)
	{	
		header("location:../adminh.php");					
	}
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="questions.css" rel="stylesheet">
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
					<a href="../adminh.php">Home</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="../logout.php">LOGOUT</a>
				</li>
			</ul>
		</div>



 		 </div>
		</div>

		<div class="card2">
 		 <div class="cardinside">
   		 <h1 class="header"><b>Questions And Answers</span></b></h1><br>
   		 <div class="forms">
		<form method="post" action="">
		<span style="color: #0fd84c">Question <?php echo $counter ?>:</span><input class="textbox3" type="text" name="question">
		<br><br>

		Option 1:<input class="textbox4" type="text" name="opt1">
		<br><br>
		Option 2:<input class="textbox4" type="text" name="opt2">
		<br><br>
		Option 3:<input class="textbox4" type="text" name="opt3">
		<br><br>
		Option 4:<input class="textbox4" type="text" name="opt4">
		<br><br>
		<div class="answerradio">

		Answer : 1<input class="radio" type="radio" name="radio" value="1">
				2<input class="radio" type="radio" name="radio" value="2" >
				3<input class="radio" type="radio" name="radio" value="3">
				4<input class="radio" type="radio" name="radio" value="4">

		</div>
		
		<br><br>
		<input class="btn1" type="submit" <?php if($counter>10) { ?> style="display: none" <?php } ?>  name="save2" value="Submit">
		</form>
	 </div>


 		 </div>


		  <br> <br> <br><br><br>
		</div>