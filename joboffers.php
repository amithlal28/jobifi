<?php
include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user = $_SESSION['username'];


if (isset($_POST['save1'])) {

    $empname = $_POST['empname'];
    $jobid = $_POST['jobid'];
    $skillscore = $_POST['skillscore'];
    $vac = $_POST['vac'];
    $tests = $_POST['tests'];

    $x = 0;
    $y = 0;
    $z = 0;
    $sql1 = "select * from applied_job where username='$user' and employer_name='$empname';";
    $query1 = mysqli_query($conn, $sql1);

    while ($val1 = mysqli_fetch_array($query1)) {
        if ($val1['Job_Id'] == $jobid) {
            $x++;
            break;
        }
    }

    $sql2 = "select * from skillscore where username='$user';";
    $query2 = mysqli_query($conn, $sql2);
    while ($val2 = mysqli_fetch_array($query2)) {
        if ($val2['skillscore'] >= $skillscore) {
            $y++;
            break;
        }
    }

    $sql3 = "SELECT count(*) from testresults where user_name='$user';";
    $query3 = mysqli_query($conn, $sql3);
    $val4 = mysqli_fetch_assoc($query3);
    if ($val4['count(*)'] >= $tests) {
        $z++;
    }

    if ($x != 0) {
        echo '<script>alert("Already Applied !")</script>';
    } else if ($y == 0) {
        echo '<script>alert("Sorry Not Eligible Need more Skill Score !")</script>';
    } else if ($z == 0) {
        echo '<script>alert("Sorry Not Eligible Attempt More Test  !")</script>';
    } else {
        $vac--;
        $sql2 = "Update jobs set Vacancy='$vac' where Job_Id='$jobid';";
        $sql = "INSERT INTO applied_job (employer_name,username,Job_Id) VALUES ('$empname','$user','$jobid');";
        mysqli_multi_query($conn, $sql2);
        if (mysqli_multi_query($conn, $sql)) {
            echo '<script>alert("Applied Successfully !")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
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
    <link href="joboffers.css" rel="stylesheet">
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
                    <a href="contact.php">Contact</a>
                </li>
                <li>
                    <a href="logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>

        <div>
            <br><br><br><br><br><br>
            <h1><b><span style=color:white>
                        <center>Job Search<h1>
                                <center>
        </div>
        <div class="container" id="cont"><br><br><br><br><br><br>
            <div class="row">

                <?php
                $sql = "SELECT * FROM jobs where Status='Available' and Vacancy>0";
                $query = mysqli_query($conn, $sql);
                while ($val = mysqli_fetch_array($query)) {
                ?>
                    <div class="col s6 md3" id="card">
                        <div class="card z-depth-0">
                            <div class="card-content center" id="card1">
                                <form method="post">
                                    <h6><b>Company Name :</b>&nbsp&nbsp<?php echo ($val['Company_Name']); ?></h6>
                                    <div><b>Job Position :</b>&nbsp&nbsp<?php echo ($val['job_position']); ?></div>
                                    <div><b>Salary :</b>&nbsp&nbsp<?php echo ($val['salary']); ?></div>
                                    <div><b>Requires Skill Score :</b>&nbsp&nbsp<?php echo ($val['Required_Skill_Score']); ?></div>
                                    <div><b>No Of Tests Required :</b>&nbsp&nbsp<?php echo ($val['no_test']); ?></div>
                                    <div><b>Location :</b>&nbsp&nbsp<?php echo ($val['Location']); ?></div>
                                    <div><b>Vacancy :</b>&nbsp&nbsp<?php echo ($val['Vacancy']); ?></div>
                                    <div><b>Status :</b>&nbsp&nbsp<?php echo ($val['Status']); ?></div><br>

                                    <input class="hid" type="hidden" name="empname" value="<?php echo $val['username'] ?>">
                                    <input class="hid" type="hidden" name="jobid" value="<?php echo $val['Job_Id'] ?>">
                                    <input class="hid" type="hidden" name="skillscore" value="<?php echo $val['Required_Skill_Score'] ?>">
                                    <input class="hid" type="hidden" name="vac" value="<?php echo $val['Vacancy'] ?>">
                                    <input class="hid" type="hidden" name="tests" value="<?php echo $val['no_test'] ?>">
                                    <input type="submit" name="save1" value="Apply" class="btn btn-dark">
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