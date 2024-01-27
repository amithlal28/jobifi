<?php

session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}

include "config.php";

$user = $_SESSION['username'];

if (isset($_POST['save1'])) {

	$jobid = $_POST['jobid'];
	$username1 = $_POST['username1'];
	$empname = $_POST['empname'];
	$sql2 = "SELECT * FROM selectedcandidates where  employer_name='$empname' and Job_Id='$jobid' and username='$username1'";
	$result = mysqli_query($conn, $sql2);
	$num = mysqli_num_rows($result);

	if ($num == 0) {
		$sql = "INSERT  into selectedcandidates (Job_Id,employer_name,username) VALUES ('$jobid','$empname','$username1')";
		$value="Selected";
		$sql2 = "UPDATE  applied_job SET status= '$value' WHERE Job_Id='$jobid' and username='$username1'";
		$query=mysqli_multi_query($conn, $sql2);
		if (mysqli_multi_query($conn, $sql)) {
			echo '<script>alert("Canidate Selected !")</script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	} else {
		echo '<script>alert("ALREADY Selected !")</script>';
	}
}
if (isset($_POST['save2'])) {

	$jobid = $_POST['jobid'];
	$username1 = $_POST['username1'];
	$empname = $_POST['empname'];
	$sql2 = "SELECT * FROM rejectedcandidates where  employer_name='$empname' and Job_Id='$jobid' and username='$username1'";
	$result = mysqli_query($conn, $sql2);
	$num = mysqli_num_rows($result);
	$value="Rejected";
	$sql2 = "UPDATE  applied_job SET status= '$value' WHERE Job_Id='$jobid' and username='$username1'";
	$query=mysqli_multi_query($conn, $sql2);


	if ($num == 0) {
		$sql = "INSERT  into rejectedcandidates (Job_Id,employer_name,username) VALUES ('$jobid','$empname','$username1')";
		if (mysqli_multi_query($conn, $sql)) {
			echo '<script>alert("Canidate REJECTED ")</script>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	} else {
		echo '<script>alert("ALREADY REJECTED ")</script>';
	}
	
}
if (isset($_POST['save3'])) {
  $cv = $_POST['cv'];
	if($cv==NULL){
		echo '<script>alert("No Resume Found ")</script>';
	}else{
  // The file path
  $file = "resume/$cv"; 
    
  // Header Content Type
  header("Content-type: application/pdf"); 
    
  header("Content-Length: " . filesize($file)); 
    
  // Send the file to the browser.
  readfile($file); 

}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="appliedcandidates.css" rel="stylesheet">
</head>

<body>
	<header>


		<div class="logo">
			<img src="site-logo.png">
		</div>






		<div class="container">

			<ul class="nav">
				<li>
					<a href="emprh.php">Home</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="logout.php">LOGOUT</a>
				</li>
			</ul>
		</div>


		<div class="names">
			<?php echo "<h6>Welcome " . $_SESSION['username'] . "</h6>"; ?>
		</div>



		<div class="container" id="cont">
			<div class="row">

				<?php
				if ($_GET) {
					$var = $_GET['jobid'];
				}
				$sql = "SELECT * FROM applied_job join users on applied_job.username= users.username where Job_Id='$var' and employer_name='$user' and status='pending' ";
				$query = mysqli_query($conn, $sql);
				while ($val = mysqli_fetch_array($query)) {
				?>
					<div class="col s6 md3" id="card">
						<div class="card z-depth-0">
							<div class="card-content center" id="card1">
								<form method="post">
									<h6><b>User Name :</b>&nbsp&nbsp<?php echo ($val['username']); ?></h6>
									<div><b>Email :</b>&nbsp&nbsp<?php echo ($val['email']); ?></div>
									<div><b>Phone Number :</b>&nbsp&nbsp<?php echo ($val['phonenumber']); ?></div>
									<div><b>Address :</b>&nbsp&nbsp<?php echo ($val['addres']); ?></div>
									<div><b>Education:</b>&nbsp&nbsp<?php echo ($val['education']); ?></div>
									<div><b>University :</b>&nbsp&nbsp<?php echo ($val['university']); ?></div>
									<div><b>Skills :</b>&nbsp&nbsp<?php echo ($val['skills']); ?></div>
									<input class="btn btn-info" type="submit" value="View Resume" name="save3">
									<br>
									<input class="hid" type="hidden" name="jobid" value="<?php echo $val['Job_Id'] ?>">
									<input class="hid" type="hidden" name="empname" value="<?php echo $val['employer_name'] ?>">
									<input class="hid" type="hidden" name="cv" value="<?php echo $val['resume'] ?>">
									<input class="hid" type="hidden" name="username1" value="<?php echo $val['username'] ?>"><br>
									<input type="submit" name="save1" value="Select Candidate" class="btn btn-dark">&emsp;&emsp;
									<input type="submit" name="save2" value="Reject Candidate" class="btn btn-dark">

								</form>
							</div>
						</div>
					</div>

				<?php } ?>

			</div>
		</div>


	</header>







</body>

</html>