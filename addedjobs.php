<?php
include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user = $_SESSION['username'];


if (isset($_POST['save1'])) {

    $jobid = $_POST['jobid'];
    $_SESSION['username1']=$user;
    header("Location:appliedcandidates.php?jobid=" . $jobid);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobFi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="addedjobs.css" rel="stylesheet">
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
  <h1><b><span style=color:white><center>Applied Candidates<h1><center>
</div>

        <div class="container" id="cont"><br><br><br><br><br><br>
            <div class="row">

                <?php
                $sql = "SELECT * FROM jobs where username ='$user'";
                $query = mysqli_query($conn, $sql);
                while ($val = mysqli_fetch_array($query)) {
                ?>
                    <div class="col s6 md3" id="card">
                        <div class="card z-depth-0">
                            <div class="card-content center" id="card1">
                                <form method="post">
                                    <h6><b>Job Id :</b>&nbsp&nbsp<?php echo ($val['Job_Id']); ?></h6>
                                    <div><b>Job Position :</b>&nbsp&nbsp<?php echo ($val['job_position']); ?></div>
                                    <input class="hid" type="hidden" name="jobid" value="<?php echo $val['Job_Id'] ?>">
                                    <input class="hid" type="hidden" name="username1" value="<?php echo $val['username'] ?>">
                                    <input type="submit" name="save1" value="View Candidates" class="btn btn-dark">
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