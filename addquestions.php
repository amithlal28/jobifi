<?php 
include_once 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


$counter=2;
$_SESSION['counter']=$counter;



if(isset($_POST['save2']))
{

$question=$_POST['question'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
$answer=$_POST['radio'];
$testid=$_SESSION['testid'];

$testname='Test';
$testname .= $testid;

$query2=" CREATE TABLE  $testname (qid int primary key AUTO_INCREMENT,question varchar(300),opt1 varchar(30),opt2 varchar(30),opt3 varchar(30),opt4 varchar(30),answer varchar(5)) ";
$result2=mysqli_query($conn,$query2);


$query3=" INSERT into  $testname (question, opt1,opt2,opt3, opt4,answer) Values ('$question','$opt1','$opt2','$opt3','$opt4','$answer') ";
$result3=mysqli_query($conn,$query3);

if($result3)
	{
		header("Location: questions/question2.php");
		echo "<script>alert('Add Remaining Questions')</script>";
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
	<link href="addquestions.css" rel="stylesheet">
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



		<div class="card2">
 		 <div class="cardinside">
   		 <h1 class="header"><b>Questions And Answers</span></b></h1>
   		 <div class="forms">
		<form method="post" action="">
		Question 1:<input class="textbox3" type="text" name="question" >
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
		<input class="btn" type="submit" name="save2" value="Submit">
		</form>
	 </div>
		
 		 </div>
		</div>








