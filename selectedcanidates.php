<?php
include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobFi</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="selectedcanidates.css" rel="stylesheet">
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

        <div>
  <br><br><br><br><br><br>
  <h1><b><span style=color:white><center>Selected Candidates<h1><center>
</div>
        <div class="container" id="cont">
            <div class="row">

                <?php
               
				if ($_GET) {
					$var = $_GET['jobid'];
                }
                $sql = "SELECT * FROM selectedcandidates where employer_name ='$username' and Job_Id='$var'";
                $query = mysqli_query($conn, $sql);
                while ($val = mysqli_fetch_array($query)) {
                    $jid=$val['Job_Id'];
                    $sql2 = "SELECT * FROM jobs where Job_Id='$jid'";
                    $query2= mysqli_query($conn, $sql2);
                    $val2 = mysqli_fetch_array($query2);
                    $name=$val['username'];


                    $sql3 = "SELECT * FROM users where username='$name'";
                    $query3= mysqli_query($conn, $sql3);
                    $val3 = mysqli_fetch_array($query3);
                    $mail=$val3['email'];

                ?>
                    
                    <div class="col s6 md3" id="card">
                        <div class="card z-depth-0">
                            <div class="card-content center" id="card1">
                                <form action="mailto:<?php echo $mail ?>" method="post">
                                    <h6><b>Candidate Name:</b>&nbsp&nbsp<?php echo ($val['username']); ?></h6>
                                    <h6><b>Email :</b>&nbsp&nbsp<?php echo ($val3['email']); ?></h6>
                                    <h6><b>Job Id :</b>&nbsp&nbsp<?php echo ($val['Job_Id']); ?></h6>
                                    <div><b>Company Name :</b>&nbsp&nbsp<?php echo ($val2['Company_Name']); ?></div>
                                    <div><b>Job Position :</b>&nbsp&nbsp<?php echo ($val2['job_position']); ?></div><br>

                                    <div>
                                    <form  enctype="text/plain">
                                            <input class="btn" type="submit" value="Send Email" >
                                            
                                     </form>

                                    </div>
                                    




                                    <input class="hid" type="hidden" name="jobid" value="<?php echo $val['Job_Id'] ?>">
                                    <input class="hid" type="hidden" name="username1" value="<?php echo $val['username'] ?>">
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