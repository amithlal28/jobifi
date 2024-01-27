<?php 

include 'config.php';
session_start();
$testid="test";
$username=$_SESSION['username'];
$yes=0;



if (isset($_POST['ok'])) 
            {	
				
				$id=$_POST['testid'];
				$_SESSION['ids']=$id;
				$testid=$testid.=$id;
				$_SESSION['testid']=$testid;

				
				$sql = "SELECT * FROM testresults where user_name='$username'";
				$result=mysqli_query($conn,$sql);
				while ($row = $result->fetch_assoc()) {
  					if($row['test_id']==$testid)
					{
						$yes++;
					}
				}
					
					if($yes==0)
					{
						header("location:quiz.php");
					}
					else{
						echo "<script>alert('Test Already Attempted')</script>";
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
	<link href="viewtest.css" rel="stylesheet">
   
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


        <div class="testavail">  <h1 ><br>Available Tests </h1></div>

        <div class="cardbody">

        <form method="post" >
            <?php

                
            $sql = "SELECT * FROM tests";
            $query= mysqli_query($conn,$sql);
            while ($row =mysqli_fetch_array($query)){
           ?>

            <div class="card">
          <h2> <?php echo $row['testname']?> 
			<form method="post">
			<input class="hid" type="hidden" name="testid" value="<?php echo $row['testid']?>"><div class="end" ><h6 >Test End Date :&nbsp&nbsp&nbsp<span style="color:red;font-size: 30px;"><?php echo $row['enddate']?></h6></span></div>
			
		  	<button class="btn" type="submit" name="ok">Click Here</button>
			
			</form>
		    </div>
            <br><br>
           
           
           <?php
            }
            
            ?>

        </div>
       





</body>
<html></html>