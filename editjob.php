<?php
include 'config.php';
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['save'])) {
    $Job_Id = $_POST['Job_Id'];
    $Status = $_POST['Status'];
    $sql = "Update jobs
	 set Status='$Status' where Job_Id='$Job_Id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Updated Successfully !")</script>';
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
    <link href="editjob.css" rel="stylesheet">
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
            <h1><b><span style=color:white>
                        <center>Manage Job<h1>
                                <center>
        </div>

        <div class="container-md" id="formcont">
            <form action="" method="post">
                <label for="Job_Id" class="form-label">Job:</label>
                <?php
                $mysqli = new mysqli('localhost', 'root', '', 'jobfi');
                $resultset = $mysqli->query("SELECT * FROM jobs where username='$username'");
                ?>
                <select class="dropdown" name="Job_Id" style="width:350px" ;>
                    <?php

                    while ($rows = $resultset->fetch_assoc()) {
                        $Job_Id = $rows['Job_Id'];
                        $Company_Name = $rows['Company_Name'];
                        $job_position = $rows['job_position'];
                        echo "<option value='$Job_Id'>$Job_Id&nbsp,&nbsp&nbsp$Company_Name&nbsp,&nbsp&nbsp$job_position</option>";
                    }
                    ?>
                </select>
                <br>
                <div class=" input-group"><br>
                    <label class="typelabel">Status: &nbsp&nbsp</label>
                    <select class="dropdown" name="Status" id="Status" style="width:350px" ;>
                        <option value="Available">Available</option>
                        <option value="Closed">Closed</option>
                    </select required>
                </div>
                <div class="col-12" id="bt"><br>
                    &emsp;&emsp;<button type="submit" name="save" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </header>







</body>

</html>