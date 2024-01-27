<?php 

include 'config.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['user_type']=="employee") {
		$_SESSION['username'] = $row['username'];
		header("Location: emph.php");
	}
		
	else if ($row['user_type']=="employer") {
			$_SESSION['username'] = $row['username'];
			header("Location: emprh.php");
	 }

	 else if ($row['user_type']=="admin") {
		$_SESSION['username'] = $row['username'];
		header("Location: adminh.php");
 }
	 else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="index.css">
	
	<title>JobFi Login</title>
</head>
<body>

<div class="navi">
<nav class="navbar navbar-expand" style="background-color: ;">
<div class="container-fluid">
  <a class="navbar-brand" href="#">
	<img src="site-logo.png" alt="">
</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse" id="navbarTogglerDemo02">
	<ul class="navbar-nav ms-auto">
	  <li class="nav-item">
		<a class="nav-link active" aria-current="page" href="http://localhost/jobfi/home.php#"><span style="color:white">Home<span></a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link active" href="homeabout.php"><span style="color:white">About<span></a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link active" href="homecontact.php"><span style="color:white">Contact	<span></a>
	  </li>
	</ul>
  </div>
</div>
</nav>
</div>


	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>


			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a></p>
		</form>
	</div>




	

</body>
</html>