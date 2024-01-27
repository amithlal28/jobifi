<?php 
include_once 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


$counter=2;
$_SESSION['counter']=$counter;

$sqlv = "SELECT count(*) from tests";
$queryv=mysqli_query($conn, $sqlv);
$valv = mysqli_fetch_array($queryv);
$point=$valv['count(*)'];

if ($point==0)
{
  $jd=100;
}

else{

	$sqlq = "SELECT testid from tests";
$queryq=mysqli_query($conn, $sqlq);
while ($val = mysqli_fetch_array($queryq)) {
$jd=$val['testid'];
}
}



if(isset($_POST['save']))
{	 
	 $testid   = $_POST['testid'];
	 $testname = $_POST['testname'];
	 $testdate=	 $_POST['testdate'];


	$query = "INSERT INTO tests (testid,testname,testdate) VALUES ('$testid','$testname','$testdate')";
	$result=mysqli_query($conn,$query);
	$query1 = "UPDATE  tests set enddate =DATE_ADD('$testdate', INTERVAL 30 DAY) where testid='$testid'";
	$result2=mysqli_query($conn,$query1);


	if($result)
	{
		$_SESSION['testid'] = $testid;
		echo "<script>alert('Test Added.')</script>";
	}
	header("Location: addquestions.php");
}




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
	<link href="addtest.css" rel="stylesheet">
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
	</header>


		<div class="card1">
 		 <div class="cardinside">
   		 <h1 class="header"><b>Test Details</b></h1>
   		 <div class="forms">
		<form method="post" action="">
		<br>
			Test ID(+):  <input class="textbox2" type="text" name="testid" value="<?php echo($jd+1)?>" >
			<br><br>
			Test Name:  <input class="textbox" type="text" name="testname">
		<br><br>
			Test Date :  <input class="textbox2" type="date" name="testdate">
		<br><BR>
		<input class="btn" type="submit" name="save" value="Submit">
		</form>
	 	</div>
		

	</body>
</html>








