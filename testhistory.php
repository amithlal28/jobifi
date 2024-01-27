<?php 

include 'config.php';
session_start();
$username=$_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
  
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="testhistory.css" rel="stylesheet">
   
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


        <div class="testavail">  <h1 ><br>Test History  </h1></div>

        <div class="cardbody">

        <form method="post" >
            <?php

                
            $sql = "SELECT * FROM testresults where user_name='$username'";
            $query= mysqli_query($conn,$sql);
            while ($row =mysqli_fetch_array($query)){

                $tid=$row['test_id'];
                $id=substr($tid,4);
                $sql2 = "SELECT * FROM tests where testid='$id'";
                $query2= mysqli_query($conn,$sql2);
                $row2 =mysqli_fetch_array($query2);

            ?>
        
            <div class="card">
            <li><span style="color:#0fd84c;font-size: 35px;"><?php echo $row2['testname'] ?></span><span style="position: absolute;left: 38em;font-size: 35px;"><?php echo $row['score'] ?></span> 


		    </div>
            <br><br>
           
           
           <?php
            }
            
            ?>

        </div>
       





</body>
<html></html>