<?php 

include 'config.php';
session_start();

if (isset($_POST['ok'])) 
            {	
                $user=$_POST['username'];
                $_SESSION['user']=$user;
                header("location:adminprofileemp.php");
            }

if (isset($_POST['ok2'])) 
            {	
                $user=$_POST['username'];
                $sqld="DELETE FROM users  where username='$user'";
                $queryd= mysqli_query($conn,$sqld);
                $sqld2="DELETE FROM skillscore  where username='$user'";
                $queryd2= mysqli_query($conn,$sqld2);
                $sqld3="DELETE FROM testresults  where user_name='$user'";
                $queryd3= mysqli_query($conn,$sqld3);
                $sqld4="DELETE FROM selectedcandidates  where username='$user'";
                $queryd4= mysqli_query($conn,$sqld4);
                $sqld5="DELETE FROM  rejectedcandidates  where username='$user'";
                $queryd5= mysqli_query($conn,$sqld5);
                $sqld6="DELETE FROM  applied_job  where username='$user'";
                $queryd6= mysqli_query($conn,$sqld6);

                if($queryd)
                {
                    echo "<script>alert('User Deleted')</script>";
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
	<link href="manage.css" rel="stylesheet">
   
</head>
	<header>
	<div class="logo">
	<img src="site-logo.png">
	</div>
   <div class="names">
   <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3><br>"; ?>
    </div>

		
    </header>


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


        <div class="testavail">  <h1 ><br>Registered Empolyees </h1></div>
        <h3><span style="color:white;position:absolute;left:4.5em;font-size: 35px;">Name</span><span style="color:white;position:absolute;left:36.5em;font-size: 35px;" >Actions</span></h3><br><br><br>

        <div class="cardbody">

        <form method="post" >
            <?php

                
            $sql = "SELECT * FROM users where user_type='employee'";
            $query= mysqli_query($conn,$sql);
            while ($row =mysqli_fetch_array($query)){
                
            ?>
            <form method="post">
            <div class="card">
          
            <input class="hid" type="hidden" name="username" value="<?php echo $row['username']?>">
            <li><span style="color:#0fd84c;font-size: 35px;"><?php echo $row['username'] ?></span><span style="position: absolute;left: 38em;font-size: 35px;"><?php ;?></span> 
            <span style="color:Red;position:absolute;left:51.75em;"><button class="btn" type="submit" name="ok">View Profile</button></span><br>
            <span style="color:Red;position:absolute;left:51.6em;"><button class="btn" type="submit" name="ok2">Delete Profile</button></span>
		    </div>
            <br><br>
            </form>
           
           <?php
            }
            
            ?>

        </div>
       





</body>
<html></html>