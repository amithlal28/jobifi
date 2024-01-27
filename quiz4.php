<?php 
include 'config.php';
session_start();


$testid=$_SESSION['testid'];
$score=$_SESSION['score'];


$qid=$_SESSION['qid'];
$_SESSION['testid']=$testid;

$sql="SELECT * from $testid where qid=$qid";
$query= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$ans=$row['answer'];


if (isset($_POST['ok'])) 
            {
                $opted=$_POST['radio'];
                if($ans==$opted)
                {
                    $score++;
                    $_SESSION['score']=$score;
					
                    
                } 

                header("Location: testresult.php");

            }


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JobFi</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
	<link href="quiz4.css" rel="stylesheet">
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
        <span style="color:white"><center><h1 class="qhead">Question <?php echo $qid ?> </h1></center></span>
        <div class="card1">
 		 <div class="cardinside">
   		<h5 class="question"><span style="color:#34f50d" >Question : &nbsp</span><?php echo $row['question']; ?></h5>
           <form method="post">
            <div class="options">
				<br>
           <input class="rad" type="radio" name="radio" value="1"> <?php echo $row['opt1'] ?>   <br><br>
           <input class="rad" type="radio" name="radio" value="2"> <?php echo $row['opt2'] ?>   <br><br>
           <input class="rad" type="radio" name="radio" value="3"> <?php echo $row['opt3'] ?>   <br><br>
           <input class="rad" type="radio" name="radio" value="4"> <?php echo $row['opt4'] ?>   <br><br>
           
           </div>
           <input class="btn" type="submit" name="ok" value="FINISH">
       </form>
       </div>
      
 		 </div>
		</div>