<?php
session_start();
include('config.php');

$username = $_SESSION['username'];

$sql = "SELECT skillscore from skillscore where username='$username'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobFi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="jobs.css" rel="stylesheet">
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
    

<h1 style="position:absolute;top:1.6em;left:7em;font-size:4em;color:white;">Manage Jobs Here</h1>


        <div class="card1">
            <img src="selected.png" alt="Avatar">
            <div class="cardinside">
                <h4><b>Search For Jobs</b></h4>
                <p>Click Here to View Available Jobs</p><br>
                <a href="joboffers.php"><button class="btn">Search</button></a>
            </div>
        </div>

        <div class="card2">
            <img src="testhistory.png" alt="Avatar">

            <div class="cardinside">
                <h4><b>Jobs Applied</b></h4>
                <p>Click Here to View Job Status </p><br>
                <a href="jobstatus.php"><button class="btn">View</button></a>
            </div>
        </div>

    </header>