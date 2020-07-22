<?php
    $showSuccess = false;
    $showPasswordError = false;
    $showUsernameDuplicate = false;
    $showEmptyError = false;
    $showCourseNotSelectedError=false;
if($_SERVER['REQUEST_METHOD']  == 'POST'){
include '_dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$webdevcourse='';
$androidcourse='';
$aicourse='';
$mlcourse='';
$dataanalysiscourse='';
if(isset($_POST['webdevcourse'])){
    $webdevcourse = $_POST['webdevcourse'];
}
if(isset($_POST['androidcourse'])){
    $androidcourse = $_POST['androidcourse'];
}
if(isset($_POST['aicourse'])){
    $aicourse = $_POST['aicourse'];
}
if(isset($_POST['mlcourse'])){
    $mlcourse = $_POST['mlcourse'];
}
if(isset($_POST['dataanalysiscourse'])){
    $dataanalysiscourse = $_POST['dataanalysiscourse'];
}
if($username == '' || $password == '' || $cpassword == ''){
$showEmptyError = true;
}
if($webdevcourse == '' && $androidcourse == '' && $aicourse == '' && $mlcourse == '' && $dataanalysiscourse == ''){
$showCourseNotSelectedError = true;
}
else{

    //check for dupliacte username
    $userquery = "SELECT * FROM `user`";
    $useresult = mysqli_query($conn,$userquery);
    if($useresult){
        while($row = mysqli_fetch_assoc($useresult)){
            if($username == $row['username']){
                $showUsernameDuplicate = true;
            }
        }
    }
    
    if(!$showUsernameDuplicate){
        
        //both password match or not
        if($password == $cpassword){
            $password = password_hash($password,PASSWORD_DEFAULT);
            // $sql = "INSERT INTO `user` (`sno`, `username`, `password`, `datetime`) VALUES(NULL, '$username', '$password', current_timestamp())";
            $sql =  "INSERT INTO `logindetails` (`sno`, `username`, `password`, `datetime`, `webdevcourse`, `androidcourse`, `aicourse`, `mlcourse`, `dataanalysiscourse`) VALUES (NULL, '$username', '$password', current_timestamp(), '$webdevcourse', '$androidcourse', '$aicourse', '$mlcourse', '$dataanalysiscourse')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showSuccess = true;
            }
        }
        
        //password doesnot match error
        else{
            $showPasswordError = true;
        }
    }
}
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
  require 'navbar.php';
  ?>
    <div class="container">
        <!-- //alert displaying section -->
        <?php
        if($showEmptyError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!!</strong> Fill all the details
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($showCourseNotSelectedError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!!</strong> You must select atleast one course
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if($showUsernameDuplicate){ 
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!!</strong> Username Exists.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
            if($showSuccess){
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Your login credentials have been recorded.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
           if($showPasswordError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!!</strong> Your password does not match.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            }
        ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3 class="text-center m-4">Enter your Signup credentials</h3>
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" maxlength="25" class="form-control" id="username"
                            placeholder="Enter email/Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" maxlength="255" class="form-control" id="password"
                            placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpassword" placeholder="Enter password"
                            name="cpassword">
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="webdevcourse"
                            value="webdevcourse">
                        <label class="custom-control-label" for="customCheck1">Web Devlopment</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="androidcourse"
                            value="androidcourse">
                        <label class="custom-control-label" for="customCheck2">Android Development</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="aicourse"
                            value="aicourse">
                        <label class="custom-control-label" for="customCheck3">Aritifical Intelligence</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck4" name="mlcourse"
                            value="mlcourse">
                        <label class="custom-control-label" for="customCheck4">Machine Learning</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="dataanalysiscourse"
                            value="dataanalysiscourse">
                        <label class="custom-control-label" for="customCheck5">Data Analysis</label>
                    </div>
                    <button type="submit" class=" btn btn-block btn-primary mb-5">SignUp</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>