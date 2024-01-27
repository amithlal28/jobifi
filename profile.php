<?php

session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}
$server = "localhost";
$user = "root";
$pass = "";
$database = "jobfi";
$conn = mysqli_connect($server, $user, $pass, $database);


$nametemp = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$nametemp'";
$result = mysqli_query($conn, $sql);
$values = mysqli_fetch_array($result);

$id = $values[0];
$name = $values[1];
$email = $values[2];
$phone = $values[5];
$addres = $values[6];
$education = $values[7];
$university = $values[8];
$skills = $values[9];


if (isset($_POST['save1'])) {
	$skill = $_POST['skill'];
	$sql2 = "update users set skills='$skill
	' WHERE username='$nametemp'";
	$result = mysqli_query($conn, $sql2);
	echo "<script>alert('Updated Successfully.')</script>";
}

if (isset($_POST['save2'])) {
	$fname=$_FILES['fileToUpload']['name'];
	$extension = pathinfo($fname,PATHINFO_EXTENSION);
	$newname=$phone.'.'.$extension;

    $filename=$_FILES['fileToUpload']['tmp_name'];
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
		echo '<script>alert("Sorry, File size is large")</script>';
		$uploadOk = 0;
	}else
	if ($extension == NULL) {
		echo '<script>alert("Please add file")</script>';
	}else
	if ($extension != "pdf") {
		echo '<script>alert("Sorry, only PFD files is supported")</script>';
		$uploadOk = 0;
	}

	else if(move_uploaded_file($filename, 'resume/'.$newname))
	{
		echo '<script>alert("The file has been uploaded. ")</script>';
		$sql3 = "update users set resume='$newname' WHERE username='$nametemp'";
		mysqli_query($conn, $sql3);
	}
	else
	{
		echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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
			<?php echo "<h6>Welcome " . $_SESSION['username'] . "</h6>"; ?>
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

		<form method="post" enctype="multipart/form-data">
			<div class="details">
				<h1 style="text-align:center">Employe Details</h1>
				<br>

				<h5>Name :<span style="color:#34f50d"><?php echo " " . $name ?><span> </h5>
				<br><br>
				<h5>Email ID:<span style="color:#34f50d"><?php echo " " . $email ?><span> </h5>
				<br><br>
				<h5>Phone Number: <span style="color:#34f50d"><?php echo "$phone" ?><span> </h5>
				<br><br>



				<h5>Education: <span style="color:#34f50d"><?php echo "$education" ?></span></h5>
				<br><br>
				<h5>Adress: <span style="color:#34f50d"><?php echo "$addres " ?><span> </h5>
				<br><br>
				<h5 class="point">Graduated From: <span style="color:#34f50d"><?php echo "$university " ?><span> </h5>
				<br><br>
				<h5 class="point2">Skills: <span style="color:#34f50d"><input type="text" name="skill" id="" value="<?php echo "$skills " ?>"><span> </h5>
				<h5 class="point3">Resume: <span style="color:#34f50d">  <input type="file" name="fileToUpload" id="fileToUpload"><span> </h5>
				<input class="btn btn-info" type="submit" value="Upload" name="save2">
			</div>
			<button type="submit" class="btn btn-primary" name="save1">Update</button>
		</form>
</body>

</html>