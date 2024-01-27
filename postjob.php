<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}


$sqlv = "SELECT count(*) from jobs";
$queryv=mysqli_query($conn, $sqlv);
$valv = mysqli_fetch_array($queryv);
$point=$valv['count(*)'];


if ($point==0)
{
  $jd=100;
}

else
{

  $sqlq = "SELECT Job_Id from jobs";
  $queryq=mysqli_query($conn, $sqlq);
  while ($val = mysqli_fetch_array($queryq)) {
  $jd=$val['Job_Id'];
  
  }

}





$username = $_SESSION['username'];

if (isset($_POST['save'])) {
  $Job_Id = $_POST['Job_Id'];
  $Company_Name = $_POST['Company_Name'];
  $job_position = $_POST['job_position'];
  $no_test = $_POST['no_test'];
  $salary = $_POST['salary'];
  $skillscore = $_POST['skillscore'];
  $Location = $_POST['Location'];
  $Status = $_POST['Status'];
  $Vacancy= $_POST['Vacancy'];
  $sql = "INSERT INTO jobs (Job_Id,username,Company_Name,job_position,no_test,salary,Required_Skill_Score,Location,Status,Vacancy)
	 VALUES ('$Job_Id','$username','$Company_Name','$job_position','$no_test','$salary','$skillscore','$Location','$Status','$Vacancy')";
  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("New Job Created !")</script>';
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
  <link href="postjob.css" rel="stylesheet">
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
  <br><br><br><br><br>
  <h1><b><span style=color:white><center>Post Job<h1><center>
</div>
    <div class="container-md" id="formcont">
      <form action="" method="POST" class="row g-3">
        <br>
        <div class="col-md-6">
          <label for="Company_Name" class="form-label">Your Alloted JOB ID : <span style=" color:#0fd84c;font-size:18px"><?php echo $jd+1 ?></span>  </label><br>
          <span style="color:#FAC213"><label for="Company_details" class="form-label">  Enter the ID Given in Green.</label></span>
          <input type="text" class="form-control" name="Job_Id" value="<?php echo $jd+1 ?>" >
        </div>
        <div class="col-md-6">
          <label for="Company_Name" class="form-label">Company Name</label><br>
          <span style="color:#FAC213"><label for="Company_details" class="form-label"> Enter the Company Name</label></span>
          <input type="text" class="form-control" name="Company_Name" required>
        </div>
        <div class="col-md-6">
          <label for="Job_Position" class="form-label">Job Position</label ><br>
          <input type="text" class="form-control" name="job_position" placeholder=" Enter the Position of the Job opening." required>
        </div>
        <div class="col-md-6">
          <label for="No_of_Vaccency" class="form-label">No of Test Required</label ><br>
          <input type="text" class="form-control" name="no_test" placeholder="Enter minimum number of Skill Test to be attempted" required>
        </div>
        <div class="col-6">
          <label for="Salary" class="form-label">Salary</label><br>
          <input type="text" class="form-control" name="salary" placeholder="Enter the Salary offered for the Job" required>
        </div>
        <div class="col-md-6">
          <label for="skillscore" class="form-label">Required Skill Score</label><br>
          <input type="text" class="form-control" name="skillscore" placeholder="Enter the Required Skill Score by the employee " required>
        </div>
        <div class="col-md-6">
          <label for="inputLocation" class="form-label">Location</label><br>
           <input type="text" class="form-control" name="Location" placeholder="Enter the Job location" required>
        </div>

        <div class="col-md-6">
          <label for="inputvacancy" class="form-label">Vacancy</label>
          <input type="text" class="form-control" name="Vacancy" placeholder="Enter the Job Vacancy" required>
        </div><br><br>
        
        <div class="col-sm" id="st" style="margin-top: 52px;">
          <label class="typelabel">Status</label>&nbsp;
          <select class="dropdown" name="Status" id="Status" >
            <option value="Available">Available</option>
            <option value="Closed">Closed</option>
          </select>
        </div>


        <div class="col-12" id="bt">
          <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>








</body>

</html>