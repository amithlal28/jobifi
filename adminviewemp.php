<?php 

include 'config.php';
session_start();


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
  
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="adminviewemp.css" rel="stylesheet">
   
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
        <h3><span style="color:white;position:absolute;left:4.5em;font-size: 35px;">Name</span><span style="color:white;position:absolute;left:36.5em;font-size: 35px;" >Skill Score</span></h3><br><br>
        <br>

      
        <div class="cardbody">

        <form method="post" >
            <?php

                
            $sql = "SELECT * FROM users WHERE user_type='employee'";
            $query= mysqli_query($conn,$sql);
            while ($row =mysqli_fetch_array($query)){
                $username=$row['username'];
                $sql2="SELECT skillscore from skillscore where username='$username'";
                $query2= mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_array($query2);
                
            ?>
            <form method="post">
            <div class="card">
          
            <li><span style="color:#0fd84c;font-size: 30px;"><?php echo $row['username'] ?></span><span style="position: absolute;left: 38em;font-size: 35px;"><?php echo $row2['skillscore'] ;?></span> 
            <form method="post">
								
                                <input class="btn btn-info" type="submit" value="View Resume" name="save3">
                                <input class="hid" type="hidden" name="cv" value="<?php echo $row['resume'] ?>">
                            </form>
             
		    </div>
            <br><br>
            </form>
           
           <?php
            }
            
            ?>

        </div>
           
        
 </form>
        </div>
       






