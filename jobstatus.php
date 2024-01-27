<?php
include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user = $_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobFi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="jobstatus.css" rel="stylesheet">
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
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
 <div>
  <br><br><br><br><br><br>
  <h1><b><span style=color:white><center>Job Status<h1><center>
</div>
        <div class="container" id="cont"><br><br><br><br><br><br>
            <div class="row">

                <?php
                $sql = "SELECT * FROM jobs inner join applied_job on jobs.Job_Id=applied_job.Job_Id  where applied_job.username='$user'";
                $query = mysqli_query($conn, $sql);
                while ($val = mysqli_fetch_array($query)) {
                ?>
                    <div class="col s6 md3" id="card">
                        <div class="card z-depth-0">
                            <div class="card-content center" id="card1">
                                <form >
                                    <h6><b>Company Name :</b>&nbsp&nbsp<?php echo ($val['Company_Name']); ?></h6>
                                    <div><b>Job Position :</b>&nbsp&nbsp<?php echo ($val['job_position']); ?></div>
                                    <div><b>Salary :</b>&nbsp&nbsp<?php echo ($val['salary']); ?></div>
                                    <div><b>Location :</b>&nbsp&nbsp<?php echo ($val['Location']); ?></div>
                                    <div><b>Status :</b>&nbsp&nbsp<?php echo ($val['Status']); ?></div><br>

                                    <input class="hid" type="hidden" name="empname" value="<?php echo $val['username'] ?>">
                                    <input class="hid" type="hidden" name="jobid" value="<?php echo $val['Job_Id'] ?>">
                                    <input class="hid" type="hidden" name="skillscore" value="<?php echo $val['Required_Skill_Score'] ?>">
                                    <input class="hid" type="hidden" name="tests" value="<?php echo $val['no_test'] ?>">
                                    <input type="submit" name="save1" value="<?php echo $val['status'] ?>" class="btn btn-dark">
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