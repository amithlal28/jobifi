<?php 

include 'config.php';

error_reporting(0);

session_start();	

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$usertype=$_POST['usertype'];
	$phonenumber=$_POST['phonenumber'];
	$addres=$_POST['addres'];
	$education=$_POST['education'];
	$grad=$_POST['university'];
	$skills=$_POST['skills'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, user_type,phonenumber, addres,education,university,skills)
					VALUES ('$username', '$email', '$password', '$usertype','$phonenumber','$addres','$education','$grad','$skills')";
			$result = mysqli_query($conn, $sql);

			if($usertype=="employee")
			{
				$sql2="INSERT into skillscore(username) values ('$username')";
				$result2 = mysqli_query($conn, $sql2);

					
			}

			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";


				$name='';
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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

	<link rel="stylesheet" type="text/css" href="register.css">

	<title>JobFi Register Form </title>
</head>
<body>
<body>

<div class="navi">
<nav class="navbar navbar-expand">
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
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register Here</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>

			<div class="input-group">
				<input type="text" placeholder="Phone Number " name="phonenumber" value="<?php echo $phonenumber; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder=" Address" name="addres" value="<?php echo $addres ?>" required>
			</div>
			
			<div class="input-group">
				<input type="text" placeholder=" Education" name="education" value="<?php echo $education; ?>" >
			</div>
			<div class="input-group">
				<input type="text" placeholder=" Graduated From" name="university" value="<?php echo $university; ?>" >
			</div>
			<div class="input-group">
				<input type="text" placeholder="  Skills" name="skills" value="<?php echo $skills; ?>" >
			</div>
			<div class="input-group">
				<label class="typelabel">Choose User Type:</label>
				<select class="dropdown" name="usertype" id="typeuser">
  					<option value="employee">Employee</option>
  					<option value="employer">Employer</option>
					  <!--<option value="admin" disabled>Admin</option>-->
				</select required>
			</div>



			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>


</body>
</html>