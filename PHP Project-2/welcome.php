<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Login System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <?php 
include 'linktowelcome.php';
?>
    <div class="container text-center m-4">
        <div class="alert alert-success  fade show" role="alert">
            Welcome<strong><?php echo " ".$_SESSION['username']." ";?></strong>to the course landing page.To logout <a
                href="logout.php">Click Here</a>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <?php 
            include '_dbconnect.php';
            $username = $_SESSION['username'];
            $sql =  "SELECT * FROM `logindetails` WHERE username='$username'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) == 1){
              while($row = mysqli_fetch_assoc($result)){
                if($row['webdevcourse'] != ''){
                echo '<div class="card col-lg-3 col-md-4 col-12 mr-2 mb-2" style="width:400px">
                <img class="card-img-top" src="images/webdev.jpg" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">Web Development Course</h4>
                <p class="card-text">Web development is the work involved in developing a website for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web-based internet applications, electronic businesses, and social network services</p>
                <a href="#" class="btn btn-primary">Go to Courses</a>
                </div>
                </div>';
              }
              if($row['androidcourse'] != ''){
                echo '<div class="card col-lg-3 col-md-4 col-12 mr-2 mb-2" style="width:400px">
                <img class="card-img-top" src="images/androiddev.png" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">Android Development </h4>
                <p class="card-text">Android software development is the process by which applications are created for devices running the Android operating system.</p>
                <a href="#" class="btn btn-primary">Go to Courses</a>
                </div>
                </div>';
              }
              if($row['mlcourse'] != ''){
                echo '<div class="card col-lg-3 col-md-4 col-12 mr-2 mb-2" style="width:400px">
                <img class="card-img-top" src="images/mldev.jpg" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">Machine Learning</h4>
                    <p class="card-text">Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve from experience without being explicitly programmed</p>
                    <a href="#" class="btn btn-primary">Go to Courses</a>
                </div>
                </div>';
              }
              if($row['aicourse'] != ''){
                echo '<div class="card col-lg-3 col-md-4 col-12 mr-2 mb-2" style="width:400px">
                <img class="card-img-top" src="images/aidev.jpg" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">Aritifical Intelligence</h4>
                <p class="card-text">Artificial intelligence (AI) refers to the simulation of human intelligence in machines that are programmed to think like humans and mimic their actions. </p>
                <a href="#" class="btn btn-primary">Go to Courses</a>
                </div>
                </div>';
              }
              if($row['dataanalysiscourse'] != ''){
                echo '<div class="card col-lg-3 col-md-4 col-12 mr-2 mb-2" style="width:400px">
                <img class="card-img-top" src="images/dataanalysis.jpg" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">Data Analysis</h4>
                <p class="card-text">Data analysis is a process of inspecting, cleansing, transforming and modeling data with the goal of discovering useful information,.</p>
                <a href="#" class="btn btn-primary">Go to Courses</a>
                </div>
                </div>';
              }
            }
          }
?>
        </div>
    </div>
</body>

</html>
